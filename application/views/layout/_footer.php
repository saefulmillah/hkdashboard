    </div>
    <!-- /#page-content-wrapper -->
	</div>
    <!-- /#wrapper -->
    <!-- Bootstrap core JavaScript -->
    <script src="<?=base_url('assets/js/jquery.min.js')?>"></script>
    <script src="<?=base_url('assets/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?=base_url('assets/js/dataTables.bootstrap4.min.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.bundle.min.js')?>"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        $('#menu-toggle').toggleClass('rotated');
        $('#hk-navbar').removeClass("d-none");
    });

    $(".nav .parent li").on("click", function() {
      $(".nav .parent li").removeClass("active");
      $(this).addClass("active");
    });
    </script>

</body>

</html>