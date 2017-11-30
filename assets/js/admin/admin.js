var views = [V_MODULES, V_ELEMENTS];

$(document).ready(function () {
    views.forEach(function (view) {
        view._initialize();
    });

    viewManager.open('modules');
});

var viewManager = {
    current: null,
    getFromId: function (id) {
        for (var view in views) {
            if (!views.hasOwnProperty(view)) continue;
            view = views[view];

            if (view.id === id) {
                return view;
            }
        }
        return null;
    },
    open: function (id) {
        var view = this.getFromId(id);
        if (!view) {
            console.log("CRITICAL: can't open view " + id + "!");
            return;
        }

        if (this.current !== null) {
            this.current._hide();
        }

        view._show();
        this.current = view;
    }
};