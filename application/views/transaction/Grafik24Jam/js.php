<script src="<?=base_url('assets/js/highcharts.js')?>"></script>
<script type="text/javascript">
 
var table;
var handle_grafik24Jam = function () {
    var url = "<?=site_url('transaction/Grafik24Jam/getData24Jam')?>";
    // Build the chart
    var timestamp_json = new Array();
    var cashTraffic_json = new Array();   
    var nonCashTraffic_json = new Array();   
    var cashRevenue_json = new Array();   
    var nonCashRevenue_json = new Array();   
    $.getJSON(url, function(data) {
                    // Populate series
                    for (i = 0; i < data.length; i++){
                        timestamp_json.push([data[i].TIMESTAMP]);
                        nonCashTraffic_json.push([parseInt(data[i].non_cash_traffic)]);
                        cashTraffic_json.push([parseInt(data[i].cash_traffic)]);
                        nonCashRevenue_json.push([parseInt(data[i].non_cash_revenue)]);
                    }
                 
                    // draw chart
                    $('#Grafik24Jam').highcharts({
                        chart: {
                            type: 'bar',
                            // zoomType: 'xy'
                        },
                        title: {
                            text: 'Perbandingan Lalin Antar Gerbang (HARI INI)'
                        },
                        // tooltip: {
                        //     pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        // },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: false
                                },
                                showInLegend: true
                            }
                        },
                        xAxis: [{
                            categories: timestamp_json, // FILL THIS
                            crosshair: true
                        }],
                        series: [
                                    {
                                        name : 'Lalin Non Tunai',
                                        colorByPoint: true,
                                        data: nonCashTraffic_json
                                    },
                                    {
                                        name : 'Lalin Tunai',
                                        colorByPoint: true,
                                        data: cashTraffic_json
                                    },
                                    {
                                        name : 'Pdpt. Non Tunai',
                                        colorByPoint: true,
                                        data: nonCashRevenue_json
                                    },

                                ]
                    }); 
                });          

}
 
$(document).ready(function() {
    handle_grafik24Jam();
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