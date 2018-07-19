<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

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
</script>
<script type="text/javascript">
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
	    value: 0.5,
	    size: 150,
	    thickness:10,
	    fill: {
	      color: ['#ffb900']
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
	$('#progress4').circleProgress({
	    value: 0.8,
	    size: 225,
	    thickness:10,
	    fill: {
	      color: ['#23C700']
	    }
	});
}
	
$(document).ready(function() {
    handle_progressBar();
    // handle_chart();
});		
</script>