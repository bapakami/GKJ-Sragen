<?php
$foto = $jemaat['foto'];
if ($foto == '' || $foto == null) {
	if ($jemaat['jenis_kelamin'] == 'Perempuan') {
		$fotox = base_url() . 'assets/img/avatar2.png';
	} else {
		$fotox = base_url() . 'assets/img/avatar5.png';
	}
} else {
	$fotox = base_url($jemaat['foto']);
}

$today = new DateTime();
$lahir = new DateTime($jemaat['tgl_lahir']);
$diff = $today->diff($lahir);
?>

<div class="row">
	<form id="xyz">		
		<?php if ($this->session->flashdata('status') == 'gagal') { ?>
			<div role="alert" class="alert alert-danger alert-dismissible fade-in wrap-input100">
				<button aria-label="Close" data-dismiss="alert" class="close text-right" type="button">
					<span aria-hidden="true" class="fa fa-times"></span>
				</button>
				<?php echo $this->session->flashdata('message'); ?>
			</div>
		<?php } ?>
		<div class="col-md-3">
			<label>Foto Profil</label>
			<input onchange="simpanFoto('foto')" type="file" id="foto" class="dropify" <?php if ($data['foto'] != '' || $data['foto'] != null) { ?> data-default-file="<?= base_url($data['foto']) ?>" <?php } else { ?> data-default-file="<?= $fotox ?>" <?php } ?>/><br>			
		</div>
		<div class="col-md-5">
			<h5>Manage Data Diri</h5><hr/>
			<div class="form-group">
				<label>Nama Lengkap</label>
				<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $data['fullname']?>">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<input type="text" name="alamat" class="form-control" placeholder="Alamat Lengkap" value="<?= $data['alamat_tinggal']?>">
			</div>
			<div class="row">
				<div class="form-group col-md-6">
					<label>Tempat Lahir</label>
					<input type="text" name="tempat" class="form-control" placeholder="Tempat Lahir" value="<?= $data['tempat_lahir']?>">
				</div>
				<div class="form-group col-md-6">
					<label>Tanggal Lahir</label>
					<input type="text" name="tanggal" class="form-control tanggal" placeholder="Tanggal Lahir" value="<?= date('d-m-Y', strtotime($data['tgl_lahir'])) ?>">
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<h5>Manage Password</h5><hr/>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" id="password" class="form-control password" placeholder="Password" value="<?= $data['fullname']?>">
			</div>
			<div class="form-group">
				<label>Konfirmasi Password</label>
				<input type="password" name="konPass" class="form-control password" placeholder="Konfirmasi Password"><br>
				<small>Jika tidak ingin mengganti password kosongkan kolom password dan konfirmasi password</small>
			</div><br>
			<div class="container-login100-form-btn" id="lihatkan">
				<div class="col-md-1">
					<input type="checkbox" id="lihat">
				</div>
				<div class="col-md-8">
					<label for="lihat" id="okelah"></label>
				</div>
			</div>
			<button class="btn btn-sm btn-success pull-right" type="submit">Simpan</button>
		</div>
	</form>
</div>

<script>
	function simpanFoto(nm) {
		var fd = new FormData();
		var files = $('#' + nm)[0].files[0];
		fd.append('file', files);
		fd.append('jenis', nm);

		$.ajax({
			url: '<?= site_url("warga/jemaat/asyncrx") ?>',
			type: 'post',
			data: fd,
			dataType: "json",
			contentType: false,
			processData: false,
			success: function(response) {
				if (response.status == 'sukses') {
					toastr.success(response.message);
				} else {
					toastr.error(response.message);
				}
			},
		});
	}

	function fileValidation(){
		var fileInput = document.getElementById('file');
		var filePath = fileInput.value;
		var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
		if(!allowedExtensions.exec(filePath)){
			alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
			fileInput.value = '';
			return false;
		}else{
			if (fileInput.files && fileInput.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'" id="fotoUser" width="200"/>';
				};
				reader.readAsDataURL(fileInput.files[0]);
			}
		}
	}

	$(document).ready(function() {	
		$('html, body').animate({scrollTop:0}, 'slow');
		$('.tanggal').datepicker({
			format: "dd-mm-yyyy",
			autoclose:true
		});	

		$('.dropify').dropify();
		// $("#xyz input").prop("disabled", true);

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

		toastr.options = {
			"closeButton": true,
			"debug": false,
			"newestOnTop": false,
			"progressBar": false,
			"positionClass": "toast-bottom-right",
			"preventDuplicates": true,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		};
	});

	$('#xyz').on('submit', (function(e) {
		e.preventDefault();
		$.ajax({
			url: '<?= site_url("warga/jemaat/ubahDataProfile") ?>',
			type: 'POST',
			data: new FormData(this),
			dataType: 'json',
			contentType: false,
			cache: false,
			processData: false,
			success: function(respon) {
				if (respon.s == 'sukses') {
					toastr.success(respon.m);
					setTimeout(function() {
						window.location.reload();
					}, 1100);
				} else {
					toastr.error(respon.m);
				}
			}
		});
	}));	
</script>
