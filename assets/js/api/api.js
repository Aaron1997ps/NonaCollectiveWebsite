/**
 * Article
 * @param {int} id
 * @param {string} title
 * @param {string} subtitle
 * @param {int} timestamp
 * @param {string} category
 * @param {string} html
 * @class
 */
var __Article = function (id, title, subtitle, timestamp, category, html) {
    this.id = id;
    this.title = title;
    this.subtitle = subtitle;
    this.timestamp = timestamp;
    this.category = category;
    this.html = html;
};

var api = {
    send: function (url, param, call) {
        console.log(url);
        $.ajax({
            type: "POST",
            url: '/api/v1' + url,
            data: param,
            success: function (data) {
                console.log(data);

                if(typeof call === 'function')
                    call(data);
            },
            dataType: 'json'
        });
    },

    auth: {
        endpoint: "/auth/",
        send: function (url, param, call) {
            api.send(this.endpoint + url, param, call)
        },
        login: function (user, password, call) {
            //password = sha256(password);
            this.send("login", {username: user, password: password}, call)
        },
        logout: function (call) {
            this.send("logout", {}, call)
        }
    },

    elements: {
        endpoint: "/elements/",
        send: function (url, param, call) {
            api.send(this.endpoint + url, param, call)
        },
        getDescription: function (name, call) {
            this.send("getDescription", {name: name}, function (data) {
                if (!data.success) {
                    console.log("CRITICAL: couldn't load description of the element " + name);
                    return;
                }
                call(data.response);
            })
        },
        setDescription: function (name, description, call) {
            this.send("setDescription", {name: name, description: description}, function (data) {
                if (!data.success) {
                    console.log("CRITICAL: couldn't save description of the element " + name);
                    return;
                }
                call();
            })
        }
    },

    articles: {
        endpoint: "/articles/",
        send: function (url, param, call) {
            api.send(this.endpoint + url, param, call)
        },
        getArticle: function (id, call) {
            this.send("getArticle", {id: id}, function (data) {
                if (!data.success) {
                    console.log("CRITICAL: couldn't load article " + id);
                    return;
                }
                var data1 = data.response[0];
                call(new __Article(data1['id'], data1['title'], data1['subtitle'], data1['date'], data1['category_id'], data1['html']));
            })
        },
        // setDescription: function (name, description, call) {
        //     this.send("setDescription", {name: name, description: description}, function (data) {
        //         if (!data.success) {
        //             console.log("CRITICAL: couldn't save description of the element " + name);
        //             return;
        //         }
        //         call();
        //     })
        // }
    }

};

/*
api.auth.login('reolat', 'hashed', function (data) {
    if (data.success) {

        api.elements.setDescription('water', 'wasser ist toll! ' + Math.random(), function (data) {
            if (data.success) {
                api.elements.getDescription('water', function (data) {
                    if (data.success) {
                        console.log("----->" + data.response);
                        api.auth.logout(function () {
                            if (data.success) {

                            }
                        });
                    }
                });
            }
        });

    }
});*/



