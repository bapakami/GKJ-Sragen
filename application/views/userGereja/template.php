<?php 	
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Template_Jemaat.xls");
?>

<table border="1" style="margin: 0px; font-size:12px;">
	<thead>
		<th>No</th>
		<th>Nama Lengkap</th>
		<th>Email</th>
		<th>No Ktp</th>
		<th>No KK</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Jenis Kelamin</th>
		<th>Alamat di Ktp</th>
		<th>Alamat Tinggal Sekarang</th>
		<th>Nama Ayah</th>
		<th>Nama Ibu</th>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td>Yohanes Pembaptis</td>
			<td>yohanes@gmail.com</td>
			<td>3104381327843712</td>
			<td>5308482991038199</td>
			<td>Herodian Yudea</td>
			<td>24-06-1000</td>
			<td>Laki-laki</td>
			<td>Herodian Yudea</td>
			<td>Herodian Yudea</td>
			<td>Elisabet</td>
			<td>Zakharia</td>
		</tr>
		<?php for($i=2; $i<4; $i++) {?>
			<tr>
				<td><?= $i; ?></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>	
			</tr>
		<?php } ?>
	</tbody>
</table>
