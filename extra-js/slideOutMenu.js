jQuery(document).ready(function( $ ) {

  (function ( $ ) {

    $.fn.slideMenu = function( options ) {

      var settings = $.extend({
        position: 'left',
        animation: ''
      }, options );

      var menu = $('.titt-menu');
      var body = $('body');

      if (settings.position === 'right') {
        $('.titt-menu').addClass('titt-menu-right');

        this.on('click', function(e) {
          e.preventDefault();

          menu.toggleClass('titt-menu-show-right');
          body.toggleClass('titt-menu-body-right');
          menu.toggleClass('animated ' + settings.animation);
        });

        return this;
      }


      // what happens if the postition setting is 'left'
      if (settings.position === 'left') {
        $('.titt-menu').addClass('titt-menu-left');

        this.on('click', function(e) {
          e.preventDefault();

          menu.toggleClass('titt-menu-show-left');
          body.toggleClass('titt-menu-body-left');
          menu.toggleClass('animated ' + settings.animation);
        });
        return this;
      }

    };

  }( jQuery ));


  $('.titt-menu-btn').click(function(){
    $('.titt-menu-btn-wrapper').toggleClass('opened')
  });

});//close all jquery
