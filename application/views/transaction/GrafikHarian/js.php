<script src="<?=base_url('assets/js/highcharts.js')?>"></script>
<script type="text/javascript">
 
var table;
var handle_search = function () {
    var str_url = "<?=site_url('Transaction/GrafikHarian/getDataHarian')?>";
    // $("#search").on('click', function (e) {
        // e.preventDefault();
        $.ajax({
            type: "POST",
            url: str_url,
            dataType: "json",
            data: $("#myForm").serialize(),
            success: function (data) {
                // console.log(data);
                handle_grafikHarian(data);
            }
        });
    // })
}
var handle_grafikHarian = function (data) {
    // Build the chart
    var timestamp_json = new Array();
    var cashTraffic_json = new Array();   
    var nonCashTraffic_json = new Array();   
    var cashRevenue_json = new Array();   
    var nonCashRevenue_json = new Array();
    var totalTraffic_json = new Array();
    var totalRevenue_json = new Array();   
    // Populate series
    for (i = 0; i < data.length; i++){
        timestamp_json.push([data[i].DAY]);
        nonCashTraffic_json.push([parseInt(data[i].non_cash_traffic)]);
        cashTraffic_json.push([parseInt(data[i].cash_traffic)]);
        nonCashRevenue_json.push([parseInt(data[i].non_cash_revenue)]);
        cashRevenue_json.push([parseInt(data[i].cash_revenue)]);   
        totalTraffic_json.push([parseInt(data[i].traffic)]);
        totalRevenue_json.push([parseInt(data[i].total_revenue)]);
    }
 
    // draw chart
    $('#GrafikHarian').highcharts({
        chart: {
            zoomType: 'xy'
        },
        credits:{enabled:false},
        title: {
            text: 'Lalin dan Pendapatan Harian'
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
        }, { // Secondary yAxis
            title: {
                text: 'Pendapatan',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            labels: {
                format: '{value:,.0f}',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            floor:0,
            opposite: true
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
                        name: 'Pdpt. Non-Tunai',
                        yAxis: 1,
                        type: 'column',
                        data: nonCashRevenue_json, // FILL THIS
                        tooltip: {}
                    },
                    {
                         name: 'Pdpt. Tunai',
                         yAxis: 1,
                         type: 'column',
                         data: cashRevenue_json, // FILL THIS
                         tooltip: {}
                    },
                    {
                        name : 'Lalin Non Tunai',
                        yAxis: 0,
                        type: 'spline',
                        data: nonCashTraffic_json,
                        tooltip: {}
                    },
                    {
                        name : 'Lalin Tunai',
                        yAxis: 0,
                        type: 'spline',
                        data: cashTraffic_json,
                        tooltip: {}
                    }, 
                    {
                         name: 'Pdpt. Total',
                         yAxis: 1,
                         type: 'line',
                         data: totalRevenue_json, // FILL THIS
                         lineWidth: 0,
                         tooltip: {}
                    },
                    {
                         name: 'Lalin. Total',
                         yAxis: 0,
                         type: 'line',
                         data: totalTraffic_json, // FILL THIS
                         lineWidth: 0,
                         tooltip: {}
                    }


                ]
    });      
}
 
$(document).ready(function() {
    handle_search();
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