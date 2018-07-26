<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYyTslZ7iqZ_IVXWWHzyaESvkHYKewW7Y&callback=handle_map" async defer></script>
<script type="text/javascript">
var handle_rtms = function () {
	// Load the Visualization API and the corechart package.
  google.charts.load('current', {'packages':['gauge']});

  // Set a callback to run when the Google Visualization API is loaded.
  google.charts.setOnLoadCallback(drawChart);

  // Callback that creates and populates a data table,
  // instantiates the pie chart, passes in the data and
  // draws it.
  function drawChart() {

    // Create the data table.
    var data = google.visualization.arrayToDataTable([
      ['Label', 'Value'],
      ['RTMS', 80],
    ]);

    // Set chart options
    var options = {
		          width: 150,
		          redFrom: 90, redTo: 100,
		          yellowFrom:75, yellowTo: 90,
		          minorTicks: 5
		        };

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.Gauge(document.getElementById('RTMS'));
    chart.draw(data, options);

    setInterval(function() {
      data.setValue(0, 1, 40 + Math.round(60 * Math.random()));
      chart.draw(data, options);
    }, 13000);
    setInterval(function() {
      data.setValue(1, 1, 40 + Math.round(60 * Math.random()));
      chart.draw(data, options);
    }, 5000);
    setInterval(function() {
      data.setValue(2, 1, 60 + Math.round(20 * Math.random()));
      chart.draw(data, options);
    }, 26000);
  }
}
var handle_progressBar = function () {
	$('#progress1').circleProgress({
	    value: 0.6,
	    size: 205,
	    thickness:10,
	    fill: {
	    	color: ['#ffb900']
	    }
	});
	$('#progress2').circleProgress({
	    value: 0.9,
	    size: 225,
	    thickness:10,
	    fill: {
	      gradient: ['#00CC00','#00b744']
	    }
	});
	$('#progress3').circleProgress({
	    value: 0.8,
	    size: 225,
	    thickness:10,
	    fill: {
	      color: ['#FF0700']
	    }
	});
	// $('#progress4').circleProgress({
	//     value: 0.4,
	//     size: 225,
	//     thickness:10,
	//     fill: {
	//       gradient: ['#06799F','#3AAACF']
	//     }
	// });
}

var handle_revenue = function () {
	var str_url = "<?=site_url('Overview/getDataRevenue')?>";
	$.ajax({
		url : str_url,
		dataType: 'json',
		success : function (json) {
			console.log(json.persen);
			$('#txtRevenue').text(json.persen);
			$('#txtTotalPendapatan').text(json.Total_Rupiah);
			$('#txtTotalLalin').text(json.Total_lalin);
			$('#progress4').circleProgress({
			    value: json.persen*0.01,
			    size: 225,
			    thickness:10,
			    fill: {
			      gradient: ['#06799F','#3AAACF']
			    }
			});
		}
	})
}

var handle_method_revenue = function () {
	var str_url = "<?=site_url('Overview/getDataMethodRevenue')?>";
	$.ajax({
		url : str_url,
		dataType: 'json',
		success : function (json) {
			console.log(json.persen);
			$('#txtBNI').text(json.BNI);
			$('#txtMandiri').text(json.Mandiri);
			$('#txtBCA').text(json.BCA);
			$('#txtBRI').text(json.BRI);	
			$('#txtTunai').text(json.Tunai);	
		}
	})
}

var handle_map = function () {
	var map;
	var url = "<?=base_url('/assets/images/')?>"
	var icon_gate = url+'gate.ico'
	//Array lokasi CCTV
	var location_cctv = [
		['KM 58+400', -6.1479851, 106.9394857],
		['KM 58+600', -6.1465706, 106.940038],
		['KM 59+400A', -6.145732, 106.940066],
		['KM 60+800A', -6.147953, 106.94022],	
		['KM 61+400A', -6.1260118,106.9285034],	

	];
	//Array lokasi gerbang tol
	var location_gt = [
		['GT Kebong Bawang', -6.119516, 106.893372, icon_gate],
		['GT Koja Barat', -6.108297, 106.902490, icon_gate],
		['GT Koja Direct', -6.102913, 106.900045, icon_gate],
		['GT Semper 1', -6.139385, 106.937772, icon_gate],
	];

	var contentString = '<img src="http://202.154.181.42:2030/mjpg/video.mjpg?resolution=320x240" width="130">';

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

    for (i = 0; i < location_cctv.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(location_cctv[i][1], location_cctv[i][2]),
        map: map,
        // icon: location_gt[i][3],
      });
      // event click untuk menampilkan info window
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('<h6>'+location_cctv[i][0]+'</h6>'+contentString);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }

    for (i = 0; i < location_gt.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(location_gt[i][1], location_gt[i][2]),
        map: map,
        // icon: location_gt[i][3],
      });
      // event click untuk menampilkan info window
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('<h6>'+location_gt[i][0]+'</h6>'+contentString);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
}
	
$(document).ready(function() {
    handle_progressBar();
    handle_rtms();
    handle_revenue();
    handle_method_revenue();
    // setInterval(function() {
    //    handle_revenue();
    // 	handle_method_revenue();
    // }, 10000);
    // handle_chart();
});		
</script>