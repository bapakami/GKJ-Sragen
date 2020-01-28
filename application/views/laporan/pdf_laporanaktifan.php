<table align="center">
  <tr>
    <td><b><h2 style="text-align: center;">Laporan Keaktifan Jemaat</h2></b>
      <b><h2 style="text-align: center;"><?=$namagereja[0]->namagereja?></h2>
    </td>
  </tr>
</table>
<br>
<table border="1" style="border-collapse: collapse;width: 100%;">
      <tr>
            <th style="background-color: blue;font-size:12px;">Nama Lengkap</th>
            <th style="background-color: blue;font-size:12px;">Asal Gereja</th>
            <th style="background-color: blue;font-size:12px;">Peran Gereja</th>
            <th style="background-color: blue;font-size:12px;">Lama Jabatan Majelis</th>        
            <th style="background-color: blue;font-size:12px;">Lama Pengurus Komisi</th>
            <th style="background-color: blue;font-size:12px;">Junlah kepanitiaan</th>
                      
                          
      </tr>
      <?php $i=1; foreach ($isi as $data) { ?>
      <tr>
          
           <td style="font-size:10px;"><?= $data->NamaLengkap?></td>
           <td style="font-size:10px;"><?= $data->namagereja ?></td>
           <td style="font-size:10px;"><?= $data->peran_gereja?></td>
           <td style="font-size:10px;"><?= $data->lama_jabatan_majelis ?> Bulan</td>
           <td style="font-size:10px;"><?= $data->lama_pengurus_komisi ?> Bulan</td>
           <td style="font-size:10px;"><?= $data->panitia_kegiatan ?></td>
                                
      </tr>
     <?php $i++; } ?>
</table>
