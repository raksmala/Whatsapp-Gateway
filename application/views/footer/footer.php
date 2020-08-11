<!-- Footer -->
<footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Ela Admin
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="<?php echo base_url(); ?>assets/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap-4.1.3/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/jquery.matchHeight-min.js"></script>
    <script src="<?php echo base_url(); ?>assets/ElaAdmin-master/assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="<?php echo base_url(); ?>assets/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="<?php echo base_url(); ?>assets/chartist.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/chartist-plugin-legend.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/jquery.flot.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/jquery.flot.pie.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/jquery.flot.spline.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/fullcalendar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/ElaAdmin-master/assets/js/init/fullcalendar-init.js"></script>

    <!--Data Table-->
    <script src="<?php echo base_url(); ?>assets/ElaAdmin-master/assets/js/lib/data-table/datatables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/ElaAdmin-master/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/ElaAdmin-master/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/ElaAdmin-master/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/ElaAdmin-master/assets/js/lib/data-table/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/ElaAdmin-master/assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/ElaAdmin-master/assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/ElaAdmin-master/assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/ElaAdmin-master/assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/ElaAdmin-master/assets/js/init/datatables-init.js"></script>
    
    <script src="<?php echo base_url(); ?>assets/ElaAdmin-master/assets/js/lib/chosen/chosen.jquery.min.js"></script>

    <!--Local Stuff-->
    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
    </script>
    <script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>
</body>
</html>