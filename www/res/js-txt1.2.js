

function initialize() {
  var mapOptions = {
    zoom: 10,
    center: new google.maps.LatLng(38.96, -77.36)
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'),
                                mapOptions);
	



var username = "Steve";

getLocations();

function getLocations() {

		$.ajax({
    type: "POST",
    url: "http://a-information.com/txtblocker/getlocs.php",
    // The key needs to match your method's input parameter (case-sensitive).
    data: {'userid': username },
    success: function(data){
    var parsed_data = $.parseJSON(data);
    $.each(parsed_data, function(index, element) {
      
      addMarkerlabel(element.lat,element.long,element.speed,element.date);
    });
    },
    failure: function(errMsg) {
        
    }
	});
        }



		function addMarker(lat,long,speed) {
        	var myLatlng = new google.maps.LatLng(lat,long,speed);
        	var marker = new google.maps.MarkerWithLabel({
    		position: myLatlng,
    		map: map,
    		labelContent:speed
		});
		}
		
		function addMarkerlabel(lat,long,speed,date) {
        	var myLatlng = new google.maps.LatLng(lat,long);
			var marker = new MarkerWithLabel({
            position: myLatlng,
            map: map,
            title: speed,
            labelContent: speed,
            labelAnchor: new google.maps.Point(7, 30),
            labelClass: "labels", // the CSS class for the label
            labelInBackground: false
         });
       }
		
	}
	google.maps.event.addDomListener(window, 'load', initialize);

   