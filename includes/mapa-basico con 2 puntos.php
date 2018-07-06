



<script type="text/javascript"> 
var markers = Array();
var info = Array();
var map;
var centro; 
var info;
/*var mapData;*/

	/* Iconos */
	var url = 'img/';
	var image = {
		size: new google.maps.Size(28, 41),
		origin: new google.maps.Point(0, 0),
		anchor: new google.maps.Point(14, 44)
	};
	
var iconos = Array();
iconos['ico']='ico-marker.svg';  

var data = Array();
 
function mapear() {

	/* Centro del mapa */
	var marcadores=Array();
	var punto = new google.maps.LatLng(-34.799610, -55.628796);

	
 	/* Grupo de marcadores */
 	var marcadores = Array(
	    /*tipo 1*/
	    {
			nombre:'',
			coor:'-34.921908, -56.159123',  
			tipo:'tipo_1',  
			info: '<p><b>Blvar. Artigas 1018</b><br/>(Entrada por escalera)</p>',
			ico:'ico'
		},
		{
			nombre:'',
			coor:'-34.9474301,-54.9337215',  
			tipo:'tipo_1',  
			info: '<p><b>Blvar. Artigas 1018</b><br/>(Entrada por escalera)</p>',
			ico:'ico'
		}
	); 
 

	var mapOptions = {
		zoom: 9,
		center: punto,
		disableDefaultUI: false,
		scrollwheel: false,
		navigationControl: true,
		mapTypeControl: false,
		scaleControl: true,
		disableDoubleClickZoom: false,
		styles:
		[
		{
			"featureType": "water",
			"elementType": "geometry",
			"stylers": [
				{
					"color": "#3C3D41" /*agua*/
				}
			]
		},
		{
			"featureType": "landscape",
			"elementType": "geometry",
			"stylers": [
				{
					"color": "#525459" /*terreno */
				}
			]
		},
		{
			"featureType": "road",
			"elementType": "geometry",
			"stylers": [
				{
					"color": "#3C3D41" /*calles*/
				},
				{
					"lightness":0
				}
			]
		},

		{
			"featureType": "poi",
			"elementType": "geometry",
			"stylers": [
				{
					"color": "#525459" /* terreno 2 */
				},
				{
					"lightness":0
				}
			]
		}, 
		{ 
      "featureType": "poi.business", 
      "elementType": "labels", 
     "stylers": [ 
          { "visibility": "on" } 
      ] 
    } ,
  
		{
			"featureType": "transit",
			"elementType": "geometry", 
			"stylers": [
				{
					"color": "#ffffff"
				}
			]
		},
		{
			"elementType": "labels.text.stroke",
			"stylers": [
				{
					"visibility": "on"
				},
				{
					"color": "#ffffff" /*letras */
				},
				{
					"weight": 2
				},
				{
					"gamma": 20
				}
			]
		},
		{
			"elementType": "labels.text.fill",
			"stylers": [
			{
					"visibility": "on"  
				},
				{
					"color": "#333333" /*letras color*/
				},
				
			]
		}, 
		{
			"featureType": "administrative",
			"elementType": "geometry",
			"stylers": [
				{
					"weight": 0.0
				},
				{
					"color": "#e0d8d4"
				}
			]
		},
		{
			"elementType": "labels.icon",
			"stylers": [
				{
					"visibility": "off"
				}
			]
		},
		
		{
        "featureType": "transit.station.bus",
        "stylers": [
          { "visibility": "off" }
        ]
        },
		
		{
        "featureType": "transit.station.rail",
        "stylers": [
          { "visibility": "on" },
		  {"saturation": -100}
        ]
        },
		
		{
			"featureType": "poi.business",
			"elementType": "geometry",
			"stylers": [
				{
					"visibility": "off" /*terreno*/
				}
			]
		},
		
		{
			"featureType": "poi.park",
			"elementType": "geometry",
			"stylers": [
				{
					"color": "#525459" /*terreno 3*/
				}
			]
		}
	]
		
	};

	map = new google.maps.Map(document.getElementById('mapa-uruguay'), mapOptions);

	mapData = map.data;
	/* Marcadores */
	for(i=0; i<marcadores.length; i++){
		var marca = marcadores[i];
		var coords = marca.coor.split(',');
		var pos = new google.maps.LatLng(coords[0],coords[1]);
		image.url = url+iconos[marca.ico];
		var marker = new google.maps.Marker({
		  position: pos,
		  map: map,
		  icon: image,
		  title: "'"+marca.nombre+"'",
		});
		marker.set('tipo',marca.tipo);
		marker.set('info',marca.info);
		marker.set('ico',marca.ico);
		marker.set('num',i);
		markers.push(marker);

		
	}
    
	image.url = url+'';
	image.size = new google.maps.Size(28, 41);
	image.anchor = new google.maps.Point(13, 20);
	
	var marker = new google.maps.Marker({
		  position: new google.maps.LatLng(40.4169724,-3.7007453),
		  map: map,
		  icon: image,
		  zIndex:99999999,
		  title: "Darko",
		});
		centro = marker;
		/* markers.push(marker); 
  		ocultar(markers,'',true); */
 
	

 }	
 
google.maps.event.addDomListener(window, 'load', mapear);


</script>
 
 
 
 