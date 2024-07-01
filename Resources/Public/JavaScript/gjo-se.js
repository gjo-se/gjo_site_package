//ProductSet / AccessoryKit

$('.accessoryKitNavTabs a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');

    $('html, body').animate({
        scrollTop: $('#accessoryKitTabPanesContent').offset().top
    }, 'slow');

    $(this).removeClass('active');
})

$(document).ready(function () {

    //initialize MDB-Select
    // $('.mdb-select').material_select();
    $('.mdb-select').materialSelect();

    // TODO: alles was Slick ist, kann raus
    // productSet: ProductSetImage and tecnicalDrawings (small)
    $('.productset-image-slider').slick({
        slidesToShow: 1,
        variableWidth: true,
        autoplay: false,
        arrows: true,
        asNavFor: '.productset-image-main-slider',
        focusOnSelect: true
    });

    // productSet: ProductSetImage and tecnicalDrawings (Main/Big)
    $('.productset-image-main-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.productset-image-slider'
    });

    // product: ProductImages (small)
    $('.productset-product-slider').slick({
        slidesToShow: 1,
        variableWidth: true,
        autoplay: false,
        arrows: true,
        asNavFor: '.productset-product-main-slider',
        focusOnSelect: true
    });

    // product: ProductImages (big)
    $('.productset-product-main-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.productset-product-slider'
    });

    // accessoryKit: ProductSetImage and tecnicalDrawings (small)
    $('.productset-image-slider-accessory-kit').slick({
        slidesToShow: 1,
        variableWidth: true,
        autoplay: false,
        arrows: true,
        asNavFor: '.productset-image-main-slider-accessory-kit',
        focusOnSelect: true
    });

    // accessoryKit: ProductSetImage and tecnicalDrawings (Main/Big)
    $('.productset-image-main-slider-accessory-kit').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.productset-image-slider-accessory-kit'
    });

    // accessoryKit: ProductImages (small)
    $('.productset-product-slider-accessory-kit').slick({
        slidesToShow: 1,
        variableWidth: true,
        autoplay: false,
        arrows: true,
        asNavFor: '.productset-product-main-slider-accessory-kit',
        focusOnSelect: true
    });

    // accessoryKit: ProductImages (big)
    $('.productset-product-main-slider-accessory-kit').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.productset-product-slider-accessory-kit'
    });

    // BUG: Initial shows Image not correct, after the first click is ok

    // var $firstImage = $( '.productset-product-slider img' );
    // $firstImage.trigger( "click" );
    //
    // console.log('firstIamge: ' + $firstImage);
    // var debugInput = $firstImage;
    // for (var i in debugInput) {
    //     console.log(i + ' // ' + debugInput[i]);
    // }


    // Visbility ImageMainSlider
    $('.productset-product-slider').click(function () {
        $('.productset-image-main-slider').parent().addClass('d-none');
        $('.productset-product-main-slider').parent().removeClass('d-none');
    });

    $('.productset-image-slider').click(function () {
        $('.productset-product-main-slider').parent().addClass('d-none');
        $('.productset-image-main-slider').parent().removeClass('d-none');
    });

    $('.productset-product-slider-accessory-kit').click(function () {
        $('.productset-image-main-slider-accessory-kit').parent().addClass('d-none');
        $('.productset-product-main-slider-accessory-kit').parent().removeClass('d-none');
    });

    $('.productset-image-slider-accessory-kit').click(function () {
        $('.productset-product-main-slider-accessory-kit').parent().addClass('d-none');
        $('.productset-image-main-slider-accessory-kit').parent().removeClass('d-none');
    });

    //FancyBox
    $("a.productset-image-main-fancy").fancybox({
        loop: true
    });
    $("a.productset-product-main-fancy").fancybox({
        loop: true
    });

    $('#btn-search-main').click(function (event) {
        event.preventDefault();
        $('.searchbar').toggleClass('d-none');
        $('.searchbar .form-control').focus();
    });

    // function initOpenClose() {
    //     jQuery('#btn-search-main').openClose({
    //         hideOnClickOutside: true,
    //         activeClass: 'active',
    //         opener: 'a.btn-search',
    //         slider: '.searchbar',
    //         animSpeed: 400,
    //         effect: 'fade'
    //     });
    // }

    //MDB Slider - Change Image by mouseOver On Thumbnail

    var $carouselIndicators = $('ol.carousel-indicators li');
    if ($carouselIndicators.length > 0) {
        $carouselIndicators.each(function () {
            $(this).on('mouseover', function () {
                $(this).trigger('click');
            });
        });
    }

    // scroll body to 0px on click
    $('.move-top').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });


});


// TODO: wenn mit Anker aufgerufen, dann hier auswerten
