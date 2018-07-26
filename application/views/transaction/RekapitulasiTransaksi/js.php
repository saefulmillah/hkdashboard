<script type="text/javascript">
 
var table;

var handle_datatables = function () {
    //datatables
    table = $('#table').DataTable({ 

        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // converting to interger to find total
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,.]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // computing column Total of the complete result 
            var TotalLalin = api
                .column(2)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            
            var TotalRupiah = api
                .column(3)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

                
            // Update footer by showing the total with the reference of the column index 
        $( api.column( 0 ).footer() ).html('Total');
            $( api.column( 2 ).footer() ).html(TotalLalin);
            $( api.column( 3 ).footer() ).html(TotalRupiah);
            
        },
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "paging" : false,
        "sDom": '<"top"i>rt<"bottom"lp><"clear">',
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Transaction/RekapitulasiTransaksi/getRekapitulasiTransaksi')?>",
            "type": "POST",
            "data": function ( data ) {
                data.start_date = $('#start_date').val();
            }
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });

    $('#search').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });
}
 
$(document).ready(function() {
    handle_datatables();
});
</script>