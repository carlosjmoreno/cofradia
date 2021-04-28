(function (e) {
    "use strict";
    var n = window.AFTHRAMPES_JS || {};
    n.mobileMenu = {
        init: function () {
            this.toggleMenu(), this.menuMobile(), this.menuArrow();
            if (e('.aft-mobile-navigation').length) {
                var element = document.querySelector(".aft-mobile-navigation");
                this.trapFocus(element);
            }
        },
        toggleMenu: function () {
            e('#masthead').on('click', '.toggle-menu', function (event) {
                var ethis = e('.main-navigation .menu .menu-mobile');
                if (ethis.css('display') == 'block') {
                    ethis.slideUp('300');
                } else {
                    ethis.slideDown('300');
                }
                e('.ham').toggleClass('exit');
            });
            e('#masthead .main-navigation ').on('click', '.menu-mobile a button', function (event) {
                event.preventDefault();
                var ethis = e(this),
                    eparent = ethis.closest('li');
                if (eparent.find('> .children').length) {
                    var esub_menu = eparent.find('> .children');
                } else {
                    var esub_menu = eparent.find('> .sub-menu');
                }
                if (esub_menu.css('display') == 'none') {
                    esub_menu.slideDown('300');
                    ethis.addClass('active');
                } else {
                    esub_menu.slideUp('300');
                    ethis.removeClass('active');
                }
                return false;
            });
        },

        trapFocus : function(element) {

            var focusableEls = element.querySelectorAll('a[href]:not([disabled]), button:not([disabled]), textarea:not([disabled]), input[type="text"]:not([disabled]), input[type="radio"]:not([disabled]), input[type="checkbox"]:not([disabled]), select:not([disabled])'),
                firstFocusableEl = focusableEls[0],
                lastFocusableEl = focusableEls[focusableEls.length - 1],
                KEYCODE_TAB = 9;

            element.addEventListener('keydown', function(e) {
                var isTabPressed = (e.key === 'Tab' || e.keyCode === KEYCODE_TAB);

                if (!isTabPressed) {
                    return;
                }

                if ( e.shiftKey ) /* shift + tab */ {
                    if (document.activeElement === firstFocusableEl) {
                        lastFocusableEl.focus();
                        e.preventDefault();
                    }
                } else /* tab */ {
                    if (document.activeElement === lastFocusableEl) {
                        firstFocusableEl.focus();
                        e.preventDefault();
                    }
                }

            });
        },

        menuMobile: function () {
            if (e('.main-navigation .menu > ul').length) {
                var ethis = e('.main-navigation .menu > ul'),
                    eparent = ethis.closest('.main-navigation'),
                    pointbreak = eparent.data('epointbreak'),
                    window_width = window.innerWidth;
                if (typeof pointbreak == 'undefined') {
                    pointbreak = 991;
                }
                if (pointbreak >= window_width) {
                    ethis.addClass('menu-mobile').removeClass('menu-desktop');
                    e('.main-navigation .toggle-menu').css('display', 'block');
                    e('.aft-dynamic-navigation-elements').addClass('aft-mobile-navigation');
                } else {
                    ethis.addClass('menu-desktop').removeClass('menu-mobile').css('display', '');
                    e('.main-navigation .toggle-menu').css('display', '');
                    e('.aft-dynamic-navigation-elements').removeClass('aft-mobile-navigation');
                }
            }
        },
        menuArrow: function () {
            if (e('#masthead .main-navigation div.menu > ul').length) {
                e('#masthead .main-navigation div.menu > ul .sub-menu').parent('li').find('> a').append('<button class="">');
                e('#masthead .main-navigation div.menu > ul .children').parent('li').find('> a').append('<button class="">');
            }
        }
    },
        n.DataBackground = function () {
            var pageSection = e(".data-bg");
            pageSection.each(function (indx) {
                if (e(this).attr("data-background")) {
                    e(this).css("background-image", "url(" + e(this).data("background") + ")");
                }
            });
            e('.bg-image').each(function () {
                var src = e(this).children('img').attr('src');
                e(this).css('background-image', 'url(' + src + ')').children('img').hide();
            });
        },
        n.setInstaHeight = function () {
            e('.insta-slider-block').each(function () {
                var img_width = e(this).find('.insta-item .af-insta-height').eq(0).innerWidth();
                e(this).find('.insta-item .af-insta-height').css('height', img_width);
            });
        },
       
        n.Offcanvas = function () {
            e('.offcanvas-nav').sidr({
                speed: 300,
                side: 'left'
            });
            e('.sidr-class-sidr-button-close').on('click', function () {
                e.sidr('close', 'sidr');
            });
        },
        // SHOW/HIDE SCROLL UP //
        n.show_hide_scroll_top = function () {
            if (e(window).scrollTop() > e(window).height() / 2) {
                e("#scroll-up").fadeIn(300);
            } else {
                e("#scroll-up").fadeOut(300);
            }
        },
        n.scroll_up = function () {
            e("#scroll-up").on("click", function () {
                e("html, body").animate({
                    scrollTop: 0
                }, 800);
                return false;
            });
        },
        n.MagnificPopup = function () {
            e('div.zoom-gallery').magnificPopup({
                delegate: 'a.insta-hover',
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
            e('.gallery').each(function () {
                e(this).magnificPopup({
                    delegate: 'a',
                    type: 'image',
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

            e('.wp-block-gallery').each(function () {
                e(this).magnificPopup({
                    delegate: 'a',
                    type: 'image',
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
        },
        n.searchReveal = function () {
            jQuery('.search-overlay .search-icon').on('click', function () {
                jQuery(this).parent().toggleClass('reveal-search');
                return false;
            });

            jQuery('body').on('click', function (e) {
                if (jQuery(".search-overlay").hasClass('reveal-search')) {
                    var container = jQuery(".search-overlay");
                    if (!container.is(e.target) && container.has(e.target).length === 0) {
                        container.removeClass('reveal-search');
                    }
                }
            });


        },
        n.em_sticky = function () {
            jQuery('.home #secondary.aft-sticky-sidebar').theiaStickySidebar({
                additionalMarginTop: 30
            });
        },


        n.jQueryMarquee = function () {
            e('.marquee.aft-flash-slide').marquee({
                //duration in milliseconds of the marquee
                speed: 80000,
                //gap in pixels between the tickers
                gap: 0,
                //time in milliseconds before the marquee will start animating
                delayBeforeStart: 0,
                //'left' or 'right'
                // direction: 'right',
                //true or false - should the marquee be duplicated to show an effect of continues flow
                duplicated: true,
                pauseOnHover: true,
                startVisible: true
            });
        },

        n.SliderAsNavFor = function () {
            if (e('.banner-single-slider-1-wrap').hasClass("no-thumbnails")) {
                return null;
            } else {
                return '.af-banner-slider-thumbnail';
            }
        },
        n.RtlCheck = function () {
            if (e('body').hasClass("rtl")) {
                return true;
            } else {
                return false;
            }
        },
        n.checkThumbOption = function () {
            if (e('.hasthumbslide').hasClass('side')) {
                return '.af-post-slider-thumbnail';
            } else {
                return false;
            }
        },

        //slick slider
        n.SlickBannerCarousel = function () {
            e(".af-banner-carousel-1").not('.slick-initialized').slick({

                autoplay: true,
                autoplaySpeed: 5000,
                infinite: true,
                nextArrow: '<span class="slide-icon slide-next icon-right fas fa-angle-right"></span>',
                prevArrow: '<span class="slide-icon slide-prev icon-left fas fa-angle-left"></span>',
                rtl: n.RtlCheck(),

            });
        },

        n.SlickWidgetPostSlider = function () {
            console.log('asdsa');
            e(".af-posts-slider").not('.slick-initialized').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000,
                infinite: true,
                nextArrow: '<span class="slide-icon slide-next icon-right fas fa-angle-right"></span>',
                prevArrow: '<span class="slide-icon slide-prev icon-left fas fa-angle-left"></span>',
                rtl: n.RtlCheck(),

            });
        },

        n.WidgetSlickCarousel = function () {
            e("#secondary .af-post-carousel").not('.slick-initialized').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000,
                infinite: true,
                nextArrow: '<span class="slide-icon slide-next icon-right fas fa-angle-right"></span>',
                prevArrow: '<span class="slide-icon slide-prev icon-left fas fa-angle-left"></span>',
                rtl: n.RtlCheck(),
            });

            e(".primary-footer .af-post-carousel").not('.slick-initialized').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000,
                infinite: true,
                nextArrow: '<span class="slide-icon slide-next icon-right fas fa-angle-right"></span>',
                prevArrow: '<span class="slide-icon slide-prev icon-left fas fa-angle-left"></span>',
                rtl: n.RtlCheck(),
            });


            e("#sidr .af-post-carousel").not('.slick-initialized').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000,
                infinite: true,
                nextArrow: '<span class="slide-icon slide-next icon-right fas fa-angle-right"></span>',
                prevArrow: '<span class="slide-icon slide-prev icon-left fas fa-angle-left"></span>',
                rtl: n.RtlCheck(),
            });


            e(".kreeti_posts_carousel_widget .af-widget-post-carousel").not('.slick-initialized').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000,
                infinite: true,
                nextArrow: '<span class="slide-icon slide-next icon-right fas fa-angle-right"></span>',
                prevArrow: '<span class="slide-icon slide-prev icon-left fas fa-angle-left"></span>',
                rtl: n.RtlCheck(),
                responsive: [
                    {
                        breakpoint: 1025,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 769,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        },

        //Slick Carousel
        n.SlickCarousel = function () {
            e(".af-post-carousel").not('.slick-initialized').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000,
                infinite: true,
                nextArrow: '<span class="slide-icon slide-next icon-right fas fa-angle-right"></span>',
                prevArrow: '<span class="slide-icon slide-prev icon-left fas fa-angle-left"></span>',
                rtl: n.RtlCheck(),
                responsive: [
                    {
                        breakpoint: 1025,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: 769,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        },

        //Slick Carousel
        n.SlickTrendingVerticalCarousel = function () {
            e(".body.full-width-content #primary .banner-vertical-slider").not('.slick-initialized').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                infinite: true,
                loop: true,
                dots: false,
                prevArrow: false,
                nextArrow: false,
                responsive: [
                    {
                        breakpoint: 1025,
                        settings: {
                            slidesToShow: 2,
                            draggable: false,
                            swipeToSlide: false,
                            touchMove: false,
                            swipe: false
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            draggable: false,
                            swipeToSlide: false,
                            touchMove: false,
                            swipe: false
                        }
                    }
                ]
            });

            e("#primary .banner-vertical-slider").not('.slick-initialized').slick({
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                infinite: true,
                loop: true,
                dots: false,
                prevArrow: false,
                nextArrow: false,
                responsive: [

                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            draggable: false,
                            swipeToSlide: false,
                            touchMove: false,
                            swipe: false
                        }
                    }
                ]
            });


            e(".banner-vertical-slider").not('.slick-initialized').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                autoplay: true,
                infinite: true,
                loop: true,
                vertical: true,
                verticalSwiping: true,
                dots: false,
                prevArrow: false,
                nextArrow: false,
                responsive: [

                    {
                        breakpoint: 600,
                        settings: {
                            draggable: false,
                            swipeToSlide: false,
                            touchMove: false,
                            swipe: false
                        }
                    }
                ]
            });
        },
        //Instagram carousel
        n.SlickInstagtram = function () {
            e('.af-instagram-img').each(function () {
                e('.af-instagram-img').not('.slick-initialized').slick({
                    slidesToShow: 6,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 5000,
                    infinite: true,
                    nextArrow: '<span class="slide-icon slide-next icon-right fas fa-angle-right"></span>',
                    prevArrow: '<span class="slide-icon slide-prev icon-left fas fa-angle-left"></span>',
                    rtl: n.RtlCheck(),
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3,
                                infinite: true
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
            });
        },


        n.MasonryBlog = function () {
            if (e('.aft-masonry-archive-posts').length > 0) {
                jQuery('.aft-masonry-archive-posts').masonry();
            }
        }


    e(document).ready(function () {
            n.mobileMenu.init(),
            n.setInstaHeight(),
            n.em_sticky(),
            n.jQueryMarquee(),
            n.MagnificPopup(),
            n.Offcanvas(),
            n.searchReveal(),
            n.scroll_up(),
            n.SlickBannerCarousel(),
            n.WidgetSlickCarousel(),
            n.SlickCarousel(),
            n.SlickWidgetPostSlider(),
            n.SlickTrendingVerticalCarousel(),
            n.SlickInstagtram();

    }), e(window).scroll(function () {
        n.show_hide_scroll_top();
    }), e(window).load(function () {
        n.DataBackground();
        n.MasonryBlog();
        e('#loader-wrapper').fadeOut();
                e('#af-preloader').delay(500).fadeOut('slow');
        
                e(".af-search-click").on('click', function () {
                    e("#af-search-wrap").toggleClass("af-search-toggle");
                });

    }),
        e(window).resize(function () {
            n.mobileMenu.menuMobile();
        });

})(jQuery);