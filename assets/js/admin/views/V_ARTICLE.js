var V_ARTICLE = {
    id: 'article',
    self: null,
    l_subtitle: null,

    _initialize: function () {
        this.self = $('.m-view-article');
        this.l_subtitle = this.self.find('.m-subtitle');
    },

    _show: function (options) {
        this._bind();
        this.self.css('display', 'block');

        var uid = options['uid'];
        console.log(uid);
        this.l_subtitle.text("NR: " + uid);
    },

    _hide: function () {
        this._unbind();
        this.self.css('display', 'none');
        this.l_subtitle.text("NR:");
    },

    _bind: function () {
    },

    _unbind: function () {
        this.cards.each(function () {
            $(this).off();
        })
    }
};

