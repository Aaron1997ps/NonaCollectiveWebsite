$.prototype.l_markRed = function () {
    var l = $(this);
    l.addClass('m-red');
    setTimeout(function () {
        l.removeClass('m-red');
    }, 2000);
};

/**
 * checks if the label is filled
 * @returns {boolean}
 */
$.prototype.l_checkLength = function () {
    if ($(this).val().length === 0) {
        $(this).l_markRed();
        return false;
    }
    return true;
};