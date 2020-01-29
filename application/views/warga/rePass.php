<!DOCTYPE html>
<html lang="en">

<head>
    <title>SI Jemaat Klasis GKJ GunungKidul </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/logoGKJ.png">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/aset/vendor/bootstrap/css/bootstrap.min.css') ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/aset/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/aset/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/aset/vendor/animate/animate.css') ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/aset/vendor/css-hamburgers/hamburgers.min.css') ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/aset/vendor/animsition/css/animsition.min.css') ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/aset/vendor/select2/select2.min.css') ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/aset/vendor/daterangepicker/daterangepicker.css') ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/aset/css/util.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/aset/css/main.css') ?>">
    <script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js') ?>"></script>
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(assets/aset/images/gereja.png);">
                    <span class="login100-form-title-1">
                        Reset Password <br>
                        <h5> GKJ Klasis Gunung Kidul</h>
                    </span>
                </div>
                <form class="login100-form validate-form" action="<?php echo base_url('warga/C_Warga/prossResetPassword') ?>" method="post" enctype="multipart/form-data" role="form">
                    <?php if ($this->session->flashdata('status') == 'gagal') { ?>
                        <div role="alert" class="alert alert-danger alert-dismissible fade-in wrap-input100">
                            <button aria-label="Close" data-dismiss="alert" class="close text-right" type="button">
                                <span aria-hidden="true" class="fa fa-times"></span>
                            </button>
                            <?php echo $this->session->flashdata('message'); ?>
                        </div>
                    <?php } ?>
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Kolom ini tidak boleh kosong">
                        <span class="label-input100">Password</span>
                        <input type="hidden" name="token" value="<?= $this->uri->segment(4) ?>">
                        <input class="input100 password" type="password" id="password" name="password" placeholder="Masukkan Password Baru">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-26" data-validate="Kolom ini tidak boleh kosong">
                        <span class="label-input100 ">Konfirmasi Password</span>
                        <input class="input100 password" type="password" id="konPass" name="konPass" placeholder="Konfirmasi Password">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="container-login100-form-btn" id="lihatkan">
                        <div class="col-md-1">
                            <input type="checkbox" id="lihat">
                        </div>
                        <div class="col-md-8">
                            <label for="lihat" id="okelah"></label>
                        </div>
                    </div><br><br>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" id="btnSubmit" type="submit" value="Login">
                            Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#okelah').text('Lihat Password');
            $('#lihatkan').click(function(e) {
                var element = document.getElementById('password').getAttribute('type');
                if (element == 'password') {
                    $('.password').removeAttr('type');
                    $('.password').attr('type', 'text');
                    $('#okelah').text('Sembunyikan Password');
                    e.preventDefault(e);
                } else {
                    $('.password').removeAttr('type');
                    $('.password').attr('type', 'password');
                    $('#okelah').text('Lihat Password');
                    e.preventDefault(e);
                }
            });
        });
    </script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url('assets/aset/vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url('assets/aset/vendor/animsition/js/animsition.min.js') ?>"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url('assets/aset/vendor/bootstrap/js/popper.js') ?>"></script>
    <script src="<?php echo base_url('assets/aset/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url('assets/aset/vendor/select2/select2.min.js') ?>"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url('assets/aset/vendor/daterangepicker/moment.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/aset/vendor/daterangepicker/daterangepicker.js') ?>"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url('assets/aset/vendor/countdowntime/countdowntime.js') ?>"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url('assets/aset/js/main.js') ?>"></script>

</body>

</html>