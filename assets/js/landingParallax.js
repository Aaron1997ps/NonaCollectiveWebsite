$(document).ready(function () {
    for (var i = 1; i <= 8; i++) {
        var speed = Math.random() * 5 + 1;
        var height = Math.random() * 40;
        var duration = getRandomArbitrary(30, 60);
        var delay = getRandomArbitrary(0, duration);

        spawnCloud(speed, height, -delay, duration)
    }

    setInterval(function () {
        var speed = Math.random() * 5 + 1;
        var height = Math.random() * 40;
        var delay = Math.random() * 5;
        var duration = getRandomArbitrary(30, 60);

        spawnCloud(speed, height, 0, duration)
    }, 2000);

    $(window).scroll(function () {

        var currentScroll = $(this).scrollTop();


        var back = $('.m-canvas > img:nth-child(2)');
        var mid = $('.m-canvas > img:nth-child(3)');

        mid.css({'top': currentScroll / 4 + 'px'});
        back.css({'top': currentScroll / 2 + 'px'});
    });
});

var cloudI = 1;
var i = 1;
function spawnCloud(speed, height, delay, duration) {
    while (cloudI > 8) {
        cloudI -= 8;
    }

    $('.m-clouds').append('<img class="m-cloud-' + i + '" src="assets/img/nature_scene/clouds/Sunny' + cloudI + '.png">');
    var cloud = $('.m-cloud-' + i);

    cloud.css({
        'width': speed + 'em',
        'height': 'auto',
        'top': height + '%',
        'left':  '-20%',
        'position': 'absolute',
        'animation-duration' : duration + 's',
        'animation-delay' : delay + 's'
    });

    setTimeout(function () {
        cloud.remove();
    }, duration *1000 + 10);

    cloudI++;
    i++;
}

function getRandomArbitrary(min, max) {
    return Math.random() * (max - min) + min;
}