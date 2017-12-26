var V_ARTICLES = {
    id: 'articles',
    self: null,
    updates: [],

    _initialize: function () {
        var self = this;
        self.self = $('.m-view-articles');

        self.updates = self.self.find('.m-update');

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
    },

    _unbind: function () {
    }
};