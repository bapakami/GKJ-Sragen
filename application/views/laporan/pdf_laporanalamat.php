<table align="center">
  <tr>
    <td><b><h2 style="text-align: center;">Laporan Alamat</h2></b>
      <b><h2 style="text-align: center;"><?=$namagereja[0]->namagereja?></h2>
    </td>
  </tr>
</table>
<br>
<table border="1" style="border-collapse: collapse;width: 100%;">
      <tr>
            <th style="background-color: blue;font-size:12px;">Nama Lengkap</th>
            <th style="background-color: blue;font-size:12px;">Alamat Tinggal</th>
            <th style="background-color: blue;font-size:12px;">Alamat KTP</th>
            <th style="background-color: blue;font-size:12px;">Status Rumah Tinggal</th>         
            <th style="background-color: blue;font-size:12px;">Asal Gereja</th>                     
                          
      </tr>
      <?php $i=1; foreach ($isi as $data) { ?>
      <tr>
          
           <td style="font-size:10px;"><?= $data->NamaLengkap?></td>
           <td style="font-size:10px;"><?= $data->alamat ?></td>
           <td style="font-size:10px;"><?= $data->alamat_ktp?></td>
           <td style="font-size:10px;"><?= $data->status_rumah ?></td>
           <td style="font-size:10px;"><?= $data->namagereja ?></td>
                                
      </tr>
     <?php $i++; } ?>
</table>
