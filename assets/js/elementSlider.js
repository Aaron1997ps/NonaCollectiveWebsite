var slider;

$(document).ready(function () {
    slider = $('.m-element-slider');

    slider.find('.m-left').click(function () {
        changeElements(1);
    });

    slider.find('.m-right').click(function () {
        changeElements(-1);
    });
});

function changeElements(change) {
    var tmp = [];

    for (var i = 1; i <= 9; i++) {
        tmp[i] = slider.find('.m-0' + i);
        console.log(tmp[i]);
    }


    for (var i = 1; i <= 9; i++) {
        var element = tmp[i];
        console.log(element);
        var ne = (i + change);
        if (ne > 9) ne = 1;
        if (ne < 1) ne = 9;

        element.addClass('m-0' + ne);
        element.removeClass('m-0' + i);
    }
}