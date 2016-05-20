var app = angular.module('dcapp').controller('imba-podcast-Ctrl', function ($scope, $routeSegment) {
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
	//Video Background
	//-----------------------------------------------
	$(".video-background-banner").vide({
		mp4: "assets/videos/background-video-banner.mp4",
		webm: "assets/videos/background-video-banner.webm",
		// poster: "assets/videos/video-fallback.jpg"
	}, {
		volume: 1,
		playbackRate: 1,
		muted: true,
		loop: true,
		autoplay: true,
		position: "50% 50%", // Similar to the CSS `background-position` property.
		posterType: "jpg", // Poster image type. "detect" â€” auto-detection; "none" â€” no poster; "jpg", "png", "gif",... - extensions.
		resizing: true
	});
});