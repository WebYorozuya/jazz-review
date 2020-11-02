@foreach ($items as $item)
  <div class="review">    
    <div class="review-left">
      <a href="user?user_id={{$item->user_id}}" class="user-image">
        <img src="images/icons8-user-male-30-black.png" alt="">
      </a>
    </div><!-- /.review-left -->
    <div class="review-right">
      <div class="review-top">
        <h2>{{$item->live_date}} {{$item->title}}</h2>
        <!-- ドロップダウンメニュー -->
        <div class="review-dropdown-wrapper">
          <i class="fas fa-ellipsis-h showIcon"></i>
          <ul class="review-dropdown">
            @auth
            @if (Auth::user()->id === $item->user_id)
            <a href="{{ route('edit', ['id' => $item->id]) }}">
              <li>編集／削除する</li>
            </a>
            @endif
            @endauth
            <a href="contact#contact">
              <li>報告する</li>
            </a>
          </ul>
        </div><!-- /.review-menu-wrapper -->
        <!-- ドロップダウンメニューここまで -->
      </div><!-- /.review-top -->
      <div class="tags">
        @foreach ($item->tags as $tag)
          <a href="{{route('tags.tag',['id' => $tag->id])}}" class="tag">{{$tag->tag_name}}</a>
        @endforeach
      </div><!-- /.tags -->
      <p class="review-text">{{$item->text}}</p>
      <div class="readmore-block">
        <i class="fas fa-angle-down readmore-i"></i>
        <span class="readmore-btn">続きを読む</span>
      </div>
      <div class="review-bottom">
        <span class="user-name">by <a href="{{ route('user', ['user_id' => $item->user_id]) }}">{{$item->getData()}}さん</span></a>
        <span class="created-at">{{$item->created_at}}</span>
        @auth
          @if (!App\Like::where('user_id', Auth::user()->id)->where('review_id', $item->id)->first())
            <span class="likes">
                <i class="fas fa-music heart like-toggle" data-review-id="{{ $item->id }}"></i>
              <span class="like-counter">{{$item->likes_count}}</span>
            </span><!-- /.likes -->
          @else
            <span class="likes">
                <i class="fas fa-music heart like-toggle liked" data-review-id="{{ $item->id }}"></i>
              <span class="like-counter">{{$item->likes_count}}</span>
            </span><!-- /.likes -->
          @endif
        @endauth
        @guest
          <span class="likes">
              <div class="balloon">
                いいねができるのはログインユーザーのみです。
              </div>
              <i class="fas fa-music heart"></i>
            <span class="like-counter">{{$item->likes_count}}</span>
          </span><!-- /.likes -->
        @endguest
      </div><!-- /.review-bottom -->
    </div><!-- /.review-right -->
  </div><!-- /.review 1投稿のお尻 -->
@endforeach
{{ $items->links('vendor.pagination.bootstrap-4')}}
