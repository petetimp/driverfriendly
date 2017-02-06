<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Untitled Document</title>
        <style type="text/css">
      		html, body {
				height:100%;
				margin: 0;
				padding: 0;
		    }
      		#map {
	      		height:280px;
				width:290px;
	  		}
    	</style>
    </head>
    
    <body>
    	<div id="map"></div>
    	<script type="text/javascript">
			function initMap() {
				var lat;
				var lng;			
				var city=window.parent.document.getElementById('table_city').innerHTML;
				if(city=="New Brunswick"){
					lat=40.4867;
					lng=-74.4444;
				}else{
				    lat=40.5456;
					lng=-74.4608;
				}
				// Create a map object and specify the DOM element for display.
				var map = new google.maps.Map(
					document.getElementById('map'),
					{
						center: {lat: lat, lng: lng},
						scrollwheel: false,
						zoom: 12
					}
				);
				
			}            
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9c0CnEdyraSsPJrPZ6pHsOCj44KDPbFw&callback=initMap"></script>
    </body>
</html>