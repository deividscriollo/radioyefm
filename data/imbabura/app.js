angular.module('dcApp').controller('imbaburaCtrl', function ($scope, service, $timeout) {
	// 2. This code loads the IFrame Player API code asynchronously.
      
	$scope.theBestVideo = 'AGsmwhFr7f0';


	// $('#myModal').on('hidden.bs.modal', function () {
		// $('#element_video').get(0).stopVideo();
		// $('#unique-youtube-embed-id-1')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*'); 
		// audio.play();
    // });
    
	// ----------------------------------- configuración acceso facturanext ------------------------------------ /
	// slider inicializado	
	// $('#myModal').modal('show');

	var audio = new Audio('http://173.244.209.219:8025/stream.aac');
	audio.play();

	function AdminController($scope) {    
		$scope.setMaster = function(obj, $event){
			console.log($event.target);
		}
	}
	
	$scope.clickplay = function() {
		audio.play();
	    $('.bg_rounder-play').addClass('zoomOut animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		    $(this).addClass('hidden').removeClass('zoomOut animated');

		    $('.bg_rounder-stop').removeClass('hidden').addClass('fadeIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			    $(this).removeClass('fadeIn animated');
			});
		});		
	};

	$scope.clickpause = function() {
	    // audio.play();
	    audio.pause();	
	    $('.bg_rounder-stop').addClass('zoomOut animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		    $(this).addClass('hidden').removeClass('zoomOut animated');
		    $('.bg_rounder-play').removeClass('hidden').addClass('fadeIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			    $(this).removeClass('fadeIn animated');
			});
		});		
	};

	// $timeout(callAtTimeout2, 10000);
	setInterval(function(){
		var horario = new Date();
	    var hora = horario.getHours();
	    var minutos = horario.getMinutes();
	    if (minutos < 10) {
	        minutos = '0' + minutos
	    }
	    var acumulador;
	    $.ajax({
	        url: 'assets/method/app.php/app.php',
	        data: {
	            time: hora + ':' + minutos
	        },
	        type: 'POST',
	        dataType: 'json',
	        success: function(data) {
	            if (data[0] == 0) {
	                $('#lbl_titulo-x').text('OyeFm, DJ');
	            } else {
	                $('#lbl_titulo-x').text(data[1]+',');
	            }
	        }
	    });

	    $.ajax({
	        url: 'http://173.244.209.219:8025/',
	        success: function(data) {
	            var x = data.replace(/img/g, "div");
	            var data = $(x).find('.streamdata');
	            var sum = $(data[8]).text().split(':');
	            if (sum[0] == 'Sorry, service not available. Try again later.') {
	                $('.lbl_sub_titulo').text('Oye, lo que te gusta');
	            } else {
	                $('.lbl_sub_titulo').text(sum[1]);
	            }
	        }
	    });
	}, 4000);

		  // el script del twiter
		    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
		    if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";
		    fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
		    
		  //el script del facebook 
		    (function(d, s, id) {
		      var js, fjs = d.getElementsByTagName(s)[0];
		      if (d.getElementById(id)) return;
		      js = d.createElement(s); js.id = id;
		      js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
		      fjs.parentNode.insertBefore(js, fjs);
		    }(document, 'script', 'facebook-jssdk'));
		  // el cript para facebook de me gusta
		    (function(d, s, id) {
		      var js, fjs = d.getElementsByTagName(s)[0];
		      if (d.getElementById(id)) return;
		      js = d.createElement(s); js.id = id;
		      js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.5";
		      fjs.parentNode.insertBefore(js, fjs);
		    }(document, 'script', 'facebook-jssdk'));
		  // youtube
});

