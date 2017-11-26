var scrollToInterval;
$(document).ready(function () {
    $("a[href]").click(function (e) {
        if ($(this).attr('href').startsWith("http://")) return;
        e.preventDefault();

        console.log("scroll to" + $(this).attr('href'));

        var time = 0;
        var duration = 200;
        var start = $(window).scrollTop();
        var end = $('#' + $(this).attr('href').split("#")[1]).offset().top - 25;
        console.log(end);

        var dest = end - start;


        scrollToInterval = setInterval(function () {
            var scroll = Math.out(time, start, dest, duration);
            updateScroll();
            $(window).scrollTop(scroll);

            time++;
            if (time > duration) {
                clearInterval(scrollTo);
            }
        }, 1);
    })
});