
// create the controller and inject Angular's $scope
angular.module('scotchApp').controller('mainController', function ($scope) {

  $('.flexslider').flexslider({
    animation: "slide"
  });

  $("a[rel^='prettyPhoto']").prettyPhoto({deeplinking: false,social_tools: false});


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

    console.log('test');
    var dispositivo = navigator.userAgent.toLowerCase();
        if( dispositivo.search(/iphone|ipod|ipad|android/) > -1 ){
            // document.location = ‘http://www.pepfarinweb.com/mobile’;  
            console.log('mobile');
        }
  // para el Instagram
});
