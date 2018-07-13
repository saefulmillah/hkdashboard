    </div>
    <!-- /#page-content-wrapper -->
	</div>
    <!-- /#wrapper -->
    <!-- Bootstrap core JavaScript -->
    <script src="<?=base_url('assets/js/jquery.min.js')?>"></script>
    <script src="<?=base_url('assets/js/highcharts.js')?>"></script>
    <script src="<?=base_url('assets/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?=base_url('assets/js/dataTables.bootstrap4.min.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.bundle.min.js')?>"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        $('#menu-toggle').toggleClass('rotated');
    });
    </script>

</body>

</html>