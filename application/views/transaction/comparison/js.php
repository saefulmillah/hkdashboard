<script src="<?=base_url('assets/js/highcharts.js')?>"></script>
<script type="text/javascript">
 
var handle_lalinAntarGerbang = function () {
    var url = "<?=site_url('Transaction/comparison/getDataLalinAntarGerbang')?>";
    // Build the chart
    var processed_json = new Array();   
    $.getJSON(url, function(data) {
                    // Populate series
                    for (i = 0; i < data.length; i++){
                        processed_json.push([data[i].Gerbang, parseInt(data[i].total_lalin)]);
                    }
                 
                    // draw chart
                    $('#lalinAntarGerbang').highcharts({
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie',
                        },
                        title: {
                            text: 'Perbandingan Lalin Antar Gerbang (HARI INI)'
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    format: '{point.y:,.0f}',
                                    style: {
                                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                    }
                                },
                                showInLegend: true,
                                
                            }
                        },
                        series: [{
                            name : 'Total',
                            colorByPoint: true,
                            data: processed_json
                        }]
                    }); 
                });          

}

var handle_pendapatanAntarGerbang = function () {
    var url = "<?=site_url('Transaction/comparison/getDataPendapatanAntarGerbang')?>";
    // Build the chart
    var processed_json = new Array();   
    $.getJSON(url, function(data) {
                    // Populate series
                    for (i = 0; i < data.length; i++){
                        processed_json.push([data[i].Gerbang, parseInt(data[i].total_rupiah)]);
                    }
                 
                    // draw chart
                    $('#pendapatanAntarGerbang').highcharts({
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie'
                        },
                        title: {
                            text: 'Perbandingan Pendapatan Antar Gerbang (HARI INI)'
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    format: '{point.y:,.0f}',
                                    style: {
                                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                    }
                                },
                                showInLegend: true,
                                point: {
                                    events: {
                                        click: function() {
                                            alert ('Category: '+ this.name +', value: '+ this.y);
                                        }
                                    }
                                }
                            }
                        },
                        series: [{
                            name : 'Total',
                            colorByPoint: true,
                            data: processed_json
                        }]
                    }); 
                });          

}

var handle_comparisonMethodPayment = function () {
    var url = "<?=site_url('Transaction/comparison/getComparisonMethodPayment')?>";
    // Build the chart
    var processed_json = new Array();   
    $.getJSON(url, function(data) {
        // Populate series
        for (i = 0; i < data.length; i++){
            processed_json.push(['Non-Tunai', parseInt(data[i].non_tunai)]);
            processed_json.push(['Tunai', parseInt(data[i].tunai)]);
        }
     
        // draw chart
        $('#ComparisonMethodPayment').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Perbandingan Tunai vs Non-Tunai (HARI INI)'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:,.0f}',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    },
                    showInLegend: true
                }
            },
            series: [{
                name : 'Total',
                colorByPoint: true,
                data: processed_json
            }]
        }); 
    });
}

var handle_NoTranALRantarGerbang = function () {
    var url = "<?=site_url('Transaction/comparison/getNotranALRperGerbang')?>";
    // Build the chart
    var processed_json = new Array();   
    $.getJSON(url, function(data) {
        // Populate series
        for (i = 0; i < data.length; i++){
            processed_json.push([data[i].gerbang, parseInt(data[i].sum_alr)]);
        }
     
        // draw chart
        $('#NoTranALRantarGerbang').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Perbandingan Notran ALR Antar Gerbang (HARI INI)'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:,.0f}',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    },
                    showInLegend: true
                }
            },
            series: [{
                name : 'Total',
                colorByPoint: true,
                data: processed_json
            }]
        }); 
    });
}

var handle_NoTranLSBantarGerbang = function () {
    var url = "<?=site_url('Transaction/comparison/getNotranLSBperGerbang')?>";
    // Build the chart
    var processed_json = new Array();   
    $.getJSON(url, function(data) {
        // Populate series
        for (i = 0; i < data.length; i++){
            processed_json.push([data[i].gerbang, parseInt(data[i].sum_lsb)]);
        }
     
        // draw chart
        $('#NoTranLSBantarGerbang').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Perbandingan Notran LSB Antar Gerbang (HARI INI)'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false,
                    },
                    showInLegend: true
                }
            },
            series: [{
                name : 'Total',
                colorByPoint: true,
                data: processed_json
            }]
        }, function(chart) { // on complete

            chart.renderer.text('No Data Available', 100, 160)
                .css({
                    color: '#4572A7',
                    fontSize: '1rem'
                })
                .add();

        }); 
    });
}

var handle_LalinAntarGolongan = function () {
    var url = "<?=site_url('Transaction/comparison/getLalinPerGolongan')?>";
    // Build the chart
    var processed_json = new Array();   
    $.getJSON(url, function(data) {
        // Populate series
        for (i = 0; i < data.length; i++){
            processed_json.push([data[i].golongan, parseInt(data[i].lalin)]);
        }
     
        // draw chart
        $('#lalinAntarGolongan').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Perbandingan Golongan Antar Golongan (HARI INI)'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:,.0f}',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    },
                    showInLegend: true
                }
            },
            series: [{
                name : 'Total',
                colorByPoint: true,
                data: processed_json
            }]
        }); 
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


 
$(document).ready(function() {
    handle_lalinAntarGerbang();
    handle_pendapatanAntarGerbang();
    handle_comparisonMethodPayment();
    handle_NoTranALRantarGerbang();
    handle_NoTranLSBantarGerbang();
    handle_LalinAntarGolongan();
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