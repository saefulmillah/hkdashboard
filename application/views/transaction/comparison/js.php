<script src="<?=base_url('assets/js/highcharts.js')?>"></script>
<script type="text/javascript">
 
var table;
var handle_lalinAntarGerbang = function () {
    var url = "<?=site_url('transaction/comparison/getDataLalinAntarGerbang')?>";
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
                            type: 'pie'
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
                                    enabled: false
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

var handle_pendapatanAntarGerbang = function () {
    var url = "<?=site_url('transaction/comparison/getDataPendapatanAntarGerbang')?>";
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
                                    enabled: false
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

var handle_comparisonMethodPayment = function () {
    var url = "<?=site_url('transaction/comparison/getComparisonMethodPayment')?>";
    // Build the chart
    var processed_json = new Array();   
    $.getJSON(url, function(data) {
        // Populate series
        for (i = 0; i < data.length; i++){
            processed_json.push([parseInt(data[i].tunai), parseInt(data[i].non_tunai)]);
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
                        enabled: false
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
    var url = "<?=site_url('transaction/comparison/getNotranALRperGerbang')?>";
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
                        enabled: false
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
    var url = "<?=site_url('transaction/comparison/getNotranLSBperGerbang')?>";
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
                        enabled: false
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

var handle_LalinAntarGolongan = function () {
    var url = "<?=site_url('transaction/comparison/getLalinPerGolongan')?>";
    // Build the chart
    var processed_json = new Array();   
    $.getJSON(url, function(data) {
        // Populate series
        for (i = 0; i < data.length; i++){
            processed_json.push([data[i].Gerbang, parseInt(data[i].total_lalin)]);
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
                        enabled: false
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