angular.module('dcApp').controller('imbahomeCtrl', function ($scope, service) {
	// ----------------------------------- configuración acceso facturanext ------------------------------------ //
	$('.element_plant').removeClass('hidden');
	var api = $('.simple_slide .banner').revolution({
			delay:5000,
			// startwidth:1920,
			// startheight:'300',

			onHoverStop:"on",						// Stop Banner Timet at Hover on Slide on/off

				// thumbWidth:100,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
				// thumbHeight:300,
				// thumbAmount:3,

				// hideThumbs:0,
			navigationType:"bullet",				// bullet, thumb, none
			navigationArrows:"solo",				// nexttobullets, solo (old name verticalcentered), none

			navigationStyle:"round",				// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom


			navigationHAlign:"center",				// Vertical Align top,center,bottom
			navigationVAlign:"bottom",					// Horizontal Align left,center,right
			navigationHOffset:10,
			navigationVOffset:20,

			soloArrowLeftHalign:"left",
			soloArrowLeftValign:"center",
			soloArrowLeftHOffset:20,
			soloArrowLeftVOffset:0,

			soloArrowRightHalign:"right",
			soloArrowRightValign:"center",
			soloArrowRightHOffset:20,
			soloArrowRightVOffset:0,

			touchenabled:"on",						// Enable Swipe Function : on/off


			stopAtSlide:-1,							// Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
			stopAfterLoops:-1,						// Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

			hideCaptionAtLimit:0,					// It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
			hideAllCaptionAtLilmit:0,				// Hide all The Captions if Width of Browser is less then this value
			hideSliderAtLimit:0,					// Hide the whole slider, and stop also functions if Width of Browser is less than this value
			fullWidth:"on",
			shadow:0								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)
		});
		api.bind("revolution.slide.onloaded",function (e) {

			jQuery('.tparrows').each(function() {
				var arrows=jQuery(this);

				var timer = setInterval(function() {

					if (arrows.css('opacity') == 1 && !jQuery('.tp-simpleresponsive').hasClass("mouseisover"))
					  arrows.fadeOut(300);
				},3000);
			})

			jQuery('.tp-simpleresponsive, .tparrows').hover(function() {
				jQuery('.tp-simpleresponsive').addClass("mouseisover");
				jQuery('body').find('.tparrows').each(function() {
					jQuery(this).fadeIn(300);
				});
			}, function() {
				if (!jQuery(this).hasClass("tparrows"))
					jQuery('.tp-simpleresponsive').removeClass("mouseisover");
			})
		});	

	service.getfilejson().then(function(d) {
	    $scope.noticias = d;
	});
	// $scope.orderProp = 'title';
	// $scope.quantity = 2;
	/* Client Carousel Widget.  
	   Used: index.html, index-portfolio.html, index-revolution.html, about.html */
	$(".vc_client .vc_carousel").carouFredSel({
		responsive: true,
		prev:{
			button : function(){
				return $(this).parent().parent().parent().children('.met_carousel_control').children('a:first-child')
			}
		},
		next:{
			button : function(){
				return $(this).parent().parent().parent().children('.met_carousel_control').children('a:last-child')
			}
		},
		width: 'auto',
		circular: false,
		infinite: true,
		auto:{
			play : true,
			pauseDuration: 0,
			duration: 1000
		},
		items:{
			visible:{
				min: 1,
				max: 6
			},
			height: 152
		},
		pagination  : ".vc_client .vc_pager"
	});
	

	$("a[rel^='prettyPhoto']").prettyPhoto({deeplinking: false,social_tools: false});
});

angular.module('dcApp').controller('imbapodcastController', function ($scope) {
	$scope.tab = 1;

    $scope.setTab = function(newTab){
      $scope.tab = newTab;
    };

    $scope.isSet = function(tabNum){
      return $scope.tab === tabNum;
    };
});

angular.module('dcApp').controller('imbacontacController', function ($scope) {
	$scope.pageClass = 'page-home';

	// config map con leatf js
	var greenIcon = L.icon({
        iconUrl: 'assets/img/map/marker-icon.png',
        iconSize:     [38, 50], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 62],  // the same for the shadow
        popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
    });
      var osmUrl = 'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
        osmAttrib = '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
        osm = L.tileLayer(osmUrl, {maxZoom: 20, attribution: osmAttrib});
      var map = L.map('map').setView([0.348742, -78.123154,12], 14).addLayer(osm);
      L.marker([0.348742, -78.123154,12], {icon: greenIcon}).addTo(map)

    
        .bindPopup('<div class="container">'
        				+'<a href="http://oyeecuador.com/">'
        					+'<img src="assets/img/map/logo2.png">'
        				+'</a>'
    				+'</div>'
					+'Dir: Av. Mariano Acosta - Jaime Rivadeneira, (Esquina Farmacia, Edificio Conceptual Group Tercer Piso)</br>'
					+'Telf: (06) 260-6027</br>'
					+'Whatsap: +(593) 099 869 3535</br>'
					+'Cel: 099 869 3535</br>'
					
					+'WebSite: www.oyefm.com</br>');
          //.openPopup();
    // fin proceso map config


    $('#form-contactos').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
		rules: {
			txt_mail: {
				required: true,
				email:true
			},
			txt_nombre: {
				required: true
			},
			txt_mensaje: {
				required: true
			},
			sel_servicios: {
				required: true
			}
		},

		messages: {
			txt_mail: {
				required: "Campor requerido, Ingrese su correo electrónico",
				email:"Ingrese un correo valido"
			},
			txt_nombre: {
				required: "Campor requerido, Ingrese su nombre",
			},
			txt_mensaje: {
				required: "Campor requerido, Ingrese su mensaje",
			},
			sel_servicios: {
				required: "Campor requerido, Seleccione tipo de mensaje",
			}
		},

		highlight: function (e) {
			$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
		},
		success: function (e) {
			$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
			$(e).remove();
		},
		errorPlacement: function (error, element) {
			if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
				var controls = element.closest('div[class*="col-"]');
				if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
				else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
			}
			else if(element.is('.select2')) {
				error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
			}
			else if(element.is('.chosen-select')) {
				error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
			}
			else error.insertAfter(element.parent());
		},
		submitHandler: function (form) {
			console.log(form);
			alert('Mensaje Enviado');
			$(form).each(function(){
				this.reset();
			})
		}
	});
});

