//Global Variable
var o = $.parseJSON(globals);
var baseUrl = o.baseUrl;
var location_office = o.location_office;
var location_office_url = o.location_office_url;

var locationToStringed = location_office;
var input = locationToStringed.replace('(', '');
var latlngStr = input.split(",", 2);
var lat = parseFloat(latlngStr[0]);
var lng = parseFloat(latlngStr[1]);

var map;
var gmarkers = [];

function initialize() {
	var infoWindow = new google.maps.InfoWindow();
	var haightAshbury = new google.maps.LatLng(lat, lng);
	var mapOptions = {
		zoom: 16,
		center: haightAshbury,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	
	map = new google.maps.Map(document.getElementById("google_map"), mapOptions);

	google.maps.event.addListener(map, 'click', function(){
		infoWindow.close();
	});

	var icons = new google.maps.MarkerImage(baseUrl+'/externals/support/images/map_marker.png', new google.maps.Size(55, 61), new google.maps.Point(0, 0));
	 
	function createMarker(point, id, html) {
		var marker = new google.maps.Marker({
			position: point,			
			icon: icons,
		});

		google.maps.event.addListener(marker, "click", function() {			
			infoWindow.setOptions({
				content: html,
				maxWidth: 500,
				maxHeight: 200,
			});
			map.setCenter(point);
			infoWindow.open(map,marker);
		});			
		gmarkers[id] = marker;

		return marker;
	}
	
	function getAllMarker() {
		var url = location_office_url;
		jQuery.ajax({type: 'GET', url: url, dataType: 'json',
			success: function(v){
				for(i in v.data){
					printMarker(v.data[i]);
				}		
			}
		});		
	}
	getAllMarker();
	
	function printMarker(v){	
		var point = new google.maps.LatLng(v.lat, v.lng);
		var html = '<div class="bubble"><strong>'+v.name+'</strong>'+v.address+'</div>';
		/*'<div class="bubble">\
			<strong>'+v.name+'</strong>\
			'+v.address+'\
		</div>';*/
		var marker = createMarker(point, v.id, html);
		marker.setMap(map);	
		return marker;
	}
	
}