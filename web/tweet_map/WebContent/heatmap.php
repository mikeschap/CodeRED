

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Heatmaps</title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
#floating-panel {
  position: absolute;
  top: 10px;
  left: 25%;
  z-index: 5;
  background-color: #fff;
  padding: 5px;
  border: 1px solid #999;
  text-align: center;
  font-family: 'Roboto','sans-serif';
  line-height: 30px;
  padding-left: 10px;
}

      #floating-panel {
        background-color: #fff;
        border: 1px solid #999;
        left: 25%;
        padding: 5px;
        position: absolute;
        top: 10px;
        z-index: 5;
      }
    </style>
  </head>

  <body onload="setInterval(changeOpacity,1000);">
    <div id="floating-panel">
      <button onclick="toggleHeatmap()">Toggle Heatmap</button>
      <button onclick="changeGradient()">Change gradient</button>
      <button onclick="changeRadius()">Change radius</button>
      <button onclick="changeOpacity()">Change opacity</button>
    </div>
    <div id="map"></div>
    <script>

var map, heatmap;
var gradient = [
    'rgba(0, 0, 0, 0)',
    'rgba(12, 35, 64, 1)',
    'rgba(25, 17, 99, 1)',
    'rgba(94, 22, 134, 1)',
    'rgba(170, 27, 143, 1)',
    'rgba(205, 30, 78, 1)',
    'rgba(241, 90, 34, 1)',
    'rgba(243, 112, 76, 1)',
    'rgba(246, 140, 119, 1)',
    'rgba(249, 172, 163, 1)',
    'rgba(252, 211, 208, 1)',
    'rgba(255, 255, 255, 1)'
  ];
  
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 13,
    center: {lat: 37.775, lng: -122.434},
    mapTypeId: google.maps.MapTypeId.SATELLITE
  });

  heatmap = new google.maps.visualization.HeatmapLayer({
    data: [],
    map: map,
    gradient: gradient
  });
  for(a = 0; a < 5; a++){
    addPoint(37.782551+(a*.1), -122.445368+(a*.1), a);
  }
}

function toggleHeatmap() {
  heatmap.setMap(heatmap.getMap() ? null : map);
}

function changeGradient() {
  heatmap.set('gradient', heatmap.get('gradient') ? null : gradient);
}

function changeRadius() {
  heatmap.set('radius', heatmap.get('radius') ? null : 20);
}

function changeOpacity() { 
<<<<<<< HEAD
	for(a = heatmap.getData.getLength(); a > 0 ; a--) {
		heatmap.getData()[a].weight -= .3;
=======
	for(a = heatmap.data.length-1; a >= 0 ; a--) {
		heatmap.data.setAt(a,{location: heatmap.data.getAt(a).location, weight: heatmap.data.getAt(a).weight-.5});
>>>>>>> branch 'master' of https://github.com/mikeschap/CodeRED.git
		if(heatmap.data.getAt(a).weight<0.31){
			heatmap.data.setAt(a,null);
		}
	}
}

function addPoint(lat, lng, wgt) {
	heatmap.data.push({location: new google.maps.LatLng(lat, lng), weight: wgt*2});
}

    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5i6slOPeFAVPgQX250x20f8G51D9nsns&signed_in=true&libraries=visualization&callback=initMap">
    </script>
  </body>
</html>
