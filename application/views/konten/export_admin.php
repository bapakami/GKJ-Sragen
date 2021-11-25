<?php 	
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data_Kematian_Jemaat.xls");
?>

<table border="1" style="width:100%;font-size:13px;">
	<thead>
		<tr style="font-weight: bold">
			<th style="width:38px;">#</th>
			<th>Nama</th>
			<th>No. KTP</th>
			<th>No. KK</th>
			<th>Usia</th>
			<th>Tempat, Tgl Lahir</th>
			<th>Gender</th>
			<th>Alamat</th>
			<th>No. Telp</th>
			<th>Buku Induk</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 0;
		foreach ($data->result_array() as $i) :
			$no++;
			$id = $i['id'];
			$nama = $i['nama_lengkap'];                                 
			if($i['NoKTPEncrypt'] != null)
			{
				$ktp = $this->encrypt->decode($i['NoKTPEncrypt']);
			} else
			{
				$ktp = $i['no_ktp'];
			}                                      
			$namaibu = $i['namaIbuEncrypt'];
			$NamaIbuDecrypt = $this->encrypt->decode($namaibu);                               
			$kk = $i['no_kk'];                                    
			$tempat_lahir = $i['tempat_lahir'];
			$tgl_lahir = $i['tgl_lahir'];
			$gender = $i['jenis_kelamin'];
			$alamat = $i['alamat_ktp'];
			$notelp = $i['telepon'];
			$buku_induk = $i['nmrbkinduk'];
			$usia = $i['usia'];
			?>
			<tr>
				<td style="text-align:left;width:38px;"><?php echo $no; ?></td>
				<td><?php echo $nama; ?></td>
				<td><?php echo $ktp; ?></td>
				<td><?php echo $kk; ?></td>
				<td><?php echo $usia; ?></td>
				<td><?php echo $tempat_lahir; ?>, <?= tanggal_indo($tgl_lahir)?></td>
				<td><?php echo $gender; ?></td>
				<td><?php echo $alamat; ?></td>
				<td><?php echo $notelp; ?></td>
				<td><?php echo $buku_induk; ?></td>
			</tr>   
		<?php endforeach; ?>
	</tbody>
</table>
