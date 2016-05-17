 // create the module and name it scotchApp
    var app = angular.module('dcApp', 
                ['ngRoute',
                 'ngAnimate', 
                 'ngStorage', 
                 'route-segment', 
                 'view-segment', 
                 'ui.bootstrap', 
                 'youtube-embed', 
                 'lazy-scroll']);

    app.factory('service', function($http){
        var service = {
            async: function() {
                    var promise = $http({
                        url:"app.php", 
                        method: 'POST',
                        data: {methods: 'info'}
                    }).then(function (response) {
                    return response.data;
                });
                return promise;
            },
            general: function(typeservices){
                    var promise = $http.post("app.php", {methods: typeservices}).then(function (response) {
                    return response.data;
                });
                return promise;
            },
            general: function(typeservices, url, data){
                    var promise = $http.post(url, {methods: typeservices, data}).then(function (response) {
                    return response.data;
                });
                return promise;
            },
            getfilejson: function(){
                    var promise = $http.get('data/data.json').then(function (response) {
                    return response.data;
                });
                return promise;
            }

        };
        return service;
    });

    // Lockr.flush()
    // configure our routes
    app.config(function($routeSegmentProvider) {

        $routeSegmentProvider
        .when('/',    's0')
        .when('/'+'Imbabura',    's1')
        .when('/'+'Imbabura/home',    's1.home')
        .when('/'+'Imbabura/Corporativo',    's1.corporativo')
        .when('/'+'Imbabura/Tarifa',    's1.tarifa')
        .when('/'+'Imbabura/Programacion',    's1.programacion')
        .when('/'+'Imbabura/Podcast',    's1.podcast')
        .when('/'+'Imbabura/Noticias',    's1.noticias')
        .when('/'+'Imbabura/Contactos',    's1.contactos')
        .when('/'+'Imbabura/Despertador',    's1.despertador')
        .when('/'+'Imbabura/LaSartenPorElMango',    's1.sarten')
        .when('/'+'Imbabura/Inbox',    's1.inbox')
        .when('/'+'Imbabura/LosHP',    's1.hp')
        .when('/'+'Imbabura/CodigoDeontologico',    's1.codigo')
        .when('/'+'Imbabura/TarifasAsesor/:id',    's1.tarifasasesor')
        
        
        .when('/'+'SantoDomingo',    's2')
        .when('/'+'Esmeraldas',    's3')
        .segment('s1', {
            templateUrl: 'data/imbabura/home.html',
            controller: 'imbaburaCtrl'})            
        .within()
            .segment('home', {
                'default': true,
                templateUrl: 'data/imbabura/inicio.html',
                controller: 'imbahomeCtrl'
            })
            .segment('corporativo', {
                // 'default': true,
                templateUrl: 'data/imbabura/corporativo.html',
                // controller: 'imbahomeCtrl'
            })
            .segment('tarifa', {
                // 'default': true,
                templateUrl: 'data/imbabura/tarifa.html',
                // controller: 'imbahomeCtrl'
            })
            .segment('programacion', {
                // 'default': true,
                templateUrl: 'data/imbabura/programacion.html',
                // controller: 'imbahomeCtrl'
            })
            .segment('podcast', {
                // 'default': true,
                templateUrl: 'data/imbabura/podcast.html',
                controller: 'imbapodcastController'
            })
            .segment('noticias', {
                // 'default': true,
                templateUrl: 'data/imbabura/noticias.html',
                controller: 'imba-noticias-Controller'
            })
            .segment('contactos', {
                // 'default': true,
                templateUrl: 'data/imbabura/contactos.html',
                controller: 'imbacontacController'
            })
            .segment('despertador', {
                // 'default': true,
                templateUrl: 'data/imbabura/despertador.html',
                controller: 'imbadespController'
            })
            .segment('sarten', {
                // 'default': true,
                templateUrl: 'data/imbabura/sarten.html',
                controller: 'imba-sarten-Controller'
            })
            .segment('inbox', {
                // 'default': true,
                templateUrl: 'data/imbabura/inbox.html',
                controller: 'imba-inbox-Controller'
            })
            .segment('hp', {
                // 'default': true,
                templateUrl: 'data/imbabura/hp.html',
                controller: 'imba-hp-Controller'
            })            
            .segment('tarifasasesor', {
                templateUrl: 'data/imbabura/tarifasasesor.html',
                controller: 'imbatarifarioController',
                dependencies: ['id']
            })
            .segment('codigo', {
                templateUrl: 'data/imbabura/codigode.html',
                controller: 'imba-codigodeontologico-Controller',
            })
            
            // .segment('colaboradores', {
            //     templateUrl: 'data/imbaburaCtrl/oyem.html',
            //     controller: 'colaboradoresCtrl',
            //     // dependencies: ['id']
            // }).segment('fotos', {
            //     templateUrl: 'data/imbaburaCtrl/fotos.html',
            //     // controller: 'Section1ItemCtrl',
            //     // dependencies: ['id']
            // })              
            // .within()
            //     .segment('tab1', {
            //         'default': true,
            //         templateUrl: 'templates/section1/tabs/tab1.html'})                    
            //     .segment('tab2', {
            //         templateUrl: 'templates/section1/tabs/tab2.html'})                
            // .up()                
            // .segment('prefs', {
            //     templateUrl: 'templates/section1/prefs.html'})                
        .up()
        .segment('s0', {
            templateUrl: 'data/home/app.html',
            controller: 'homeCtrl'})   
        .segment('s2', {
            templateUrl: 'data/imbabura/home.html',
            controller: 'homeCtrl'
        })
        .segment('s3', {
            templateUrl: 'data/imbabura/home.html',
            controller: 'homeCtrl'
        })
    });

    app.controller('mainController', function($scope, $rootScope, $localStorage){
        $rootScope.$on('$routeChangeStart', function(event, currRoute, prevRoute){
            $rootScope.animation = currRoute.animation;
        });
        // $scope.sucursal=datainfo.sucursal[0];
        // console.log($scope.sucursal);
    });