'use strict'
var app = angular.module('dcapp').controller('imba-noticias-Controller', function ($scope, noticias, $sce) {
	$('body').removeClass('full-page');
	$scope.noticias = noticias.query();

	$scope.tohtml = function(data){
		return $sce.trustAsHtml(data);
	}
	$scope.tohtmlvideo = function(data){
		var video=data;
		return $sce.trustAsHtml(video);
	}
	
	// //Owl carousel
	// 	//-----------------------------------------------
	// 	// if ($('.owl-carousel').length>0) {
	// 		$(".owl-carousel.content-slider-with-large-controls").owlCarousel({
	// 			singleItem: true,
	// 			autoPlay: false,
	// 			navigation: true,
	// 			pagination: true
	// 		});
	// 		$(".owl-carousel.content-slider-with-controls-autoplay").owlCarousel({
	// 			singleItem: true,
	// 			autoPlay: 5000,
	// 			navigation: true,
	// 			pagination: true
	// 		});
	// 		$(".owl-carousel.content-slider-with-large-controls-autoplay").owlCarousel({
	// 			singleItem: true,
	// 			autoPlay: 5000,
	// 			navigation: true,
	// 			pagination: true
	// 		});
	// 	// };
});