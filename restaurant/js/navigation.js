/**
 * File navigation.js.
 *
 */

(function( $ ) {
    var pull        = $('#pull'),
        menu        = $('.menu-all-pages-container');
 
    pull.on('click', function( e ) {
        e.prrestaurantDefault();
        menu.slideToggle();
    });

    $(window).resize(function(){
        var w = $(window).width();
        if(w > 991 && menu.is(':hidden')) {
            menu.removeAttr('style');
        }
    });
})( jQuery );

