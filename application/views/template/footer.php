<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <!-- <b> user online</b>  -->
  </div>
  <strong> Copyright &copy; <a href=""> 2019 TI UKSW dan GKJ Klasis GunungKidul </strong></a>. All rights reserved.
</footer>
</div>

<aside class="control-sidebar control-sidebar-dark">
  <div class="tab-content">
    <div class="tab-pane" id="control-sidebar-home-tab">
    </div>
  </div>
</aside>


<script src="<?php echo base_url() . 'assets/js/popper.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/js/dropify/dropify.min.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/slimScroll/jquery.slimscroll.min.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/fastclick/fastclick.js'; ?>"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() . 'assets/js/lazysizes.min.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/js/app.min.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/js/demo.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/toast/jquery.toast.min.js'; ?>"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
<script src="<?php echo base_url() . 'assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'; ?>"></script>

<script>
  getDate();

  function getDate() {
    $('#datepicker').datepicker({
      format: 'yyyy-mm-dd',
      viewMode: 'years',
      autoclose: true,
      startDate: '-70y',
      endDate: '+y',
    }).on('changeDate', function(e) {
      $(this).datepicker('hide');
    });
  }

  getDateOther();

  function getDateOther() {
    $('#datepickerOther').datepicker({
      format: 'yyyy-mm-dd',
      viewMode: 'years',
      autoclose: true,
      startDate: '-70y',
      endDate: '+y',
    }).on('changeDate', function(e) {
      $(this).datepicker('hide');
    });
  }

  getDateSyukur();

  function getDateSyukur() {
    $('#datepickerSyukur').datepicker({
      format: 'yyyy-mm-dd',
      viewMode: 'years',
      autoclose: true,
      startDate: '-70y',
      endDate: '+1y',
    }).on('changeDate', function(e) {
      $(this).datepicker('hide');
    });
  }

  getDateSyukur_edit();

  function getDateSyukur_edit() {
    $('#datepickerSyukur_edit').datepicker({
      format: 'yyyy-mm-dd',
      viewMode: 'years',
      autoclose: true,
      startDate: '-70y',
      endDate: '+1y',
    }).on('changeDate', function(e) {
      $(this).datepicker('hide');
    });
  }
</script>

</body>

</html>
