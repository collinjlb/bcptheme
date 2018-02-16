jQuery(document).ready(function( $ ) {
	function onScrollAnimate( items ) {
		items.each( function() {

			var element = $(this);
			if ( element.attr('animation') ) {
				var animationClass = element.attr('animation');
			} else {
				var animationClass = 'fadeIn';
			}
			if ( element.attr('offset') ) {
				var animationOffset = element.attr('offset');
			} else {
				var animationOffset = "75%";
			}

			if ( element.attr('delay') ) {
				var animationDelay = element.attr('delay');
				element.css({
					'-webkit-animation-delay':  animationDelay,
					'-moz-animation-delay':     animationDelay,
					'animation-delay':          animationDelay
				});
			}

			if ( element.attr('duration') ) {
				var animationDuration = element.attr('duration');
				element.css({
					'-webkit-animation-duration':  animationDuration,
					'-moz-animation-duration':     animationDuration,
					'animation-duration':          animationDuration
				});
			}
			
			if ( element.attr('infinite') == 'true' ) {
				element.addClass('infinite');
			}

			var customWaypoint = new Waypoint({
				element: element,
				handler: function(direction) {
					element.fadeIn().addClass('animated ' + animationClass).css('opacity', '1');
					this.destroy();
				},
				offset: animationOffset.toString()
			});

		});// items.each()
	}// onScrollInit
	onScrollAnimate( $('.hidden_animated') );
});
