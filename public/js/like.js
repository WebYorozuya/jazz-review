$(function () {
  let like = $('.like-toggle');
  let likeReviewId; //なぜここで宣言しないといけない？
  like.on('click', function () {
    let $this = $(this);
    likeReviewId = $this.data('review-id');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      },
      url: '/like',
      method: 'POST',
      data: {
        'review_id': likeReviewId
      },
    })
    .done(function (data) {
      $this.toggleClass('liked');
      if($this.hasClass('liked')) {
          $this.addClass('heart-move');
          setTimeout(function() {
            $touch.removeClass('heart-move');
            }, 500);
      }
      $this.next('.like-counter').html(data.review_likes_count);
    })
    .fail(function (err) {
      console.log('fail');
      console.log(err);
    });
  });
  });
