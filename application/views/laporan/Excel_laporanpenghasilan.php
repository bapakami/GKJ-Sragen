<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$Laporan_Penghasilan.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" style="border-collapse: collapse;width: 100%;">
      <tr>
            <th style="background-color: blue;font-size:12px;">Nama Lengkap</th>
            <th style="background-color: blue;font-size:12px;">Gender</th>
            <th style="background-color: blue;font-size:12px;">Pendidikan Akhir</th>
            <th style="background-color: blue;font-size:12px;">Pekerjaan</th>         
            <th style="background-color: blue;font-size:12px;">Alamat Tinggal</th>
            <th style="background-color: blue;font-size:12px;">Asal Gereja</th>
                      
                          
      </tr>
      <?php $i=1; foreach ($isi as $data) { ?>
      <tr>
          
           <td style="font-size:10px;"><?= $data->NamaLengkap?></td>
           <td style="font-size:10px;"><?= $data->gender ?></td>
           <td style="font-size:10px;"><?= $data->pendidikan?></td>
           <td style="font-size:10px;"><?= $data->pekerjaan ?></td>
           <td style="font-size:10px;"><?= $data->alamat ?></td>
           <td style="font-size:10px;"><?= $data->namagereja ?></td>
                                
      </tr>
     <?php $i++; } ?>
</table>