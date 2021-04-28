jQuery(document).ready(function($) {

    if(easywp_ajax_object.primary_menu_active){

    if(easywp_ajax_object.sticky_menu){
    // grab the initial top offset of the navigation
    var easywpstickyNavTop = $('.easywp-primary-menu-container').offset().top;

    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var easywpstickyNav = function(){
        var easywpscrollTop = $(window).scrollTop(); // our current vertical position from the top

        // if we've scrolled more than the navigation, change its position to fixed to stick to top,
        // otherwise change it back to relative

        if(easywp_ajax_object.sticky_menu_mobile){
            if (easywpscrollTop > easywpstickyNavTop) {
                $('.easywp-primary-menu-container').addClass('easywp-fixed');
            } else {
                $('.easywp-primary-menu-container').removeClass('easywp-fixed');
            }
        } else {
            if(window.innerWidth > 1112) {
                if (easywpscrollTop > easywpstickyNavTop) {
                    $('.easywp-primary-menu-container').addClass('easywp-fixed');
                } else {
                    $('.easywp-primary-menu-container').removeClass('easywp-fixed');
                }
            }
        }
    };

    easywpstickyNav();
    // and run it again every time you scroll
    $(window).scroll(function() {
        easywpstickyNav();
    });
    }

    //$(".easywp-nav-primary .easywp-primary-nav-menu").addClass("easywp-primary-responsive-menu").before('<div class="easywp-primary-responsive-menu-icon"></div>');
    $(".easywp-nav-primary .easywp-primary-nav-menu").addClass("easywp-primary-responsive-menu");

    $(".easywp-primary-responsive-menu-icon").click(function(){
        $(this).next(".easywp-nav-primary .easywp-primary-nav-menu").slideToggle();
    });

    $(window).resize(function(){
        if(window.innerWidth > 1112) {
            $(".easywp-nav-primary .easywp-primary-nav-menu, nav .sub-menu, nav .children").removeAttr("style");
            $(".easywp-primary-responsive-menu > li").removeClass("easywp-primary-menu-open");
        }
    });

    $(".easywp-primary-responsive-menu > li").click(function(event){
        if (event.target !== this)
        return;
        $(this).find(".sub-menu:first").toggleClass('easywp-submenu-toggle').parent().toggleClass("easywp-primary-menu-open");
        $(this).find(".children:first").toggleClass('easywp-submenu-toggle').parent().toggleClass("easywp-primary-menu-open");
    });

    $("div.easywp-primary-responsive-menu > ul > li").click(function(event) {
        if (event.target !== this)
            return;
        $(this).find("ul:first").toggleClass('easywp-submenu-toggle').parent().toggleClass("easywp-primary-menu-open");
    });

    }

    $(".post").fitVids();

    var scrollButtonEl = $( '.easywp-scroll-top' );
    scrollButtonEl.hide();

    $( window ).scroll( function () {
        if ( $( window ).scrollTop() < 20 ) {
            $( '.easywp-scroll-top' ).fadeOut();
        } else {
            $( '.easywp-scroll-top' ).fadeIn();
        }
    } );

    scrollButtonEl.click( function () {
        $( "html, body" ).animate( { scrollTop: 0 }, 300 );
        return false;
    } );

    if(easywp_ajax_object.sticky_sidebar){
    $('#easywp-main-wrapper, #easywp-left-sidebar, #easywp-right-sidebar').theiaStickySidebar({
        containerSelector: "#easywp-content-wrapper",
        additionalMarginTop: 10,
        additionalMarginBottom: 0,
        minWidth: 1168,
    });
    }

});