<table align="center">
  <tr>
    <td><b><h2 style="text-align: center;">Laporan Penghasilan Jemaat</h2></b>
      <b><h2 style="text-align: center;"><?=$namagereja[0]->namagereja?></h2>
      <h3 style="text-align: center;">Penghasilan : <?= $getPenghasilan; ?></h5>
    </td>
  </tr>
</table>
<br>
<h4>Tabel Statistik : </h4>
<table border="1" style="border-collapse: collapse;width: 100%;">
      <tr>
        <th style="background-color: blue;font-size:12px;">Penghasilan</th>
        <th style="background-color: blue;font-size:12px;">Jumlah Jemaat</th>
        <th style="background-color: blue;font-size:12px;">Persentase</th>
      </tr>
      <?php $i=1; foreach ($statistik as $data) { 
        if($data->JumlahJemaat == 0 || is_null($data->JumlahJemaat)) 
            $JumlahJemaat = 1;
        else
            $JumlahJemaat = $data->JumlahJemaat;
        $Persentase = ($data->JumlahJemaat / $JumlahJemaat) * 100
      ?>
      <tr>
        <td style="font-size:12px;text-align: center;"><?= $kategoriPenghasilan; ?></td>
        <td style="font-size:12px;text-align: center;"><?= $data->JumlahJemaat; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= $Persentase; ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;"><b>Total</b></td>
        <td style="font-size:12px;text-align: center;"><b><?= $data->JumlahJemaat ?> Jemaat</b></td>
        <td style="font-size:12px;text-align: center;"><b><?= $Persentase?>%</b></td>
      </tr>
      <?php $i++; } ?>
</table>
<br><br>
<h4>Tabel Jemaat : </h4>
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
