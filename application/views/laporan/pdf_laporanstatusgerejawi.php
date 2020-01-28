<table>
  <tr>
    <td><b><h2>Laporan Gerejawi</h2></b>
      <b><h2><?=$namagereja[0]->namagereja?></h2></b>
      <h5> Berdasar : <?= $berdasarWarga ?> </h5>
      <h5> Berdasar Status : <?= $berdasarStatus ?> </h5>
    </td>
  </tr>
</table>
<br>
<table border="1" style="border-collapse: collapse;width: 100%;">
      <tr>
            <th style="background-color: blue;font-size:12px;">Nama Lengkap</th>
            <th style="background-color: blue;font-size:12px;">Jenis Kelamin</th>
            <th style="background-color: blue;font-size:12px;">Alamat Tinggal</th>
            <th style="background-color: blue;font-size:12px;">Tanggal Baptis</th>
            <th style="background-color: blue;font-size:12px;">Tangal Sidhi</th> 
            <th style="background-color: blue;font-size:12px;">Status Warga</th>        
            <th style="background-color: blue;font-size:12px;">Asal gereja</th>                     
                          
      </tr>
      <?php $i=1; foreach ($isi as $data) { ?>
      <tr>
          
           <td style="font-size:10px;"><?= $data->NamaLengkap?></td>
           <td style="font-size:10px;"><?= $data->gender ?></td>
           <td style="font-size:10px;"><?= $data->alamat ?></td>
           <td style="font-size:10px;"><?= $data->tgl_baptis ?></td>
           <td style="font-size:10px;"><?= $data->tgl_sidhi ?></td>
           <td style="font-size:10px;"><?= $data->status_warga ?></td>
           <td style="font-size:10px;"><?= $data->namagereja ?></td>
                                
      </tr>
     <?php $i++; } ?>
</table>
