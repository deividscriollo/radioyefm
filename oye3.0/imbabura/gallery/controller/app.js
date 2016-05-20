var app = angular.module('dcapp').controller('imba-gallery-Ctrl', function ($scope, $routeSegment) {
	
	$('#project-4').modal('show')

	// Isotope filters
	//-----------------------------------------------
	$('.masonry-grid').isotope({
		itemSelector: '.masonry-grid-item',
		layoutMode: 'masonry'
	});
	$('.masonry-grid-fitrows').isotope({
		itemSelector: '.masonry-grid-item',
		layoutMode: 'fitRows'
	});
	$('.isotope-container').fadeIn();
	var $container = $('.isotope-container').isotope({
		itemSelector: '.isotope-item',
		layoutMode: 'masonry',
		transitionDuration: '0.6s',
		filter: "*"
	});
	$('.isotope-container-fitrows').fadeIn();
	var $container_fitrows = $('.isotope-container-fitrows').isotope({
		itemSelector: '.isotope-item',
		layoutMode: 'fitRows',
		transitionDuration: '0.6s',
		filter: "*"
	});
	// filter items on button click
	$('.filters').on( 'click', 'ul.nav li a', function() {
		var filterValue = $(this).attr('data-filter');
		$(".filters").find("li.active").removeClass("active");
		$(this).parent().addClass("active");
		$container.isotope({ filter: filterValue });
		$container_fitrows.isotope({ filter: filterValue });
		return false;
	});
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		$('.tab-pane .masonry-grid-fitrows').isotope({
			itemSelector: '.masonry-grid-item',
			layoutMode: 'fitRows'
		});
	});

	//Owl carousel
		//-----------------------------------------------
		// if ($('.owl-carousel').length>0) {
			$(".owl-carousel.content-slider-with-large-controls").owlCarousel({
				singleItem: true,
				autoPlay: false,
				navigation: true,
				pagination: true
			});
			$(".owl-carousel.content-slider-with-controls-autoplay").owlCarousel({
				singleItem: true,
				autoPlay: 5000,
				navigation: true,
				pagination: true
			});
			$(".owl-carousel.content-slider-with-large-controls-autoplay").owlCarousel({
				singleItem: true,
				autoPlay: 5000,
				navigation: true,
				pagination: true
			});
		// };

	// Magnific popup
		//-----------------------------------------------
		if (($(".popup-img").length > 0) || ($(".popup-iframe").length > 0) || ($(".popup-img-single").length > 0)) {
			$(".popup-img").magnificPopup({
				type:"image",
				gallery: {
					enabled: true,
				}
			});
			$(".popup-img-single").magnificPopup({
				type:"image",
				gallery: {
					enabled: false,
				}
			});
			$('.popup-iframe').magnificPopup({
				disableOn: 700,
				type: 'iframe',
				preloader: false,
				fixedContentPos: false
			});
		};
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