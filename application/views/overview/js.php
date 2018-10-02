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
    var chart2 = new google.visualization.Gauge(document.getElementById('RTMS2'));
    chart.draw(data, options);
    chart2.draw(data, options);

    setInterval(function() {
      data.setValue(0, 1, 40 + Math.round(60 * Math.random()));
      chart.draw(data, options);
      chart2.draw(data, options);
    }, 13000);
    setInterval(function() {
      data.setValue(1, 1, 40 + Math.round(60 * Math.random()));
      chart.draw(data, options);
      chart2.draw(data, options);
    }, 5000);
    setInterval(function() {
      data.setValue(2, 1, 60 + Math.round(20 * Math.random()));
      chart.draw(data, options);
      chart2.draw(data, options);
    }, 26000);
  }
}

var handle_revenue_daily = function () {
	var str_url = "<?=site_url('Overview/getDataRevenueDaily')?>";
	$.ajax({
		url : str_url,
		dataType: 'json',
		success : function (json) {
			// console.log(json.persen);
			// $('#txtRevenueDaily').text(json.persen);
			$('#txtRevenueGearDaily').text(handle_addCommas(json.Total_Rupiah));
			$('#txtLalinGearDaily').text(handle_addCommas(json.Total_lalin));
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
			$('#barRevenue').css('width', json.persen+'%');
			$('#txtTotalPendapatan, #txtRevenueGear').text(handle_addCommas(json.Total_Rupiah));
			$('#txtTotalLalin, #txtLalinGear').text(handle_addCommas(json.Total_lalin));
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
			$('#barRevenueYearly').css('width', json.persen+'%');
			$('#txtRevenueYearly').text(json.persen);
			$('#txtRevenueGearYearly').text(handle_addCommas(json.Total_Rupiah));
			$('#txtLalinGearYearly').text(handle_addCommas(json.Total_lalin));
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
			$('#barAccident').css('height', json.AccidentPersen+'%');
			$('#txtAccidentCurrent').text(json.accident_level);
			$('#txtAccidentLimit').text(json.max_limit);
			// if (json.accident_level==null) {
			// 	$('#txtAccidentCurrent').text('0.00');
			// } else {
			// 	$('#txtAccidentCurrent').text(json.max_limit);
			// }
		}
	})
}

var handle_complain = function () {
	var str_url = "<?=site_url('Overview/getDataComplain')?>";
	$.ajax({
		url : str_url,
		dataType: 'json',
		success : function (json) {
			console.log(json);
			$('#barComplain').css('height', json.percent+'%');
			$('#txtComplainCurrent').text(json.total);
			$('#txtComplainLimit').text(json.maxLimit);
			// if (json.accident_level==null) {
			// 	$('#txtAccidentCurrent').text('0.00');
			// } else {
			// 	$('#txtAccidentCurrent').text(json.max_limit);
			// }
		}
	})
}

