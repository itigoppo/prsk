require('./bootstrap');

$(function () {
    // ページ内移動
    const pageMove = $('#page-move');
    pageMove.hide();
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            pageMove.fadeIn();
        } else {
            pageMove.fadeOut();
        }
    });

    $('#page-top').on('click', function () {
        $('html, body').animate({scrollTop: 0}, 500);
    });
    $('#page-bottom').on('click', function () {
        $('html, body').animate({scrollTop: $('body').get(0).scrollHeight}, 500);
    });

    $('.crud-flash').fadeIn(1000).delay(1000).fadeOut(1000);
});
