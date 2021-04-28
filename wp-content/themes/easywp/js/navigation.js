/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
    var easywp_primary_container, easywp_primary_button, easywp_primary_menu, easywp_primary_links, easywp_primary_i, easywp_primary_len;

    easywp_primary_container = document.getElementById( 'easywp-primary-navigation' );
    if ( ! easywp_primary_container ) {
        return;
    }

    easywp_primary_button = easywp_primary_container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof easywp_primary_button ) {
        return;
    }

    easywp_primary_menu = easywp_primary_container.getElementsByTagName( 'ul' )[0];

    // Hide menu toggle button if menu is empty and return early.
    if ( 'undefined' === typeof easywp_primary_menu ) {
        easywp_primary_button.style.display = 'none';
        return;
    }

    easywp_primary_menu.setAttribute( 'aria-expanded', 'false' );
    if ( -1 === easywp_primary_menu.className.indexOf( 'nav-menu' ) ) {
        easywp_primary_menu.className += ' nav-menu';
    }

    easywp_primary_button.onclick = function() {
        if ( -1 !== easywp_primary_container.className.indexOf( 'easywp-toggled' ) ) {
            easywp_primary_container.className = easywp_primary_container.className.replace( ' easywp-toggled', '' );
            easywp_primary_button.setAttribute( 'aria-expanded', 'false' );
            easywp_primary_menu.setAttribute( 'aria-expanded', 'false' );
        } else {
            easywp_primary_container.className += ' easywp-toggled';
            easywp_primary_button.setAttribute( 'aria-expanded', 'true' );
            easywp_primary_menu.setAttribute( 'aria-expanded', 'true' );
        }
    };

    // Get all the link elements within the menu.
    easywp_primary_links    = easywp_primary_menu.getElementsByTagName( 'a' );

    // Each time a menu link is focused or blurred, toggle focus.
    for ( easywp_primary_i = 0, easywp_primary_len = easywp_primary_links.length; easywp_primary_i < easywp_primary_len; easywp_primary_i++ ) {
        easywp_primary_links[easywp_primary_i].addEventListener( 'focus', easywp_primary_toggleFocus, true );
        easywp_primary_links[easywp_primary_i].addEventListener( 'blur', easywp_primary_toggleFocus, true );
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function easywp_primary_toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'easywp-focus' ) ) {
                    self.className = self.className.replace( ' easywp-focus', '' );
                } else {
                    self.className += ' easywp-focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    ( function( easywp_primary_container ) {
        var touchStartFn, easywp_primary_i,
            parentLink = easywp_primary_container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, easywp_primary_i;

                if ( ! menuItem.classList.contains( 'easywp-focus' ) ) {
                    e.preventDefault();
                    for ( easywp_primary_i = 0; easywp_primary_i < menuItem.parentNode.children.length; ++easywp_primary_i ) {
                        if ( menuItem === menuItem.parentNode.children[easywp_primary_i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[easywp_primary_i].classList.remove( 'easywp-focus' );
                    }
                    menuItem.classList.add( 'easywp-focus' );
                } else {
                    menuItem.classList.remove( 'easywp-focus' );
                }
            };

            for ( easywp_primary_i = 0; easywp_primary_i < parentLink.length; ++easywp_primary_i ) {
                parentLink[easywp_primary_i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( easywp_primary_container ) );
} )();