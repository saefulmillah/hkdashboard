<script src="<?=base_url('assets/js/highcharts.js')?>"></script>
<script type="text/javascript">
 
var table;
var handle_lalinAntarGerbang = function () {
    var url = "<?=site_url('transaction/comparison/getDataGroups')?>";
    // Build the chart
    var options = {
                    chart: {
                        renderTo: 'lalinAntarGerbang',
                        type: 'spline'
                    },
                    title: {
                        text: 'Monthly Average Temperature',
                        x: -20 //center
                    },
                    subtitle: {
                        text: 'Source: WorldClimate.com',
                        x: -20
                    },
                    yAxis: {
                        title: {
                            text: 'Temperature (°C)'
                        },
                        plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                        }]
                    },
                    tooltip: {
                        valueSuffix: '°C'
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle',
                        borderWidth: 0
                    }
                };
    $.getJSON(url,  function(data) {
                    options.series = data.series;
                    options.xAxis = data.xAxis;
                    var chart = new Highcharts.Chart(options);
                });                

}
 
$(document).ready(function() {
    handle_lalinAntarGerbang();
});
</script>