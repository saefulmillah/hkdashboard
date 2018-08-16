<script src="<?=base_url('assets/js/highcharts.js')?>"></script>
<script type="text/javascript">
 
var table;
var handle_grafikTingkatFatalitas = function () {
    var url = "<?=site_url('Lalulintas/GrafikTingkatFatalitas/getDataTingkatKecelakaan')?>";
    // Build the chart
    var timestamp_json = new Array();
    var accidentlevel_json = new Array();   
    $.getJSON(url, function(data) {
                    // Populate series
                    for (i = 0; i < data.length; i++){
                        timestamp_json.push([data[i].tmonth]);
                        accidentlevel_json.push([Math.round(data[i].fatality_level * 100) / 100]);
                    }
                 
                    // draw chart
                    $('#GrafikTingkatFatalitas').highcharts({
                        credits:{enabled:false},
                        title: {
                            text: 'Grafik Tingkat Fatalitas'
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.y:,.2f}</b>'
                        },
                        xAxis: [{
                            categories: timestamp_json, // FILL THIS
                            crosshair: true
                        }],
                        yAxis: [{ // Primary yAxis
                            labels: {
                                format: '{value}',
                                style: {
                                    color: Highcharts.getOptions().colors[0]
                                }
                            },
                            title: {
                                text: 'Rate',
                                style: {
                                    color: Highcharts.getOptions().colors[0]
                                }
                            },
                        }],
                        series: [{
                                         name: 'Lalin. Total',
                                         type: 'column',
                                         data: accidentlevel_json, // FILL THIS
                                }]
                    }); 
                });          

}
 
$(document).ready(function() {
    handle_grafikTingkatFatalitas();
    /*using interval redraw 3 sec*/
    // setInterval(function() {
    //    handle_lalinAntarGerbang();
    //     handle_pendapatanAntarGerbang();
    //     handle_comparisonMethodPayment();
    //     handle_NoTranALRantarGerbang();
    //     handle_NoTranLSBantarGerbang();
    //     handle_LalinAntarGolongan();
    // }, 5000);
});
</script>