var handle_DataRating = function () {
	var str_url = "<?=site_url('Overview/getDataRating')?>";
	$.ajax({
		url : str_url,
		dataType: 'json',
		success : function (json) {
			// console.log(json);
			console.log(json[0].question);
			if (json[0].id=='9') {
				$('#starLayananInformasi').css('width', json[0].percent+'%');
			}
			if (json[1].id=='12') {
				$('#starKondisiTunnel').css('width', json[1].percent+'%');
			}
			if (json[2].id=='15') {
				$('#starRambuJalan').css('width', json[2].percent+'%');
			}
			if (json[3].id=='7') {
				$('#starKondisiJalan').css('width', json[3].percent+'%');
			}

			// if (json.accident_level==null) {
			// 	$('#txtAccidentCurrent').text('0.00');
			// } else {
			// 	$('#txtAccidentCurrent').text(json.max_limit);
			// }
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
	  zoom: 13,
	  disableDefaultUI: true
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

var handle_search = function () {
    var str_url = "<?=site_url('Transaction/GrafikHarian/getDataHarian2')?>";
        $.ajax({
            url: str_url,
            dataType: "json",
            success: function (data) {
                handle_highchart(data);
            }
        });
}

var handle_highchart = function (data) {
    var totalTraffic_json = new Array();
    // Populate series
    for (i = 0; i < data.length; i++){
        totalTraffic_json.push([parseInt(data[i].traffic)]);
    }
	Highcharts.chart('container-chart', {
	  chart: {
	    type: 'area',
	    backgroundColor:'rgba(255, 255, 255, 0.0)',
	    margin: [0, 0, 0, 0],
	    // borderColor: '#17a2b8',
        // borderWidth: 2,
	  },
	  plotOptions: {
	        series: {
	            marker: {
	                enabled: false
	            }
	        },
	        area : {
	        	fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[0]],
                        [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                    ]
                },
	        }
	    },
	  credits: {
	      enabled: false
	  },
	    title:{
	      text:''
	  },
	  exporting: { enabled: false },
	  xAxis: {
	    labels: {
	       enabled: true
	   },
	   minorGridLineWidth: 0,
	   minorTickLength: 0,
	   tickLength: 0
	  },
	  yAxis: {
	    title: false,
	    labels: {
	       enabled: false
	   },
	    gridLineWidth: 0,
        minorGridLineWidth: 0,
	  },
	  series: [{
	    showInLegend: false,  
	    data: totalTraffic_json, // FILL THIS
	    // data: [
	    //   20434, 24126, 27387, 29459, 31056, 31982, 32040, 31233, 29224, 27342,
	    //   26662, 26956, 27912, 28999, 28965, 27826, 25579, 25722, 24826, 24605,
	    //   24304, 23464, 23708, 24099, 24357, 24237, 24401, 24344, 23586, 22380,
	    //   21004, 17287, 14747, 13076, 12555, 12144, 11009, 10950, 10871, 10824,
	    //   10577, 10527, 10475, 10421, 10358, 10295, 10104, 9914, 9620, 9326,
	    //   5113, 5113, 4954, 4804, 4761, 4717, 4368, 4018
	    // ]
	  }]
	});
}

var handle_addCommas = function (nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

var handle_rtms2 = function () {
	var str_url = "<?=site_url('overview/getRTMS/')?>";
    $.ajax({
        url: str_url,
        dataType: "json",
        success: function (data) {
            // console.log(data[0]['jalur']);
            if (data[0]['jalur']=='A') {
            	$(".needle_A").css("transform", 'rotate('+data[0]['speed']*1.25+'deg)');
				$(".loading_A").text(data[0]['speed']+" km/h");
				$(".avgspeed_A").text(data[0]['speed']+" km/h");
            } 

            if (data[1]['jalur']=='A') {
            	$(".needle_A").css("transform", 'rotate('+data[1]['speed']*1.25+'deg)');
				$(".loading_A").text(data[1]['speed']+" km/h");
				$(".avgspeed_A").text(data[1]['speed']+" km/h");
            }

            if (data[0]['jalur']=='B') {
            	$(".needle_B").css("transform", 'rotate('+data[0]['speed']*1.25+'deg)');
				$(".loading_B").text(data[0]['speed']+" km/h");
				$(".avgspeed_B").text(data[0]['speed']+" km/h");
            } 

            if (data[1]['jalur']=='B') {
            	$(".needle_B").css("transform", 'rotate('+data[1]['speed']*1.25+'deg)');
				$(".loading_B").text(data[1]['speed']+" km/h");
				$(".avgspeed_B").text(data[1]['speed']+" km/h");
            } 
        }
    });
	
	// $.ajax({
 //        url: str_url,
 //        dataType: "json",
 //        success: function (data) {
 //            // console.log(data[0]['jalur']);
 //            $(".needle_B").css("transform", 'rotate('+data[0]['speed']*1.25+'deg)');
	// 		$(".loading_B").text(data[0]['speed']+" km/h");
	// 		$(".avgspeed_B").text(data[0]['speed']+" km/h");
 //        }
 //    });
	

}
	
$(document).ready(function() {
	handle_rtms2();
    // handle_DataRating();
    // handle_revenue_daily();
    // handle_accidentLevel();
    // handle_complain();
    // handle_revenue();
    // handle_revenue_yearly();
    // handle_method_revenue();
    // handle_search();
    // handle_revenue_daily();
    // setInterval(function() {
    //     handle_accidentLevel();
	   //  handle_revenue();
	   //  handle_revenue_yearly();
	   //  handle_method_revenue();
	   //  handle_revenue_daily();
    // }, 10000);
    // handle_chart();
});		
</script>