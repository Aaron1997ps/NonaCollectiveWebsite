var slider;

$(document).ready(function () {
    slider = $('.m-element-slider');

    slider.find('.m-left').click(function () {
        changeElements(1);
    });

    slider.find('.m-right').click(function () {
        changeElements(-1);
    });

    updateClick();
});

function updateClick() {
    //unbind all clicking functions
    slider.find('.m-element').off();

    for (var i = 1; i <= 9; i++) {
        var element = slider.find('.m-0' + i);

        element.attr('index', i);
        console.log(element.attr('index'));


        element.click(function () {
            console.log(5 - $(this).attr('index'));
            changeElements(5 - $(this).attr('index'));
        });
    }
}

function changeElements(change) {
    if (change === 0) return;
    var tmp = [];

    for (var i = 1; i <= 9; i++) {
        tmp[i] = slider.find('.m-0' + i);
    }


    for (var i = 1; i <= 9; i++) {
        console.log(i);
        var element = tmp[i];

        var ne = (i + change);
        if (ne > 9) ne = ne - 9;
        if (ne < 1) ne = ne + 9;

        element.addClass('m-0' + ne);
        element.removeClass('m-0' + i);

    }

    //get current element
    var current = slider.find('.m-05');

    //set name
    slider.find('.m-text-title').text(current.attr('name'));

    //set desc
    slider.find('.m-text-desc').text(current.attr('description'));

    updateClick();
}
