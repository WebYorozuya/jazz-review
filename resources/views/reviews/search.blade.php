@extends('layouts.public')

@section('title')
「{{ $keyword }}」の検索結果
@endsection

@section('header')
  @component('components.header')
  @endcomponent
@endsection

@section('main')
  <h1 class="main-title"><span>「{{ $keyword }}」</span>の検索結果</h1>
  @include('components.review_component')
@endsection

@section('js')
<script>
    /* 検索ワード（キーワード）をハイライトする処理（平仮名とカタカナを区別しない） */
    // 平仮名とカタカナの区別なく検索するために検索ワードを平仮名に変換
    const hiraKeyword = kanaToHira('{{$keyword}}');
    const keywordLength = '{{$keyword}}'.length;
    const spanHead = '<span style="background-color:#FFFF00;">';
    const spanTail = '</span>';

    const reviewHTMLs = Array.prototype.slice.call(document.getElementsByClassName('search-review-text'));
    reviewHTMLs.forEach((reviewHTML, i) => {
        let reviewText = reviewHTML.innerText;
        // 平仮名とカタカナの区別なく検索するために検索対象を平仮名に変換
        let reviewHiraText = kanaToHira(reviewText);

        // 検索ワードが見つからなくなるまでループを回す
        // 検索ワードが見つかれば、spanHeadとspanTailで検索ワードを挟んで、
        // 検索開始位置からspanTailまでを配列に追加する
        // 検索ワードが見つからなければ、検索開始位置から最後の文字列までを配列に追加する
        let foundIdx = 0;
        let beginIdx = 0;
        let highlightedReviewTexts = [];
        while(true) {
            foundIdx = reviewHiraText.indexOf(hiraKeyword, beginIdx);
            if (foundIdx === -1) {
                const restStr = reviewText.slice(beginIdx)
                highlightedReviewTexts.push(restStr);
                break;
            }
            const headStr = reviewText.slice(beginIdx, foundIdx);
            const highlightedStr = spanHead + reviewText.slice(foundIdx, foundIdx + keywordLength) + spanTail;
            const tailStr = reviewText.slice(beginIdx + foundIdx + keywordLength);
            highlightedReviewTexts.push(headStr + highlightedStr);
            beginIdx = foundIdx + keywordLength;
        }
        const highlightedReviewText = highlightedReviewTexts.join('');

        // 元のhtmlをspanタグでハイライトしたhtmlで上書きする
        const reviewInnerHTML = reviewHTML.innerHTML;
        const highlightedReviewHTML = reviewInnerHTML.replace(new RegExp(reviewText,'g'), highlightedReviewText);
        document.getElementsByClassName('search-review-text')[i].innerHTML = highlightedReviewHTML;
    });

    // カタカナを平仮名に変換する
    function kanaToHira(str) {
        return str.replace(/[\u30A1-\u30F6]/g, function(match) {
            var chr = match.charCodeAt(0) - 0x60;
            return String.fromCharCode(chr);
        });
    }
  </script>
  @env('local')
    <script type="text/javascript" src="{{ asset('js/review_text_height_change.js') }}"></script>
  @endenv
  @production
    <script type="text/javascript" src="{{ secure_asset('js/review_text_height_change.js') }}"></script>
  @endproduction
@endsection
