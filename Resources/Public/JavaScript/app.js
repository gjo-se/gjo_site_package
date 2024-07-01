$(document).ready(function(){
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 250) {
                $('.scroll').addClass('active');
            } else {
                $('.scroll').removeClass('active');
            }
        });

        // scroll body to 0px on click
        $('.move-top').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });
});
$(document).ready(function() {
    $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
            var e = $(this.hash);
            if (e = e.length ? e : $("[name=" + this.hash.slice(1) + "]"), e.length) return $("html, body").animate({
                scrollTop: e.offset().top - 0
            }, 1e3), !1
        }
    })
});
$(document).ready(function () {	
    $('ul li:has(ul.submenu-list)').addClass('has-submenu');
    // remove link from main menu entries with submenu for onclick event -SP
    $('.parent-menu.has-submenu').addClass('not-click');
    $('.not-click > a').addClass('no-href');
    $('.no-href').attr('href', '#');

    $('.content-slider').slick({
        dots: false,
        infinite: true,
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: false
    });

    $('.head-slider').on('init', function (event, slick) {
        $('.slick-active .slider-text').addClass('animated go');
    });

    $('.head-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        slide: '.slider',
        asNavFor: '.slider-tabs',
        // autoplay: true,
        autoplaySpeed: 8000,
        pauseOnHover: false
    });

    $('.slider-tabs').slick({
        slidesToShow: 4,
        slide: '.slide-link',
        asNavFor: '.head-slider',
        arrows: false,
        focusOnSelect: true
    });

    $('.head-slider').on('beforeChange', function (event, slick, slide, nextSlide) {
        $('.slider-tabs').find('.slick-slide').removeClass('slick-current').not('.slick-cloned').eq(nextSlide).addClass('slick-current');
    });

    $('.head-slider').on('afterChange', function (event, slick, currentSlide) {
        $('.slick-active .slider-text').addClass('animated go');
    });

    $('.head-slider').on('beforeChange', function (event, slick, currentSlide) {
        $('.slick-active .slider-text').removeClass('animated go');
    });
    $('.reference-slider').slick({
        dots: false,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1
    });
    $('.news-slider').slick({
        dots: false,
        infinite: true,
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: false
    });
    $('.nfo-close').click(function () {
        $('.tab-content').removeClass('current');
        $('.tab-boxes .box').removeClass('current');
    });
    $('.tab-boxes .box').click(function () {
        var tab_id = $(this).attr('data-tab');

        $('.tab-boxes .box').removeClass('current');
        $('.tab-content').removeClass('current');

        $(this).addClass('current');
        $("#" + tab_id).addClass('current');
        $("#" + tab_id).fadeIn('slow');
    });
    $('.tab-boxes .box .button-box').click(function () {
        var tab_id = $(this).parent().attr('data-tab');

        $('.tab-boxes .box').removeClass('current');
        $('.tab-content').removeClass('current');

        $(this).parent().addClass('current');
        $("#" + tab_id).addClass('current');
        $("#" + tab_id).fadeIn('slow');
    });
    $('ul.tabs li').click(function () {
        var clicked = $(this);
        var tab_id = clicked.attr('data-tab');
        var container_id = "#" + clicked.parents('.tab-container').attr('id').toString() + ' ';

        $(container_id + 'ul.tabs li').removeClass('current');
        $(container_id + '.tab-panel').removeClass('current');


        $(container_id + 'ul.tabs li[data-tab=' + tab_id + ']').addClass('current');
        $(container_id + "#" + tab_id).addClass('current');
    });
    $('.accordion-title').click(function (e) {
        e.preventDefault();

        var $this = $(this);

        if ($this.hasClass('is-active')) {
            $this.removeClass('is-active');
            $this.next().slideUp(350);
        } else {
            $this.parent().parent().find('li .accordion-title').removeClass('is-active');
            $this.parent().parent().find('li .accordion-content').slideUp(350);
            $this.toggleClass('is-active');
            $this.next().slideToggle(350);
        }
    });
    $("a.image-popup").fancybox();
});
