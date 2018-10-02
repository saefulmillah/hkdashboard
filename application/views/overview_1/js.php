<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9sDCHodLbslK52zA9A4RaCg9yInOUA7s&callback=handle_map" async defer></script>
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
	// $('#progress1').circleProgress({
	//     value: 10,
	//     size: 225,
	//     thickness:10,
	//     fill: {
	//     	color: ['#ffb900']
	//     }
	// });
	// $('#progress2').circleProgress({
	//     value: 0.9,
	//     size: 225,
	//     thickness:10,
	//     fill: {
	//       gradient: ['#00CC00','#00b744']
	//     }
	// });
	// $('#progress3').circleProgress({
	//     value: 0.62406015,
	//     size: 225,
	//     thickness:10,
	//     fill: {
	//       color: ['#FF0700']
	//     }
	// });
	// $('#progress4').circleProgress({
	//     value: 0.4,
	//     size: 225,
	//     thickness:10,
	//     fill: {
	//       gradient: ['#06799F','#3AAACF']
	//     }
	// });
}

var handle_revenue_daily = function () {
	var str_url = "<?=site_url('Overview/getDataRevenueDaily')?>";
	$.ajax({
		url : str_url,
		dataType: 'json',
		success : function (json) {
			// console.log(json.persen);
			// $('#txtRevenueDaily').text(json.persen);
			$('#txtRevenueGearDaily').text(json.Total_Rupiah);
			$('#txtLalinGearDaily').text(json.Total_lalin);
		}
	})
}

var handle_revenue = function () {
	var str_url = "<?=site_url('Overview/getDataRevenue')?>";
	$.ajax({
		url : str_url,
		dataType: 'json',
		success : function (json) {
			console.log(json.persen);
			$('#txtRevenue').text(json.persen);
			$('#txtTotalPendapatan, #txtRevenueGear').text(json.Total_Rupiah);
			$('#txtTotalLalin, #txtLalinGear').text(json.Total_lalin);
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

var handle_revenue_yearly = function () {
	var str_url = "<?=site_url('Overview/getDataRevenueYearly')?>";
	$.ajax({
		url : str_url,
		dataType: 'json',
		success : function (json) {
			console.log(json.persen);
			$('#txtRevenueYearly').text(json.persen);
			$('#txtRevenueGearYearly').text(json.Total_Rupiah);
			$('#txtLalinGearYearly').text(json.Total_lalin);
			$('#progress2').circleProgress({
			    value: json.persen*0.01,
			    size: 225,
			    thickness:10,
			    fill: {
			      gradient: ['#00CC00','#00b744']
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

var handle_accidentLevel = function () {
	var str_url = "<?=site_url('Overview/getAccidentLevel')?>";
	$.ajax({
		url : str_url,
		dataType: 'json',
		success : function (json) {
			console.log(json);
			$('#txtAccidentCurrent').text(json.accident_level);
			$('#txtAccidentLimit').text(json.max_limit);
			if (json.accident_level==null) {
				$('#txtAccidentCurrent').text('0.00');
			} else {
				$('#txtAccidentCurrent').text(json.max_limit);
			}
			$('#progress3').circleProgress({
			    value: json.accident_level/json.max_limit,
			    size: 225,
			    thickness:10,
			    fill: {
			      color: ['#FF0700']
			    }
			});
		}
	})
}

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
	
$(document).ready(function() {
    handle_progressBar();
    handle_rtms();
    handle_accidentLevel();
    handle_revenue();
    handle_revenue_yearly();
    handle_method_revenue();
    setInterval(function() {
        handle_accidentLevel();
	    handle_revenue();
	    handle_revenue_yearly();
	    handle_method_revenue();
	    handle_revenue_daily();
    }, 10000);
    // handle_chart();
});		
</script>