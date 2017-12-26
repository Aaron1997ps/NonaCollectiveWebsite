var V_ARTICLE = {
    id: 'article',
    self: null,

    _initialize: function () {
        this.self = $('.m-view-article');
    },

    _show: function (options) {
        this._bind();
        this.self.css('display', 'block');

        var uid = options['uid'];
    },

    _hide: function () {
        this._unbind();
        this.self.css('display', 'none');
    },

    _bind: function () {
    },

    _unbind: function () {
        this.cards.each(function () {
            $(this).off();
        })
    }
};

