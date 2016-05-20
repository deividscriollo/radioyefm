var app = angular.module('dcapp').controller('imba-programacion-Ctrl', function ($scope, $routeSegment) {
	// Animations
	//-----------------------------------------------
	if ($("[data-animation-effect]").length>0) {
		$("[data-animation-effect]").each(function() {
			if(Modernizr.csstransitions) {
				var waypoints = $(this).waypoint(function(direction) {
					var appearDelay = $(this.element).attr("data-effect-delay"),
					animatedObject = $(this.element);
					setTimeout(function() {
						animatedObject.addClass('animated object-visible ' + animatedObject.attr("data-animation-effect"));
					}, appearDelay);
					this.destroy();
				},{
					offset: '90%'
				});
			} else {
				$(this).addClass('object-visible');
			}
		});
	};
});