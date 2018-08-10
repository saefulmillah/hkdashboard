<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9sDCHodLbslK52zA9A4RaCg9yInOUA7s&callback=handle_map" async defer></script>
<script type="text/javascript">

var handle_map = function () {
	var map;
	var url = "<?=base_url('/assets/images/')?>"
	var urlCctv = "<?=site_url('overview/getDataCCTV/0')?>"
	var urlCctvGT = "<?=site_url('overview/getDataCCTV/1')?>"
	var icon_gate = url+'marker2.png'
	var icon_cctv = url+'cctv.png'
	
	//Array lokasi gerbang tol
	var location_gt = [
		['GT Kebong Bawang', -6.119516, 106.893372, icon_gate],
		['GT Koja Barat', -6.108297, 106.902490, icon_gate],
		['GT Koja Direct', -6.102913, 106.900045, icon_gate],
		['GT Semper 1', -6.139385, 106.937772, icon_gate],
	];

	//Create Maps
	map = new google.maps.Map(document.getElementById('ATPmap'), {
	  center: {lat: -6.1182356, lng: 106.9084457},
	  zoom: 13
	});
	// Show Traffic Layer
	var trafficLayer = new google.maps.TrafficLayer();
        trafficLayer.setMap(map);
	// Init untuk menampilkan info windows
	var infowindow = new google.maps.InfoWindow({
		maxWidth: 200,
	});
	// init variable marker dan index
    var marker, i;

    $.getJSON(urlCctv, function (data) {
		$.each(data, function (i, data) {
				marker = new google.maps.Marker({
		        position: new google.maps.LatLng(data.latitude, data.longitude),
		        map: map,
		        icon: icon_cctv,
		      });
		      // event click untuk menampilkan info window
		      google.maps.event.addListener(marker, 'click', (function(marker, i) {
		        return function() {
		          infowindow.setContent('<h6>'+data.name+'</h6>'+'<img src="'+data.url+'" width="200">');
		          infowindow.open(map, marker);
		        }
		      })(marker, i));
		});
	});

	$.getJSON(urlCctvGT, function (data) {
		$.each(data, function (i, data) {
				marker = new google.maps.Marker({
		        position: new google.maps.LatLng(data.latitude, data.longitude),
		        map: map,
		        icon: icon_gate,
		      });
		      // event click untuk menampilkan info window
		      google.maps.event.addListener(marker, 'click', (function(marker, i) {
		        return function() {
		          infowindow.setContent('<h6>'+data.name+'</h6>'+'<img src="'+data.url+'" width="200">');
		          infowindow.open(map, marker);
		        }
		      })(marker, i));
		});
	});
}

var handle_zoom = function (_src) {
	// alert(_src);
	$('#main-cctv').html('<img class="img-fluid" src="'+_src+'" alt="Card image cap" width="100%" height="100%">');
}	

var handle_blinkCCTV = function () {
	var urlBlinkCCTV = "<?=site_url('Cctv/getBlinkCCTV')?>"
	$.getJSON(urlBlinkCCTV, function (data) {
		$.each(data, function (i, data) {
			console.log(data.id);
			// $('#cctv_'+data.id).css({'border':'1px solid red'});
			$('#cctv_'+data.id).removeClass('border');
			$('#cctv_'+data.id).addClass('blink');
		})
	})
}
$(document).ready(function() {
    $("#wrapper").removeClass("toggled");
    $('#hk-navbar').toggleClass("d-none");
    handle_blinkCCTV();
    // handle_zoom();
});
</script>