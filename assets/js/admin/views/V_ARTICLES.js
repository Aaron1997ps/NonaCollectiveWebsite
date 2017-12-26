var V_ARTICLES = {
    id: 'articles',
    self: null,
    updates: [],

    _initialize: function () {
        var self = this;
        self.self = $('.m-view-articles');

        self.updates = self.self.find('.m-cards > .m-article');
    },

    _show: function () {
        this._bind();
        this.self.css('display', 'block');
    },

    _hide: function () {
        this._unbind();
        this.self.css('display', 'none');
    },

    _bind: function () {
        this.updates.click(function () {
            viewManager.open('article', {'uid': $(this).attr('uid')});
        });
    },

    _unbind: function () {
        this.updates.off();
    }
};