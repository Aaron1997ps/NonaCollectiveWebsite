$(document).ready(function () {
    $(window).scroll(function () {

        var currentScroll = $(this).scrollTop();

        var back = $('.m-canvas img:nth-child(2)');
        var mid = $('.m-canvas img:nth-child(3)');

        //console.log(currentScroll);
        mid.css({'top': currentScroll / 4 + 'px'});
        back.css({'top': currentScroll / 2 + 'px'});
    });
});