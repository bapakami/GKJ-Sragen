<table>
  <tr>
    <td><b><h2>Laporan Pekerjaan Jemaat</h2></b>
      <b><h2><?=$namagereja[0]->namagereja?></h2></b>
      <h5>Gender : <?= $berdasargender?></h5>
      <h5>Gol Darah : <?= $berdasardarah?></h5>
    </td>
  </tr>
</table>
<br>
<h4>Tabel Statistik : </h4>
<?php $i=1; foreach ($statistik as $data) {
        if($data->JumlahJemaat == 0 || is_null($data->JumlahJemaat)) 
            $JumlahJemaat = 1;
        else
            $JumlahJemaat = $data->JumlahJemaat;
        $Persentase = ($data->JumlahJemaat / $JumlahJemaat) * 100
?>
<table border="1" style="border-collapse: collapse;width: 100%;">
      <tr>
        <th style="background-color: blue;font-size:12px;">Jenis Kelamin</th>
        <th style="background-color: blue;font-size:12px;">Jumlah Jemaat</th>
        <th style="background-color: blue;font-size:12px;">Persentase</th>
      </tr>
     
      <tr>
        <td style="font-size:12px;text-align: center;">Laki - Laki</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Lakilaki; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Lakilaki / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
       <tr>
        <td style="font-size:12px;text-align: center;">Perempuan</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Perempuan; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Perempuan / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;"><b>Total</b></td>
        <td style="font-size:12px;text-align: center;"><b><?= $data->JumlahJemaat ?> Jemaat</b></td>
        <td style="font-size:12px;text-align: center;"><b><?= number_format($Persentase,2)?>%</b></td>
      </tr>
     
</table>
<br><br>
<table border="1" style="border-collapse: collapse;width: 100%;">
      <tr>
        <th style="background-color: blue;font-size:12px;">Golongan Darah</th>
        <th style="background-color: blue;font-size:12px;">Jumlah Jemaat</th>
        <th style="background-color: blue;font-size:12px;">Persentase</th>
      </tr>
     
      <tr>
        <td style="font-size:12px;text-align: center;">A</td>
        <td style="font-size:12px;text-align: center;"><?= $data->darah_A; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->darah_A / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">B</td>
        <td style="font-size:12px;text-align: center;"><?= $data->darah_B; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->darah_B / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">AB</td>
        <td style="font-size:12px;text-align: center;"><?= $data->darah_AB; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->darah_AB / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">O</td>
        <td style="font-size:12px;text-align: center;"><?= $data->darah_O; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->darah_O / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;"><b>Total</b></td>
        <td style="font-size:12px;text-align: center;"><b><?= $data->JumlahJemaat ?> Jemaat</b></td>
        <td style="font-size:12px;text-align: center;"><b><?= number_format($Persentase,2)?>%</b></td>
      </tr>
     
</table>

<br><br>
<?php $i++; } ?>
<h4>Tabel Jemaat : </h4>
<table border="1" style="border-collapse: collapse;width: 100%;">
      <tr>
            <th style="background-color: blue;font-size:12px;">Nama Lengkap</th>
            <th style="background-color: blue;font-size:12px;">Gender</th>
            <th style="background-color: blue;font-size:12px;">Gol Darah</th>
            <th style="background-color: blue;font-size:12px;">Alamat Tinggal</th>         
            <th style="background-color: blue;font-size:12px;">Asal Gereja</th>
                      
                          
      </tr>
      <?php $i=1; foreach ($isi as $data) { ?>
      <tr>
          
           <td style="font-size:10px;"><?= $data->NamaLengkap?></td>
           <td style="font-size:10px;"><?= $data->gender ?></td>
           <td style="font-size:10px;"><?= $data->gol_darah?></td>
           <td style="font-size:10px;"><?= $data->alamat ?></td>
           <td style="font-size:10px;"><?= $data->namagereja ?></td>
                                
      </tr>
     <?php $i++; } ?>
</table>
