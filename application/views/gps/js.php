<script type="text/javascript">
    // submit the form into iframe for login into remote site
    // document.getElementById('myForm').submit();

    // once you're logged in, change the source url (if needed)
    var iframe = document.getElementById('mygps');
    // iframe.onload = function() {
    //     iframe.src = "http://mygps.co.id";
    // }
    // $('#mygps').src('http://google.com');
    // document.getElementById('myForm').submit();	

    // if ($('#myForm').submit()) {
    // 	$("#mygps").attr("src", "http://mygps.co.id");
    // }
    // $('#mygps').on('load', function () {
    // });

    $(document).ready(function() {
	    $("#wrapper").removeClass("toggled");
	    $('#hk-navbar').toggleClass("d-none");
	     if ($('#myForm').submit()) {
	     	$("#mygps").attr("src", "http://mygps.co.id");
	     }
	});
</script>