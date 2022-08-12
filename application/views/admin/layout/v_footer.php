<!-- footer content -->
<footer>
          <div class="pull-right">
            Copyright © 2022 by TI Poliban 2019
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url()?>template/back-end/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="<?= base_url()?>template/back-end/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url()?>template/back-end/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?= base_url()?>template/back-end/vendors/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="<?= base_url()?>template/back-end/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

    <script src="<?= base_url()?>datepicker/js/bootstrap-modal.js"></script>
    <script src="<?= base_url()?>datepicker/js/bootstrap-transition.js"></script>
    <script src="<?= base_url()?>datepicker/js/bootstrap-datepicker.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?= base_url()?>template/back-end/build/js/custom.min.js"></script>

    <!-- iCheck -->
    <script src="<?= base_url()?>template/back-end/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="<?= base_url()?>template/back-end/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url()?>template/back-end/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url()?>template/back-end/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url()?>template/back-end/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?= base_url()?>template/back-end/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?= base_url()?>template/back-end/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url()?>template/back-end/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url()?>template/back-end/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?= base_url()?>template/back-end/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?= base_url()?>template/back-end/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url()?>template/back-end/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?= base_url()?>template/back-end/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?= base_url()?>template/back-end/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?= base_url()?>template/back-end/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?= base_url()?>template/back-end/vendors/pdfmake/build/vfs_fonts.js"></script>
    
    <script>
		$(function(){
		    $("#tanggal").datepicker({
			format:'yyyy/mm/dd'
		    });
                });
	    </script>
    
    <script>
	initSample();

  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
   
  </body>
</html>