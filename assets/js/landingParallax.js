$(document).ready(function () {
    if (window.navigator.msPointerEnabled)
        return false;

    var where = $(document).scrollTop();
    var time;
    var interval;
    var scrolling = false;


    $(window).on('mousewheel DOMMouseScroll', function (e) {
        scrolling = true;
        e.preventDefault();
        where += e.originalEvent.deltaY;
        where = Math.min(Math.max(where, 0), $('body').height());
        time = 0;

        var current = $(window).scrollTop();
        var dest = where - current;
        var speed = 75;
        clearInterval(interval);

        if (!scrolling) {
            interval = setInterval(function () {
                var scrollto = Math.inout(time, current, dest, speed);
                console.log(scrollto);

                $(window).scrollTop(scrollto);

                time++;
                if (time > speed) {
                    scrolling = false;
                    clearInterval(interval);
                }
            }, 1);
        }

        if (scrolling) {
            interval = setInterval(function () {
                var scrollto = Math.out(time, current, dest, speed);
                console.log(scrollto);

                $(window).scrollTop(scrollto);

                time++;
                if (time > speed) {
                    scrolling = false;
                    clearInterval(interval);
                }
            }, 1);
        }
    });

    Math.inout = function (t, b, c, d) {
        return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;
    };
    Math.out = function (t, b, c, d) {
        return c * ( -Math.pow( 2, -10 * t/d ) + 1 ) + b;
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