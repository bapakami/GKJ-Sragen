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
		<div class="col-md-6">
			<img src="<?= $fotox; ?>" alt="Foto User" id="fotoUser" width="200">
		</div>
		<div class="col-md-6">

		</div>
	</form>
</div>

<script>
	$(document).ready(function() {

	});
</script>
