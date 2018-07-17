<script type="text/javascript">

var handle_progressBar = function () {
	$('#progress1').circleProgress({
		startAngle: -Math.PI / 2,
	    value: 0.75,
	    size: 170,
	    thickness:10,
	    fill: {gradient: ['#ff1e41', '#ff5f43']}
	});
	$('#progress2').circleProgress({
		startAngle: -Math.PI / 3,
	    value: 0.5,
	    size: 150,
	    thickness:8,
	    fill: {
	      color: ["green"]
	    }
	});
	$('#progress3').circleProgress({
		startAngle: -Math.PI / 1,
	    value: 0.8,
	    size: 180,
	    thickness:5,
	    fill: {
	      color: ["blue"]
	    }
	});
}
	
$(document).ready(function() {
    handle_progressBar();
});		
</script>