var V_MODULES = {
    id: 'modules',
    self: null,
    cards: null,

    _initialize: function () {
        this.self = $('.m-view-modules');
        this.cards = this.self.find('.m-cards > .m-card');
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
        this.cards.each(function () {
            $(this).click(function () {
                var target = $(this).attr('target');

                viewManager.open(target);
            });
        });
    },

    _unbind: function () {
        this.cards.each(function () {
            $(this).off();
        })
    }
};

