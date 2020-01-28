 <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <?php 
                    if($isi) {
                      $this->load->view($isi);
                    } 
                    ?>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->

                </div>
            </div>
            <!-- ============================================================== -->
            <!-- END OF WRAPPER KONTEN -->
            <!-- ============================================================== -->    
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                           Copyright © 2019 Concept. All rights reserved. Dashboard by <a href="#">MassHaris</a>.
                       </div>
                   </div>
               </div>
           </div>
           <!-- ============================================================== -->
           <!-- end footer -->
           <!-- ============================================================== -->
       </div>
       <!-- ============================================================== -->
       <!-- end wrapper  -->
       <!-- ============================================================== -->
   </div>
   <!-- ============================================================== -->
   <!-- end main wrapper  -->
   <!-- ============================================================== -->
   <!-- Optional JavaScript -->
   <!-- jquery 3.3.1 -->
   <script src="<?php echo base_url('assets_warga/vendor/jquery/jquery-3.3.1.min.js') ?>"></script>
   <!-- bootstap bundle js -->
   <script src="<?php echo base_url('assets_warga/vendor/bootstrap/js/bootstrap.bundle.js') ?>"></script>
   <!-- slimscroll js -->
   <script src="<?php echo base_url('assets_warga/vendor/slimscroll/jquery.slimscroll.js') ?>"></script>
   <!-- main js -->
   <script src="<?php echo base_url('assets_warga/libs/js/main-js.js') ?>"></script>
   <!-- chart chartist js -->
   <script src="<?php echo base_url('assets_warga/vendor/charts/chartist-bundle/chartist.min.js') ?>"></script>
   <!-- sparkline js -->
   <script src="<?php echo base_url('assets_warga/vendor/charts/sparkline/jquery.sparkline.js') ?>"></script>
   <!-- morris js -->
   <script src="<?php echo base_url('assets_warga/vendor/charts/morris-bundle/raphael.min.js') ?>"></script>
   <script src="<?php echo base_url('assets_warga/vendor/charts/morris-bundle/morris.js') ?>"></script>
   <!-- chart c3 js -->
   <script src="<?php echo base_url('assets_warga/vendor/charts/c3charts/c3.min.js') ?>"></script>
   <script src="<?php echo base_url('assets_warga/vendor/charts/c3charts/d3-5.4.0.min.js') ?>"></script>
   <script src="<?php echo base_url('assets_warga/vendor/charts/c3charts/C3chartjs.js') ?>"></script>
   <script src="<?php echo base_url('assets_warga/libs/js/dashboard-ecommerce.js') ?>"></script>
</body>

</html>