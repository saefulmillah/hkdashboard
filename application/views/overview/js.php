<script type="text/javascript">

var handle_progressBar = function () {
	$('#progress1').circleProgress({
	    value: 0.6,
	    size: 200,
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
	    size: 220,
	    thickness:10,
	    fill: {
	      color: ['#FF0700']
	    }
	});
	$('#progress4').circleProgress({
	    value: 0.8,
	    size: 220,
	    thickness:10,
	    fill: {
	      color: ['#23C700']
	    }
	});
}

var handle_chart = function () {
	var ctxD = document.getElementById("doughnutChart").getContext('2d');
	// Chart options
	Chart.defaults.global.legend.display = false;
	var myLineChart = new Chart(ctxD, {
	    type: 'doughnut',
	    data: {
	        labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
	        datasets: [
	            {
	                data: [300, 50],
	                backgroundColor: ["#F7464A", "#46BFBD"],
	            }
	        ]
	    }
	});
}
	
$(document).ready(function() {
    handle_progressBar();
    // handle_chart();
});		
</script>