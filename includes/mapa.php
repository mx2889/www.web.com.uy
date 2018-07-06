
<script type="text/javascript" src="js/infobubble/infobubble.min.js"></script>


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
		size: new google.maps.Size(30, 44),
		origin: new google.maps.Point(0, 0),
		anchor: new google.maps.Point(14, 44)
	};
	
var iconos = Array();
iconos['ico']='marker.png';  

iconos['ico_1']='marker.png';

/* Iconos hover */
iconos['ico_h']='marker-1-h.png';
iconos['ico_1_h']='marker-hover.png';

function ocultar($array, $tipo, $visible){
		
		var visibles = Array();
		var bounds = new google.maps.LatLngBounds();
		
		for(i=0; i<$array.length; i++){
			var punto = $array[i];
			var img = punto.icon;
			if($tipo!=''){
				if(punto.tipo!=$tipo){
					img.url=url+iconos[punto.ico+'_h'];
					/*punto.set('icon',n_image);*/
				}else{
					img.url=url+iconos[punto.ico];
					visibles.push(punto);
					bounds.extend(punto.position);
				}
				
				punto.set('icon',img);
				
			}else{
				if($visible){
					img.url=url+iconos[punto.ico];

				}else{
					img.url=url+iconos[punto.ico+'_h'];
				}
				punto.set('icon',img);
				visibles.push(punto);
				bounds.extend(punto.position);
			}
		}
		
		bounds.extend(centro.position);
		map.fitBounds(bounds);
		if($tipo==''){
			map.setCenter(centro.position);
			map.setOptions({zoom: 16});		
		}
		if($(window).width()<=800){
			map.setCenter(centro.position);
		}
}

var data = Array();
 
function mapear() {

	/* Centro del mapa */
	var marcadores=Array();
	var punto = new google.maps.LatLng(-34.909962, -56.162858);
	
 	var infowindow = new InfoBubble({
		  map:map,
          shadowStyle:3,
          padding:0,
          backgroundColor: 'rgba(255,255,255,0.95)',
          borderRadius: 0,
          arrowSize: 11,
          borderWidth: 0,
          borderColor: '#897E70',
          disableAutoPan: true,
          hideCloseButton: false,
          arrowPosition: 30,
          backgroundClassName: 'info_window',
          arrowStyle:2
		  /*minWidth: 235,
		  minHeight:200*/
        });
 
 	/* Grupo de marcadores */
 	var marcadores = Array(
	    /*tipo 1*/
	    {
			nombre:'',
			coor:'-34.909974, -56.163113',  
			tipo:'tipo_1',  
			info: '<p><b>Blvar. Artigas 1018</b><br/>(Entrada por escalera)</p>',
			ico:'ico_1'
		},

		{
			nombre:'',
			coor:'-34.909944, -56.162711',  
			tipo:'tipo_1',  
			info: '<p><b>Parra del Riego 1017</b><br/>(Estacionamiento para ambulancias y bicicletas.<br />Entrada sin escalera)</p>',
			ico:'ico_1'
		}
	); 
 
	var movil = $(window).width()>=800 ? true : false; 
	
	/*var infowindow = new InfoBubble({
          shadowStyle: 3,
          padding: 0,
          //backgroundColor: 'rgba(0,55,97,0.75)',
          borderRadius: 0,
          arrowSize: 10,
          borderWidth: 0,
          borderColor: '#897E70',
          disableAutoPan: true,
          hideCloseButton: true,
          arrowPosition: 30,
          backgroundClassName: 'info_window',
          arrowStyle: 2,
		  minWidth: 120,
          minHeight: 230
        });
	*/

	var mapOptions = {
	zoom: 18,
	center: punto,
	disableDefaultUI: false,
	scrollwheel: false,
	navigationControl: true,
    mapTypeControl: false,
    scaleControl: true,
    draggable: movil,
    disableDoubleClickZoom: false,
	styles:
	[
		{
			"featureType": "water",
			"elementType": "geometry",
			"stylers": [
				{
					"color": "#c2d6e8" /*agua*/
				}
			]
		},
		{
			"featureType": "landscape",
			"elementType": "geometry",
			"stylers": [
				{
					"color": "#93a5b5" /*terreno */
				}
			]
		},
		{
			"featureType": "road",
			"elementType": "geometry",
			"stylers": [
				{
					"color": "#bcccdb" /*calles*/
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
					"color": "#9aaebf" /* terreno 2 */
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
					"color": "#9aaebf" /*terreno 3*/
				}
			]
		}
	]
		
	};

	map = new google.maps.Map(document.getElementById('mapa'), mapOptions);

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

		google.maps.event.addListener(marker, 'click', function () {
			if(!infowindow.isOpen() || (infowindow.isOpen() && infowindow.num!=this.num)){
				infowindow.setContent('<div class="bubbles">'+this.info+'</div>');
				infowindow.set('num',this.num);
				infowindow.open(map, this);
				info=infowindow;
			}else{
				infowindow.close();
				info=null;

			}
			map.panTo(this.position);
		});
	}
    
	image.url = url+'';
	image.size = new google.maps.Size(26, 30);
	image.anchor = new google.maps.Point(13, 20);
	
	var marker = new google.maps.Marker({
		  position: new google.maps.LatLng(40.4169724,-3.7007453),
		  map: map,
		  icon: image,
		  zIndex:99999999,
		  title: "Ateneo Médico",
		});
		centro = marker;
		/* markers.push(marker); 
  		ocultar(markers,'',true); */
 
	google.maps.event.addDomListener(window, 'resize', function() {
			var movil = $(this).width() >=800 ? true : false;
			map.setOptions({draggable: movil});
			map.setCenter(punto);
	});
	




var borde = [
	{lat: -34.909899, lng: -56.163099},
	{lat: -34.909877, lng: -56.162744},
	{lat: -34.910049, lng: -56.162707},
	{lat: -34.910075, lng: -56.163073} 
];


  var bloque = new google.maps.Polygon({
    paths: borde,
    strokeColor: '#5F7B93',
    strokeOpacity: 0,
    strokeWeight: 1,
    fillColor: '#5F7B93',
    fillOpacity: 1
  });
  bloque.setMap(map);

 }	
 
google.maps.event.addDomListener(window, 'load', mapear);


</script>
 
 
 
 