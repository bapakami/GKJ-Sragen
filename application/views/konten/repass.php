<form class="login100-form validate-form" id="resetPassword" method="POST" action="<?= site_url("warga/C_warga/proccReset") ?>" role="form">
    <div role="alert" class="alert alert-success alert-dismissible fade-in wrap-input100">
        <button aria-label="Close" data-dismiss="alert" class="close text-right" type="button">
            <span aria-hidden="true" class="fa fa-times"></span>
        </button>
        Isikan Email yang digunakan untuk melakukan proses daftar akun.
    </div>
    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
        <span class="label-input100">Email</span>
        <input class="input100" type="text" id="email" name="email" placeholder="Isikan Email">
        <span class="focus-input100"></span>
    </div>
    <div class="container-login100-form-btn">
        <button class="login100-form-btn" type="submit" value="Login">
            Kirim Email Verifikasi
        </button>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('#judul').text('Reset Password');
    });
</script>