angular.module('scotchApp').controller('contactosController', function ($scope) {
	$scope.pageClass = 'page-home';

	// config map con leatf js
	var greenIcon = L.icon({
        iconUrl: 'img/map/marker-icon.png',
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

    
        .bindPopup('<div class="container"><a href="http://oyeecuador.com/"><img src="img/map/logo2.png"></a></div><p class="letras">Dir: Av. Mariano Acosta - Jaime Rivadeneira</p><p class="letras">Tlf: (06) 260-6027</p><p class="letras">Sitio Web: www.oyefm.com</p>');
          //.openPopup();
    // fin proceso map config
});