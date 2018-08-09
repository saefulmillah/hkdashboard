<script src="<?=base_url('assets/js/highcharts.js')?>"></script>
<script type="text/javascript">
 
var table;
var handle_grafikTingkatKecelakaan = function () {
    var url = "<?=site_url('Lalulintas/GrafikTingkatKecelakaan/getDataTingkatKecelakaan')?>";
    // Build the chart
    var timestamp_json = new Array();
    var accidentlevel_json = new Array();   
    $.getJSON(url, function(data) {
                    // Populate series
                    for (i = 0; i < data.length; i++){
                        timestamp_json.push([data[i].tmonth]);
                        accidentlevel_json.push([parseInt(data[i].accident_level)]);
                    }
                 
                    // draw chart
                    $('#GrafikTingkatKecelakaan').highcharts({
                        chart: {
                            zoomType: 'xy'
                        },
                        credits:{enabled:false},
                        title: {
                            text: 'Lalin dan Pendapatan Tahunan'
                        },
                        xAxis: [{
                            categories: timestamp_json, // FILL THIS
                            crosshair: true
                        }],
                        yAxis: [{ // Primary yAxis
                            labels: {
                                format: '{value:,.0f}',
                                style: {
                                    color: Highcharts.getOptions().colors[0]
                                }
                            },
                            title: {
                                text: 'Lalin',
                                style: {
                                    color: Highcharts.getOptions().colors[0]
                                }
                            },
                            floor:0
                        }],
                        tooltip: {
                            shared: true
                        },
                        plotOptions: {
                            column: {
                                stacking: 'normal',
                                dataLabels: {
                                    enabled: false,
                                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
                                }
                            }
                        }, 
                        series: [
                                    {
                                         name: 'Lalin. Total',
                                         yAxis: 0,
                                         type: 'column',
                                         data: accidentlevel_json, // FILL THIS
                                         lineWidth: 0,
                                         tooltip: {}
                                    }


                                ]
                    }); 
                });          

}
 
$(document).ready(function() {
    handle_grafikTingkatKecelakaan();
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