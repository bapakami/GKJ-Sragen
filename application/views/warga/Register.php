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
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(assets/aset/images/gereja.png);">
					<span class="login100-form-title-1">
						Register <br>
						<h5> GKJ Klasis Gunung Kidul</h>
					</span>
				</div>
				<form class="login100-form validate-form" onsubmit="return validateForm()" action="<?php echo base_url('warga/C_Warga/register') ?>" method="post" enctype="multipart/form-data" role="form">
					<?php if ($this->session->flashdata('status') == 'sukses') { ?>
						<div role="alert" class="alert alert-success alert-dismissible fade-in wrap-input100">
							<button aria-label="Close" data-dismiss="alert" class="close text-right" type="button">
								<span aria-hidden="true" class="fa fa-times"></span>
							</button>
							<?php echo $this->session->flashdata('message'); ?>
						</div>
					<?php } ?>


					<div class="wrap-input100 validate-input m-b-26" data-validate="Nama Perlu Diisi">
						<span class="label-input100">Nama</span>
						<input class="input100" type="text" id="nama" name="nama" placeholder="Masukkan Nama Lengkap">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Isikan NIK Terlebih dahulu">
						<span class="label-input100">NIK</span>
						<input class="input100" type="text" id="nik" name="nik" placeholder="Isikan NIK">
						<span class="focus-input100"></span>
					</div>

					<!-- <div class="wrap-input100 validate-input m-b-18" data-validate="Isikan Username Terlebih dahulu">
						<span class="label-input100">Username</span>
						<input class="input100" type="username" id="username" name="username" placeholder="Isikan Username">
						<span class="focus-input100"></span>
					</div> -->
					<br>

					<div class="wrap-input100 validate-input m-b-18" data-validate="Isikan Email Terlebih dahulu">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" id="email" name="email" placeholder="Isikan Email">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate="Isikan Password Terlebih dahulu">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" id="password" name="password" placeholder="Isikan password">
						<span class="focus-input100"></span>
					</div>
					<br>
					<?php echo $this->session->flashdata('msg'); ?>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" value="Login">
							Register
						</button>
						<a href="<?php echo base_url('warga/C_Warga/login') ?>" style="margin-left: 3em" class="login100-form-btn">Login</a>
					</div>
				</form>
			</div>
		</div>
	</div>

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