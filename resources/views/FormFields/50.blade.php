<?php // Default Lat n Lng
$lat = 51.5074;
$lng = -0.1278;
?>
<?php 
if(isset($moduleFields->{$sec}->{ "displayValue_".$fieldId })){
	$value = $moduleFields->{$sec}->{ "displayValue_".$fieldId }; 
	$latLngFields = explode('|', $value);
	$lat = trim($latLngFields[0] , '|') ;
	$lng = trim($latLngFields[1] , '|') ;
}

?>
<div id="googleMap" style="width:400px;height:275px;"></div>

<input type="text" placeholder="{{$fields->tbl_fld_place_holder}}" name="{{$fields->tbl_fld_tbl_col_name}}" id="{{$fields->tbl_fld_tbl_col_name}}" class="form-control {{$fields->tbl_fld_class}}" value = '{{$lat}}|{{$lng}}'>


<script type="text/javascript">			

// In the following example, markers appear when the user clicks on the map.
// The markers are stored in an array.
// The user can then click an option to hide, show or delete the markers.
var map;
var markers = [];
var latLngPlaceHolder = '{{$fields->tbl_fld_tbl_col_name}}';

function initMap() {
var defaultMapCenter =  {lat: <?php echo $lat; ?>, lng: <?php echo $lng; ?>};   //{lat: 51.5074, lng: -0.1278};

map = new google.maps.Map(document.getElementById('googleMap'), {
  zoom: 14,
  center: defaultMapCenter,
  mapTypeId: 'terrain'
});

// This event listener will call addMarker() when the map is clicked.
map.addListener('click', function(event) {
	clearMarkers(); // Only One Marker at a time	
	var lat = event.latLng.lat();
	var lng = event.latLng.lng();
	$('#'+latLngPlaceHolder).val( lat + '|' + lng);
  	addMarker(event.latLng);
});

// Adds a marker at the center of the map.
addMarker(defaultMapCenter);
}

// Adds a marker to the map and push to the array.
function addMarker(location) {	      	
var marker = new google.maps.Marker({
  position: location,
  map: map
});
markers.push(marker);
}

// Sets the map on all markers in the array.
function setMapOnAll(map) {
for (var i = 0; i < markers.length; i++) {
  markers[i].setMap(map);
}
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
setMapOnAll(null);
}

// Shows any markers currently in the array.
function showMarkers() {
setMapOnAll(map);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
clearMarkers();
markers = [];
}

$(document).ready(function() {	});
	setTimeout(function(){ initMap(); }, 2000);		

</script>