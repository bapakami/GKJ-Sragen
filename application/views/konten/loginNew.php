<!DOCTYPE html>
<html lang="en">
<head>
    <title>SI Jemaat Klasis GKJ GunungKidul </title> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/img/logoGKJ.png">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/aset/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/aset/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/aset/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/aset/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="assets/aset/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/aset/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/aset/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="assets/aset/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/aset/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/aset/css/main.css">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(assets/aset/images/gereja.png);">
                    <span class="login100-form-title-1">
                        Login <br> <h5> GKJ Klasis Gunung Kidul</h>
                    </span>
                </div>

                <form class="login100-form validate-form" onsubmit="return validateForm()" action="<?php echo base_url('Login/aksi_login')?>" method="post" enctype="multipart/form-data" role="form">
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">Username</span>
                        <input class="input100" type="text" id="username" name="username" placeholder="Enter username">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" id="password" name="password" placeholder="Enter password">
                        <span class="focus-input100"></span>
                    </div>
                    <br>
                    <?php echo $this->session->flashdata('msg');?>
                    <p id="captImg"><?php echo $captchaImg; ?></p>
                     <div class="wrap-input100 validate-input m-b-18" data-validate = "">
                        <a href="javascript:void(0);" class="refreshCaptcha" id="refreshCaptcha"><img src="<?php echo base_url().'assets/images/refresh.png'; ?>"/></a>
                        <input class="input100" type="text" name="captcha" value="" placeholder="Enter captcha">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit" value="Login">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
<!--===============================================================================================-->
    <script src="assets/aset/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="assets/aset/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="assets/aset/vendor/bootstrap/js/popper.js"></script>
    <script src="assets/aset/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="assets/aset/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="assets/aset/vendor/daterangepicker/moment.min.js"></script>
    <script src="assets/aset/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="assets/aset/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="assets/aset/js/main.js"></script>

</body>
</html>

<script type="text/javascript">
     $("#login-button").click(function(event){
         event.preventDefault();
     
     $('form').fadeOut(500);
     $('.wrapper').addClass('form-success');
});

     $('#refreshCaptcha').click(function(){
             $.get('<?php echo base_url().'Login/refresh'; ?>', function(data){
               $('#captImg').html(data);
             });
           });


$('#refreshCaptcha').click(function(){
        $.get('<?php echo base_url().'captcha/refresh'; ?>', function(data){
          $('#captImg').html(data);
        });
      });
</script>