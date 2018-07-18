<script type="text/javascript">

var handle_progressBar = function () {
	$('#progress1').circleProgress({
	    value: 0.6,
	    size: 170,
	    thickness:10,
	    fill: {gradient: ['#ff1e41', '#ff5f43']}
	});
	$('#progress2').circleProgress({
	    value: 0.5,
	    size: 150,
	    thickness:10,
	    fill: {
	      color: ["green"]
	    }
	});
	$('#progress3').circleProgress({
	    value: 0.8,
	    size: 190,
	    thickness:10,
	    fill: {
	      color: ["blue"]
	    }
	});
	$('#progress4').circleProgress({
	    value: 0.8,
	    size: 190,
	    thickness:10,
	    fill: {
	      color: ["Yellow"]
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