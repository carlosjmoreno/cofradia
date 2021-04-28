window.addEventListener("load", function(){
        
    jQuery(document).ready(function($){
        "use scrict";

        $("body").addClass("page-loaded");

    });

});

jQuery(document).ready(function ($) {
    "use strict";
    $(function () {
        $('#mainslider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: '60px',
            autoplay: true,
            autoplaySpeed: 12000,
            infinite: true,
            prevArrow: $('.prev'),
            nextArrow: $('.next'),
            responsive: [
                {
                    breakpoint: 1600,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 678,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });

        $('.header-slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 12000,
            infinite: true,
            nextArrow: '<i class="slide-nav icon-right"></i>',
            prevArrow: '<i class="slide-nav icon-left"></i>',
            responsive: [
                {
                    breakpoint: 1600,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 678,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });


        $(".gallery-columns-1, .wp-block-gallery.columns-1").each(function () {
            $(this).slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: true,
                autoplay: true,
                autoplaySpeed: 8000,
                infinite: true,
                dots: true,
                nextArrow: '<i class="slide-nav icon-right"></i>',
                prevArrow: '<i class="slide-nav icon-left"></i>',
            });
        });

    });

    $(function () {
        jQuery('.widget-area').theiaStickySidebar({
            additionalMarginTop: 30
        });
    });

    $(function () {
        var pageSection = $(".data-attrbg");
        pageSection.each(function (indx) {
            if ($(this).attr("data-background")) {
                $(this).css("background-image", "url(" + $(this).data("background") + ")");
            }
        });
    });

    $(function () {
        $('.icon-search').on('click', function (event) {
            $('body').toggleClass('united-model');
            $('body').addClass('window-scroll-locked');
            setTimeout(function () { 
                $('.model-search-wrapper .search-field').focus();
            }, 300);
            
        });
        $('.cross-exit').on('click', function (event) {
            $('body').removeClass('united-model');
            $('body').removeClass('window-scroll-locked');
            $('.icon-search').focus();
        });

        $(document).keyup(function(j) {
            if (j.key === "Escape") {
                $('body').removeClass('united-model');
                $('body').removeClass('window-scroll-locked');
                $('.icon-search').focus();
            }
        });

        $('.searchbar-skip-link').focus(function(){
            $('.model-search .search-submit').focus();
        });

        $( 'input, a, button' ).on( 'focus', function() {
            if ( $( 'body' ).hasClass( 'united-model' ) ) {

                if ( ! $( this ).parents( '.model-search' ).length ) {
                    $('.cross-exit').focus();
                }
            }
        } );

    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scroll-up').fadeIn();
        } else {
            $('.scroll-up').fadeOut();
        }
    });

    $('.scroll-up').on("click", function (e) {
        $("html, body").animate({scrollTop: 0}, 600);
        return false;
    });

    $(".gallery, .blocks-gallery-item").each(function () {
        $(this).magnificPopup({
            delegate: 'a',
            type: 'image',
            closeOnContentClick: false,
            closeBtnInside: false,
            mainClass: 'mfp-with-zoom mfp-img-mobile',
            image: {
                verticalFit: true,
                titleSrc: function (item) {
                    return item.el.attr('title');
                }
            },
            gallery: {
                enabled: true
            },
            zoom: {
                enabled: true,
                duration: 300,
                opener: function (element) {
                    return element.find('img');
                }
            }
        });
    });

    $('.zoom-gallery').each(function () {
        $(this).magnificPopup({
            delegate: 'span',
            type: 'image',
            closeOnContentClick: false,
            closeBtnInside: false,
            mainClass: 'mfp-with-zoom mfp-img-mobile',
            image: {
                verticalFit: true,
                titleSrc: function (item) {
                    return item.el.attr('title');
                }
            },
            zoom: {
                enabled: true,
                duration: 300,
                opener: function (element) {
                    return element.find('img');
                }
            }
        });
    });

});