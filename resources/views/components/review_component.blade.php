@foreach ($reviews as $review)
  <div class="review">    
    <div class="review-left">
      <a href="{{ route('user', ['user_id' => $review->user_id]) }}" class="user-image">
        @env('local')
          @if ($review->user->user_image)
            <img src="/storage/uploads/{{ $review->user->user_image }}" alt="">
          @else
            <img src="images/icons8-user-male-30-black.png" alt="">
          @endif
        @endenv
        @production
          <img src="images/icons8-user-male-30-black.png" alt="">
        @endproduction
      </a>
    </div><!-- /.review-left -->
    <div class="review-right">
      <div class="review-top">
        <h2>{{$review->live_date}} {{$review->title}}</h2>
        <!-- ドロップダウンメニュー -->
        <div class="review-dropdown-wrapper">
          <i class="fas fa-ellipsis-h showIcon"></i>
          <ul class="review-dropdown">
            @auth
            @if (Auth::user()->id === $review->user_id)
            <a href="{{ route('edit', ['id' => $review->id]) }}">
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
        @foreach ($review->tags as $tag)
          <a href="{{route('tags.tag', ['tag_name' => $tag->tag_name])}}" class="tag">{{$tag->tag_name}}</a>
        @endforeach
      </div><!-- /.tags -->
      <p class="review-text">{{$review->text}}</p>
      <div class="readmore-block">
        <i class="fas fa-angle-down readmore-i"></i>
        <span class="readmore-btn">続きを読む</span>
      </div>
      <div class="review-bottom">
        <span class="user-name">by <a href="{{ route('user', ['account_name' => $review->user->account_name]) }}">{{$review->user->account_name}}さん</span></a>
        <span class="created-at">{{$review->created_at}}</span>
        @auth
          @if (!$review->isLikedBy(Auth::user()))
            <span class="likes">
                <i class="fas fa-music heart like-toggle" data-review-id="{{ $review->id }}"></i>
              <span class="like-counter">{{$review->likes_count}}</span>
            </span><!-- /.likes -->
          @else
            <span class="likes">
                <i class="fas fa-music heart like-toggle liked" data-review-id="{{ $review->id }}"></i>
              <span class="like-counter">{{$review->likes_count}}</span>
            </span><!-- /.likes -->
          @endif
        @endauth
        @guest
          <span class="likes">
            <div class="balloon">
              いいねができるのはログインユーザーのみです。<br>
            <a href="{{ route('login') }}">ログイン </a>または<a href="{{ route('register') }}"> 新規登録 </a>する
            </div>
              <i class="fas fa-music heart"></i>
            <span class="like-counter">{{$review->likes_count}}</span>
          </span><!-- /.likes -->
        @endguest
      </div><!-- /.review-bottom -->
    </div><!-- /.review-right -->
  </div><!-- /.review 1投稿のお尻 -->
@endforeach
{{ $reviews->links('vendor.pagination.bootstrap-4')}}
