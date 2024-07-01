var gjoSe = gjoSe || {};

gjoSe.cookiesdirective = {

    $container: null,
    $btn: null,
    cookieName: 'cookiesdirective',

    init: function () {
        var self = this;

        this.$container = $('#cookiesdirective');
        if (this.$container.length == 0) {
            return;
        }

        this.$btn = this.$container.find('#cookiesdirectiveAccept');

        var accepted =  Cookies.get(this.cookieName);
        if (accepted !== '1') {
            this.show();
        }

        this.$btn.click(function () {

            Cookies.set(self.cookieName, 1, {
                expires: 365,
                path: '/'
            });
            self.hide();
            location.reload();
        });
    },

    show: function () {
        this.$container.removeClass('d-none');
        this.$container.slideDown(2000);
    },

    hide: function () {
        this.$container.slideUp(1000);
    }

}

$(document).ready(function () {
    gjoSe.cookiesdirective.init()
});