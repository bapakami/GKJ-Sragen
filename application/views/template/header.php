<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SI Jemaat Klasis GKJ GunungKidul</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/logoGKJ.png">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap.min.css'; ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap-theme.min.css'; ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/font-awesome.min.css'; ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.css'; ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/datatables/responsive.dataTables.min.css'; ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css'; ?>">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/AdminLTE.min.css'; ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/skins/_all-skins.min.css'; ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/styles.css'; ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/js/dropify/dropify.min.css'; ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/plugins/toast/jquery.toast.min.css'; ?>" />
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

  <script src="<?php echo base_url() . 'assets/js/jquery-3.3.1.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/bootstrap.min.js'; ?>"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <script src="<?php echo base_url() . 'assets/plugins/datatables/jquery.dataTables.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.min.js'; ?>"></script>
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css'; ?>">
  <script>
    // for general purpose
    String.prototype.format = function() {
      var formatted = this;
      for (var i = 0; i < arguments.length; i++) {
        var regexp = new RegExp('\\{' + i + '\\}', 'gi');
        formatted = formatted.replace(regexp, arguments[i]);
      }
      return formatted;
    };
    base_url = "<?= base_url(); ?>"
  </script>
</head>

<body class="hold-transition skin-blue sidebar-mini wysihtml5-supported">
  <?php
  function tanggal_indo($tanggal)
  {
    $bulan = array(
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[(int) $split[1]] . ' ' . $split[0];
  }
  ?>
