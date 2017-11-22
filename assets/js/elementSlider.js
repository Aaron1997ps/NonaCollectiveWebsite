var slider;

$(document).ready(function () {
    slider = $('.m-element-slider');

    slider.find('.m-left').click(changeElements(-1));
    slider.find('.m-right').click(changeElements(1));
});

function changeElements(change) {
    for (var i = 1; i <= 9; i++) {
        var element = slider.find('.m-0' + i);
        element.addClass('m-0' + i + change);
        element.removeClass('m-0' + i);
    }
}