$(document).ready(function () {
    $('.m-logout').click(function () {
        api.auth.logout(function (data) {
            console.log(data.success);
            location.reload();
        });
    });
});