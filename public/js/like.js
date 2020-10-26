$(function () {
  let like = $('.like-toggle');
  let likeReviewId;
  like.on('click', function () {
    let $this = $(this);
    likeReviewId = $this.data('review-id');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      },
      url: '/like',
      type: 'POST',
      data: {
        'review_id': likeReviewId
      },
    })
    .done(function (data) {
      $this.toggleClass('liked');
      $this.next('.like-counter').html(data.review_likes_count);
    })
    .fail(function (err) {
      console.log('fail'); 
      console.log(err);
    });
    // return false; これいるのか？？
  });
  });
