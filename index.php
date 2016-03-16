<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
<script src="http://cdn.pubnub.com/pubnub-3.7.1.min.js"></script>
<script src='https://api.tiles.mapbox.com/mapbox.js/v2.1.4/mapbox.js'></script>
<link rel="stylesheet"
      href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link href='https://api.tiles.mapbox.com/mapbox.js/v2.1.4/mapbox.css' rel='stylesheet' />
<style>
  body { margin:0; padding:0; }
  #map { position:absolute; top:0; bottom:0; width:100%; }
</style>
</head>

<body>
<div id='map'></div>

<script>
	pubnub = PUBNUB.init({
	publish_key: 'pub-c-2abab4a3-189a-4355-b694-bd63a2ff00ae',
	subscribe_key: 'sub-c-86d2f1ae-e9f8-11e5-bf9d-02ee2ddab7fe'
})
pubnub.subscribe({
	channel: "my_channel",
	message: function(message, channel) {
	  console.log(message)
	  lat = message['lat'];
	  lng = message['lng'];
	  map.setView([lat, lng]);
	  var marker = L.marker([lat, lng], {
	icon: L.mapbox.marker.icon({
	  'marker-color': '#f86767'
	})
});
marker.addTo(map);
	},
	connect: function() {console.log("pubnub connected")}
}),

L.mapbox.accessToken = 'pk.eyJ1IjoidGR3Y2tzIiwiYSI6IlhwMGlGR28ifQ.irq5Rbn1WvGb_VIwn1auNA';
var map = L.mapbox.map('map', 'mapbox.streets')

</script>
</body>

</html>