angular.module('dcApp').controller('imbatarifarioController', function ($scope, $routeSegment) {
	var id_param = $routeSegment.$routeParams.id;
	var parametros = 	{
							basico1:{
								title:'Plan Basico 1',
								'contenido' : 'hola',
								precio : '249',
								impactos : '3',
								programas : {
												0: {
													nombre : 'El Despertador',
													valor : 1
												},
												1: {
													nombre : 'La Sarten Por el Mango',
													valor : 2
												},
												2: {
													nombre : 'Inbox',
													valor : 0
												},
												3: {
													nombre : 'Los HP',
													valor : 0
												}

												
											}
							},
							basico2:{
								title:'Plan Basico 2 - recomendado',
								'contenido' : 'hola',
								precio : '249',
								impactos : '4',
								programas : {
												0: {
														nombre : 'El Despertador',
														valor : 1
													},
												1: {
													nombre : 'La Sarten Por el Mango',
													valor : 1
												},
												2: {
													nombre : 'Inbox',
													valor : 1
												},
												3: {
													nombre : 'Los HP',
													valor : 1
												}

											}
							},
							business1:{
								title:'Business 1',
								'contenido' : 'hola',
								precio : '499',
								impactos : '6',
								programas : {
												0: {
														nombre : 'El Despertador',
														valor : 1
													},
												1: {
													nombre : 'La Sarten Por el Mango',
													valor : 1
												},
												2: {
													nombre : 'Inbox',
													valor : 1
												},
												3: {
													nombre : 'Los HP',
													valor : 1
												}

											}
							},
							business2:{
								title:'Business 2 - recomendado',
								'contenido' : 'hola',
								precio : '649',
								impactos : '9',
								programas : {
												0: {
														nombre : 'El Despertador',
														valor : 2
													},
												1: {
													nombre : 'La Sarten Por el Mango',
													valor : 6
												},
												2: {
													nombre : 'Inbox',
													valor : 2
												},
												3: {
													nombre : 'Los HP',
													valor : 2
												}

											}
							},
							corporativo1:{
								title:'Plan Basico 2 - recomendado',
								'contenido' : 'hola',
								precio : '899',
								impactos : '12',
								programas : {
												0: {
														nombre : 'El Despertador',
														valor : 2
													},
												1: {
													nombre : 'La Sarten Por el Mango',
													valor : 6
												},
												2: {
													nombre : 'Inbox',
													valor : 2
												},
												3: {
													nombre : 'Los HP',
													valor : 2
												}

											}
							},
							corporativo2:{
								title:'Corporativo 2 - recomendado',
								'contenido' : 'hola',
								precio : '999',
								impactos : '4',
								programas : {
												0: {
														nombre : 'El Despertador',
														valor : 8
													},
												1: {
													nombre : 'La Sarten Por el Mango',
													valor : 4
												},
												2: {
													nombre : 'Inbox',
													valor : 3
												},
												3: {
													nombre : 'Los HP',
													valor : 3
												}

											}
							}

						};
	$scope.params = parametros[id_param];


	// inisidencias
	$('.element_plant').addClass('hidden');
});

angular.module('dcApp').controller('imbadespController', function ($scope, $routeSegment) {
	$('.element_plant').addClass('hidden');
});
angular.module('dcApp').controller('imba-sartens-Controller', function ($scope, $routeSegment) {
	$('.element_plant').addClass('hidden');
});
angular.module('dcApp').controller('imba-inbox-Controller', function ($scope, $routeSegment) {
	$('.element_plant').addClass('hidden');
});
angular.module('dcApp').controller('imba-hp-Controller', function ($scope, $routeSegment) {
	$('.element_plant').addClass('hidden');
});
angular.module('dcApp').controller('imba-codigodeontologico-Controller', function ($scope, $routeSegment) {
	$('.element_plant').addClass('hidden');
});

angular.module('dcApp').controller('imba-noticias-Controller', function ($scope, service) {

	service.getfilejson().then(function(d) {
	    $scope.noticias = d;
	});
	$("a[rel^='prettyPhoto']").prettyPhoto({deeplinking: false,social_tools: false});

});

