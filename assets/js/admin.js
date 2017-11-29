$(document).ready(function () {
    $('.m-logout').click(function () {
        api.auth.logout(function (data) {
            console.log(data.success);
            location.reload();
        });
    });

    $('.m-card').click(function () {
        console.log(1);
        var t = $(this);
        console.log(t);

        $('#m-overlay').addClass('m-active');
        t.addClass('m-active');

    })

    $('#m-overlay').click(function () {
        $('#m-overlay').removeClass('m-active');
        $('.m-card.m-active').removeClass('m-active');
    })
});