!function (a) {
    function h() {
        d = !1;
        for (var c = 0; c < b.length; c++) {
            var e = a(b[c]).filter(function () {
                return a(this).is(":appeared")
            });
            if (e.trigger("appear", [e]), g) {
                var f = g.not(e);
                f.trigger("disappear", [f])
            }
            g = e
        }
    }

    var g, b = [], c = !1, d = !1, e = {interval: 250, force_process: !1}, f = a(window);
    a.expr[":"].appeared = function (b) {
        var c = a(b);
        if (!c.is(":visible"))return !1;
        var d = f.scrollLeft(), e = f.scrollTop(), g = c.offset(), h = g.left, i = g.top;
        return i + c.height() >= e && i - (c.data("appear-top-offset") || 0) <= e + f.height() && h + c.width() >= d && h - (c.data("appear-left-offset") || 0) <= d + f.width()
    }, a.fn.extend({
        appear: function (f) {
            var g = a.extend({}, e, f || {}), i = this.selector || this;
            if (!c) {
                var j = function () {
                    d || (d = !0, setTimeout(h, g.interval))
                };
                a(window).scroll(j).resize(j), c = !0
            }
            return g.force_process && setTimeout(h, g.interval), b.push(i), a(i)
        }
    }), a.extend({
        force_appear: function () {
            return !!c && (h(), !0)
        }
    })
}(jQuery), function (a) {
    "$:nomunge";
    function e(c) {
        function n() {
            c ? f.removeData(c) : k && delete b[k]
        }

        function o() {
            g.id = setTimeout(function () {
                g.fn()
            }, l)
        }

        var f, e = this, g = {}, h = c ? a.fn : a, i = arguments, j = 4, k = i[1], l = i[2], m = i[3];
        if ("string" != typeof k && (j--, k = c = 0, l = i[1], m = i[2]), c ? (f = e.eq(0), f.data(c, g = f.data(c) || {})) : k && (g = b[k] || (b[k] = {})), g.id && clearTimeout(g.id), delete g.id, m) g.fn = function (a) {
            "string" == typeof m && (m = h[m]), m.apply(e, d.call(i, j)) !== !0 || a ? n() : o()
        }, o(); else {
            if (g.fn)return void 0 === l ? n() : g.fn(l === !1), !0;
            n()
        }
    }

    var b = {}, c = "doTimeout", d = Array.prototype.slice;
    a[c] = function () {
        return e.apply(window, [0].concat(d.call(arguments)))
    }, a.fn[c] = function () {
        var a = d.call(arguments), b = e.apply(this, [c + a[0]].concat(a));
        return "number" == typeof a[0] || "number" == typeof a[1] ? this : b
    }
}(jQuery), $(".animatedParent").appear(), $(".animatedClick").click(function () {
    var a = $(this).attr("data-target");
    if (void 0 != $(this).attr("data-sequence")) {
        var b = $("." + a + ":first").attr("data-id"), c = $("." + a + ":last").attr("data-id"), d = b;
        $("." + a + "[data-id=" + d + "]").hasClass("go") ? ($("." + a + "[data-id=" + d + "]").addClass("goAway"), $("." + a + "[data-id=" + d + "]").removeClass("go")) : ($("." + a + "[data-id=" + d + "]").addClass("go"), $("." + a + "[data-id=" + d + "]").removeClass("goAway")), d++, delay = Number($(this).attr("data-sequence")), $.doTimeout(delay, function () {
            if (console.log(c), $("." + a + "[data-id=" + d + "]").hasClass("go") ? ($("." + a + "[data-id=" + d + "]").addClass("goAway"), $("." + a + "[data-id=" + d + "]").removeClass("go")) : ($("." + a + "[data-id=" + d + "]").addClass("go"), $("." + a + "[data-id=" + d + "]").removeClass("goAway")), ++d, d <= c)return !0
        })
    } else $("." + a).hasClass("go") ? ($("." + a).addClass("goAway"), $("." + a).removeClass("go")) : ($("." + a).addClass("go"), $("." + a).removeClass("goAway"))
}), $(document.body).on("appear", ".animatedParent", function (a, b) {
    var c = $(this).find(".animated"), d = $(this);
    if (void 0 != d.attr("data-sequence")) {
        var e = $(this).find(".animated:first").attr("data-id"), f = e, g = $(this).find(".animated:last").attr("data-id");
        $(d).find(".animated[data-id=" + f + "]").addClass("go"), f++, delay = Number(d.attr("data-sequence")), $.doTimeout(delay, function () {
            if ($(d).find(".animated[data-id=" + f + "]").addClass("go"), ++f, f <= g)return !0
        })
    } else c.addClass("go")
}), $(document.body).on("disappear", ".animatedParent", function (a, b) {
    $(this).hasClass("animateOnce") || $(this).find(".animated").removeClass("go")
}), $(window).load(function () {
    $.force_appear()
});