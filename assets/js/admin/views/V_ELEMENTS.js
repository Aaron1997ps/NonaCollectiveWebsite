var V_ELEMENTS = {
    id: 'elements',
    self: null,
    elements: [],

    _initialize: function () {
        var self = this;
        self.self = $('.m-view-elements');

        var elem = self.self.find('.m-cards > .m-card');

        elem.each(function () {
            var that = $(this);
            self.elements.push(new ELEMENT(that));
        });
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
        this.elements.forEach(function (element) {
            element.bind();
        });
    },

    _unbind: function () {
        this.elements.forEach(function (element) {
            element.unbind();
        })
    }
};

var ELEMENT = function (query) {
    this.self = query;
    this.id = this.self.attr('name');

    this.overlay = $('#m-overlay');

    this.bind = function () {
        var self = this;
        this.self.click(function () {
            self.open();
        });
    };

    this.unbind = function () {
        this.self.off();
    };

    this.open = function () {
        var self = this;

        self.self.addClass('m-active');
        self.overlay.addClass('m-active');
        self.overlay.click(function () {
            self.close();
        });

        self.loadDescription();
        self.unbind();

        self.self.find('.m-save').click(function () {
            self.saveDescription();
        })
    };

    this.close = function () {
        this.self.removeClass('m-active');
        this.overlay.off();
        this.overlay.removeClass('m-active');

        this.self.find('.m-save').off();
        this.bind();
        this.clear();
    };

    this.clear = function () {
        this.self.find('.m-description').html('LOADING....');
    };

    this.loadDescription = function () {
        var self = this;

        api.elements.getDescription(self.id, function (data) {
            self.self.find('.m-description').html(data);
        })
    };

    this.saveDescription = function () {
        var self = this;

        var description = self.self.find('.m-description').html();
        api.elements.setDescription(self.id, description, function () {
            self.close();
        });
    }
};