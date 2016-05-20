var app = angular.module('dcapp').controller('imba-programa-Ctrl', function ($scope, $routeSegment) {
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

	// Animated Progress Bars
		//-----------------------------------------------
		if ($("[data-animate-width]").length>0) {
			$("[data-animate-width]").each(function() {
				if (Modernizr.touch || !Modernizr.csstransitions) {
					$(this).find("span").hide();
				};
				var waypoints = $(this).waypoint(function(direction) {
					$(this.element).animate({width: $(this.element).attr("data-animate-width")}, 800 );
					this.destroy();
					if (Modernizr.touch || !Modernizr.csstransitions) {
						$(this.element).find("span").show('slow');
					};
				},{
					offset: '90%'
				});
			});
		};

	// Animated Circular Progress Bars
	//-----------------------------------------------
	if ($(".knob").length>0) {

		$(".knob").knob();
		$(".knob").each(function() {
			var animateVal = $(this).attr("data-animate-value");
			$(this).animate({animatedVal: animateVal}, {
				duration: 2000,
				step: function() {
					$(this).val(Math.ceil(this.animatedVal)).trigger("change");
				}
			});
		});
	}
	// animate slider
	$('.slider-banner-container .slider-banner-fullwidth').show().revolution({
				delay:8000,
				startwidth:1140,
				startheight:450,

				navigationArrows:"solo",

				navigationStyle: "preview2",
				navigationHAlign:"center",
				navigationVAlign:"bottom",
				navigationHOffset:0,
				navigationVOffset:20,

				soloArrowLeftHalign:"left",
				soloArrowLeftValign:"center",
				soloArrowLeftHOffset:0,
				soloArrowLeftVOffset:0,

				soloArrowRightHalign:"right",
				soloArrowRightValign:"center",
				soloArrowRightHOffset:0,
				soloArrowRightVOffset:0,

				fullWidth:"on",

				spinner:"spinner2",

				stopLoop:"off",
				stopAfterLoops:-1,
				stopAtSlide:-1,
				onHoverStop: "off",

				shuffle:"off",

				autoHeight:"off",
				forceFullWidth:"off",

				hideThumbsOnMobile:"off",
				hideNavDelayOnMobile:1500,
				hideBulletsOnMobile:"off",
				hideArrowsOnMobile:"off",
				hideThumbsUnderResolution:0,

				hideSliderAtLimit:0,
				hideCaptionAtLimit:0,
				hideAllCaptionAtLilmit:0,
				startWithSlide:0
			});


});