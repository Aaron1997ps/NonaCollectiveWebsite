$(document).ready(function () {
    login.initialize();

    login.l_username.val('reolat');
    login.l_password.val('hashed');
    login.b_login.click();
});

var login = {
    content: null,
    l_username: null,
    l_password: null,
    b_login: null,

    initialize: function () {
        this.content = $('.m-login-content');
        this.l_username = this.content.find('.m-username');
        this.l_password = this.content.find('.m-password');
        this.b_login = this.content.find('.m-login');
        this.rebindFunctions();
    },

    rebindFunctions: function () {
        this.content.find('.m-login').off();
        this.content.find('.m-login').click(login.login);

        $(document).off();
        $(document).keypress(function (ev) {
            if(ev.originalEvent.keyCode === 13) login.login();
        });
    },

    login: function () {
        var l1 = login.l_username.l_checkLength();
        var l2 = login.l_password.l_checkLength();
        if (!l1 || !l2 ) {
            return;
        }

        api.auth.login(login.l_username.val(), login.l_password.val(), function (data) {
           if (!data.success) {
               console.log("FAIL");
               login.l_username.l_markRed();
               login.l_password.l_markRed();
               return;
           }

            console.log("yee");
            location.reload();
        });
    }
};