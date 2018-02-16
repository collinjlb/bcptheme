jQuery(document).ready(function( $ ) {

$(window).on("scroll ready", function() {
    if($(window).scrollTop() > 50) {
        $("header").addClass("active");
    } else {
       $("header").removeClass("active");
    }
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

	});//close all jquery
