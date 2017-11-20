$(document).ready(function () {
    if (window.navigator.msPointerEnabled)
        return false;

    var where = 0;
    var time;
    var interval;


    $(window).on('mousewheel DOMMouseScroll', function (e) {
        e.preventDefault();
        where += e.originalEvent.deltaY;
        where = Math.min(Math.max(where, 0), 99999999);
        time = 0;

        var current = $(window).scrollTop();
        var dest = where - current;
        var speed = 50;
        clearInterval(interval);

        interval = setInterval(function () {
            var scrollto = Math.linearTween(time, current, dest, speed);
            console.log(scrollto);

            $(window).scrollTop(scrollto);

            time++;
            if (time > speed) {
                clearInterval(interval);
            }
        }, 1);
    });

    Math.linearTween = function (t, b, c, d) {
        return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;
    };






    $(window).scroll(function () {

        var currentScroll = $(this).scrollTop();

        var back = $('.m-canvas img:nth-child(2)');
        var mid = $('.m-canvas img:nth-child(3)');

        //console.log(currentScroll);
        mid.css({'top': currentScroll / 4 + 'px'});
        back.css({'top': currentScroll / 2 + 'px'});
    });
});