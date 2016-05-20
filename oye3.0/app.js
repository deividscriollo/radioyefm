var app = angular.module('dcapp', [ 'ngRoute',
			                        'route-segment',
			                        'view-segment',
			                        // 'frSlidescroll', 
			                        'infinite-scroll', 
			                        'ngResource',
			                        'ui.bootstrap',
			                        'fullPage.js',
                                    'ui.router'

			                        // 'snapscroll'
			                        // 'ngSanitize',
			                        // 'youtube-embed'
			                        // '$stateProvider',
			                        // '$urlRouterProvider'
			                        ]
			            );
app.directive("owlCarousel", function() {
    return {
        restrict: 'E',
        transclude: false,
        link: function (scope) {
            scope.initCarousel = function(element) {
              // provide any default options you want
                var defaultOptions = {
                };
                var customOptions = scope.$eval($(element).attr('data-options'));
                // combine the two options objects
                for(var key in customOptions) {
                    defaultOptions[key] = customOptions[key];
                }
                // init carousel
                $(element).owlCarousel(defaultOptions);
            };
        }
    };
});
app.directive('owlCarouselItem', [function() {
    return {
        restrict: 'A',
        transclude: false,
        link: function(scope, element) {
          // wait for the last item in the ng-repeat then call init
            if(scope.$last) {
                scope.initCarousel(element.parent());
            }
        }
    };
}]);