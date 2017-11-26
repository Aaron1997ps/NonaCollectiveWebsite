var speed = 150;
var distance = 50;

function getOS() {
    var userAgent = window.navigator.userAgent,
        platform = window.navigator.platform,
        macosPlatforms = ['Macintosh', 'MacIntel', 'MacPPC', 'Mac68K'],
        windowsPlatforms = ['Win32', 'Win64', 'Windows', 'WinCE'],
        iosPlatforms = ['iPhone', 'iPad', 'iPod'],
        os = null;

    if (macosPlatforms.indexOf(platform) !== -1) {
        os = 'Mac OS';
    } else if (iosPlatforms.indexOf(platform) !== -1) {
        os = 'iOS';
    } else if (windowsPlatforms.indexOf(platform) !== -1) {
        os = 'Windows';
    } else if (/Android/.test(userAgent)) {
        os = 'Android';
    } else if (!os && /Linux/.test(platform)) {
        os = 'Linux';
    }

    return os;
}

var currentScroll;

function updateScroll() {
    currentScroll = $(window).scrollTop();
}

$(document).ready(function () {
    updateScroll();
    if (window.navigator.msPointerEnabled)
        return false;

    if (getOS() !== 'Windows') {
        return false;
    }



    var time;
    var interval;
    var scrolling = false;


    $(window).on('mousewheel DOMMouseScroll', function (e) {
        clearInterval(scrollToInterval);
        scrolling = true;
        e.preventDefault();

        currentScroll += e.originalEvent.deltaY;

        if (e.originalEvent.deltaY > 0)
            currentScroll += distance;
        else
            currentScroll -= distance;

        currentScroll = Math.min(Math.max(currentScroll, 0), $('body').height());
        time = 0;

        var current = $(window).scrollTop();
        var dest = currentScroll - current;

        clearInterval(interval);

        if (!scrolling) {
            interval = setInterval(function () {
                var scrollto = Math.inout(time, current, dest, speed);

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
        return -c / 2 * (Math.cos(Math.PI * t / d) - 1) + b;
    };
    Math.out = function (t, b, c, d) {
        return c * ( -Math.pow(2, -10 * t / d) + 1 ) + b;
    };
});