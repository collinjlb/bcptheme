jQuery(document).ready(function( $ ) {

$(window).on("scroll ready", function() {
    if($(window).scrollTop() > 50) {
        $(".header").addClass("header-active");
        $('.sub-menu').addClass('scrollMenu');
    } else {
       $(".header").removeClass("header-active");
       $('.sub-menu').removeClass('scrollMenu');
    }
});

$('.mobile-button').click(function() {
  $('.mobile-menu').stop().slideToggle().css({'display':'flex'});
  $('html').toggleClass('mobileScroll');
  if ($(window).scrollTop() > 50) {
    $('.header').toggleClass('header-active');
    $('.sub-menu').removeClass('scrollMenu');
  }
});

$('.menu-item-has-children > a').click(function(e) {
  e.preventDefault();
  $(this).parent().children('.sub-menu').stop().toggle('fast');
  $(this).parent().children('.sub-menu').css({'display':'flex'});
  if ($(this).parent().siblings('.menu-item-has-children').children('.sub-menu').is(':visible')) {
    $(this).parent().siblings('.menu-item-has-children').children('.sub-menu').toggle();
  }
});

// var $counter = 0;
// $('.state-title.mobile').click(function() {
//   $('#myTab .nav-item .nav-link.active').parent().next().children().tab('show');
//   $counter++;
//   if ($counter == $('.nav-item').siblings().length) {
//     $('#myTab .nav-item:first-child .nav-link').tab('show');
//     $counter = 0;
//   }
// });

if ($('.content-area').hasClass('locations')) {
  $(function() {
    $("." + window.location.hash.substring(1) + "").tab('show');
    $('html, body').animate({scrollTop:$('.nav').position().top - 100}, 1500);
  });
}

$('.state-title.mobile').change(function() {
  window.location.href = "http://jlbdev1.net/bcpgroup/public_html/locations/#" + $(this).val();
});

$('.content-area.locations').find('.state-title').change(function() {
  var $this = $(this);
  $('.' + $this.val() + '').tab('show');
  // $('.nav-tabs')
});

// ENABLE FOR SLIDEOUT MENU
// https://codepen.io/kpalmerjs/pen/JNVPgz
// $('.titt-menu-btn').slideMenu({
//   position: 'left',
//   animation: 'jello'
// });

// ENABLE FOR A FUNCTION THAT SETS A GROUP OF ITEMS/DIVS TO THE SAME HEIGHT. DON'T FORGET TO WRAP YOUR CODE:
/*
setTimeout(function(){
	$('.row div').sameHeightItem({
		margin: '50px 25px',
		padding: '50px 25%',
		extraHeight: '500% or 500px' etc etc
	});
}, 250);

https://codepen.io/kpalmerjs/pen/NjmWKj
*/
// (function ( $ ) {

//   $.fn.sameHeightItem = function( options ) {

//         var settings = $.extend({
//           padding: '0',
//           margin: '0',
//           extraHeight: '0'
//         }, options );


//         // Set 'x' number of items to the tallest height
//         var tallestItem = 0;
//         var theDiv = this;

//         theDiv.each(function() {
//           var divHeight = $(this).height();

//           if (divHeight > tallestItem){
//             tallestItem = divHeight;
//           }
//       });

//     if ( settings.padding != '0' ) {
//       console.log(settings.padding)
//       theDiv.css('padding', settings.padding)
//     }

//     if ( settings.margin != '0' ) {
//       console.log(settings.margin)
//       theDiv.css('margin', settings.margin)
//     }

//     if ( settings.extraHeight != '0' ) {
//       var bonusHeight = parseInt(settings.extraHeight)
//       console.log(bonusHeight)
//       theDiv.css('height', tallestItem + bonusHeight);

//     } else {
//       theDiv.css('height', tallestItem);
//     }

//       return this;
//     }

// }( jQuery ));

// setTimeout(function(){

// 	$('.row .card').sameHeightItem({

//   });

// }, 250);

function detectBrowser() {
    var ua = window.navigator.userAgent;

    var chrome = ua.indexOf('Chrome/');
    if (chrome > 0) {
      return 'is-chrome';
    }

    var mozilla = ua.indexOf('Firefox');
    if (mozilla > 0) {
      return 'is-firefox';
    }

    var msie = ua.indexOf('MSIE ');
    if (msie > 0) {
        return 'is-ie';
    }

    var trident = ua.indexOf('Trident/');
    if (trident > 0) {
        return 'is-trident';
    }

    var edge = ua.indexOf('Edge/');
    if (edge > 0) {
       return 'is-edge';
    }

    // other browser
    return 'not-IE';
}
$('.featured-image, .blog-post > .content').addClass(detectBrowser());
$('.sub-menu').addClass(detectBrowser());
$('.post-view').addClass(detectBrowser());
$('.two').addClass(detectBrowser());
$('.footer-top').addClass(detectBrowser());
$('.contact').addClass(detectBrowser());
$('.locations').find('.nav').addClass(detectBrowser());
$('.locations').find('.single-company').addClass(detectBrowser());
$('.child-header').addClass(detectBrowser());
	});//close all jquery
