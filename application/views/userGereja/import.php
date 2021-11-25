<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Manajemen Data Jemaat
			<small></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-briefcase"></i> Manajemen </a></li>
			<li class="active">Manajemen Data Jemaat </li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">Import Data Jemaat</div>
					<div class="box-body">
						<div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label style="color: red; font-size:20px;">Perhatian </label><br>
										<p>
											Untuk kemudahan dalam proses import data, jika anda ingin menggunakan template yang akan didownload dalam website
											pastikan anda melakukan proses save as "excel 97-2003 workbook" agar file tersimpan dan format .xls jika, anda ingin menggunakan file 
											yang sudah anda persiapkan sendiri, pastikan anda telah menyesuaikan urutan format data sesuai dengan susunan yang terdapat dalam template.  
										</p>
										<p style="color: red;">
											* Data Nama Lengkap dan No Ktp bersifat wajib 
										</p><br>
										<button type="button" class="btn btn-sm btn-success" id="mengerti">Saya Mengerti</button>
									</div>
									<div id="pilih">
									<form id="xyz" action="<?= site_url('AdminGereja/Jemaat/proses_import')?>" method="POST" enctype="multipart/form-data">
										<div class="form-group">
											<label>Template</label><br>
											<a href="<?= site_url('AdminGereja/Jemaat/template') ?>" role="button" class="btn btn-info">Donwload Template</a>
										</div>
										<div class="form-group">
											<label>Import</label>
											<input type="file" name="file" class="form-control">
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-sm btn-success">Import Data</button>
										</div>
									</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script>
	$(document).ready(function() {
		$('#pilih').hide();
		$('#mengerti').on('click', function() {
			$('#pilih').show();
		});
	});
</script>
