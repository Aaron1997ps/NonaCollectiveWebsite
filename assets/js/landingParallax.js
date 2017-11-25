$(document).ready(function () {
    for (var i = 1; i <= 16; i++) {
        var index = i;

        while (index > 8) {
            index -= 8;
        }

        var speed = Math.random() * 5 + 1;
        var height = Math.random() * 40;
        var width = Math.random() * 100;
        var delay = Math.random() * 100;
        var duration = Math.random() * 200000;

        $('.m-clouds').append('<img class="m-cloud-' + i + '" src="assets/img/nature_scene/clouds/Sunny' + index + '.png">');
        var cloud = $('.m-cloud-' + i);

        cloud.css({
            'width': speed + 'em',
            'height': 'auto',
            'top': height + '%',
            'left':  width + '%',
            'position': 'absolute',
            'animation-delay' : delay + 'ms',
            'animation-duration' : duration + 'ms'
        });
    }

    $(window).scroll(function () {

        var currentScroll = $(this).scrollTop();


        var back = $('.m-canvas > img:nth-child(2)');
        var mid = $('.m-canvas > img:nth-child(3)');

        mid.css({'top': currentScroll / 4 + 'px'});
        back.css({'top': currentScroll / 2 + 'px'});
    });
});