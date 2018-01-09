var V_ARTICLE = {
    id: 'article',
    self: null,
    uid: null,
    article: null,
    l_subtitle: null,

    _initialize: function () {
        this.self = $('.m-view-article');
        this.l_subtitle = this.self.find('.m-subtitle');
    },

    _show: function (options) {
        if (options === undefined || options['uid'] === undefined && options['uid'] === null) {
            console.log('FATAL ERR: CAN\'T LOAD ARTICLE BECAUSE UID IS NULL!!');
            return;
        }

        self.uid = options['uid'];
        api.articles.getArticle(self.uid, function (data) {
            console.log(data);
            self.article = data;
        });

        this._bind();
        this.self.css('display', 'block');

        this.l_subtitle.text("NR: " + self.uid);
    },

    _hide: function () {
        this._unbind();
        this.self.css('display', 'none');
        this.l_subtitle.text("NR:");
    },

    _bind: function () {
    },

    _unbind: function () {
    }
};
