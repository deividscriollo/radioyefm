// configure our routes
    app.config(function($routeSegmentProvider) {

        $routeSegmentProvider
        .when('/',    's0')
        .when('/Imbabura',    'imba')
        .when('/Imbabura/firstPage',    'imba')
        .when('/Imbabura/secondPage',    'imba')
        .when('/Imbabura/3rdPage',    'imba')
        
        .when('/Imbabura/Home',    'imba.home')
        .when('/Imbabura/Corporativo/',    'imba.corporativo')
        .when('/Imbabura/Noticias/',    'imba.noticias')
        .when('/Imbabura/Programa/',    'imba.programa')
        .when('/Imbabura/Programacion',    'imba.programacion')
        .when('/Imbabura/Promociones',    'imba.promociones')
        .when('/Imbabura/Galeria',    'imba.gallery')
        .when('/Imbabura/Podcast',    'imba.podcast')
        .when('/Imbabura/Contactos',    'imba.contactos')        
        .when('/Imbabura/Despertador',    's1.despertador')
        .when('/Imbabura/LaSartenPorElMango',    's1.sarten')
        .when('/Imbabura/Inbox',    's1.inbox')
        .when('/Imbabura/LosHP',    's1.hp')
        .when('/Imbabura/CodigoDeontologico',    's1.codigo')
        .when('/Imbabura/TarifasAsesor/:id',    's1.tarifasasesor')
        
        
        // .when('/'+'SantoDomingo',    's2')
        // .when('/'+'Esmeraldas',    's3')
        .segment('imba', {
            templateUrl: 'imbabura/index.html',
            controller: 'MainCtrlinit',
        })            
        .within()
            .segment('home', {
                'default': true,
                templateUrl: 'imbabura/home/view/index.html',
                controller: 'MainCtrl',
                // controllerAs: 'vm'
            })
            .segment('corporativo', {
                // 'default': true,
                templateUrl: 'imbabura/corp/view/index.html',
                controller: 'imba-corp-Ctrl',
                // controllerAs: 'vm'
                // dependencies: ['id']
            })
            .segment('gallery', {
                // 'default': true,
                templateUrl: 'imbabura/gallery/view/index.html',
                controller: 'imba-gallery-Ctrl'
            })
            .segment('promociones', {
                // 'default': true,
                templateUrl: 'imbabura/promociones/view/index.html',
                controller: 'imba-promociones-Ctrl'
            })
            .segment('programa', {
                // 'default': true,
                templateUrl: 'imbabura/programa/view/index.html',
                controller: 'imba-programa-Ctrl'
            })
            .segment('programacion', {
                // 'default': true,
                templateUrl: 'imbabura/programacion/view/index.html',
                controller: 'imba-programacion-Ctrl'
            })
            .segment('podcast', {
                // 'default': true,
                templateUrl: 'imbabura/podcast/view/index.html',
                controller: 'imba-podcast-Ctrl'
            })            
            .segment('contactos', {
                // 'default': true,
                templateUrl: 'imbabura/contactos/view/index.html',
                controller: 'imba-contactos-Ctrl'
            })
            .segment('noticias', {
                templateUrl: 'imbabura/noticias/view/index.html',
                controller: 'imba-noticias-Controller'
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
    
