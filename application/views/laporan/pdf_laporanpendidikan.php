<table>
  <tr>
    <td><b><h2>Laporan Pendidikan Jemaat</h2></b>
      <b><h2><?=$namagereja[0]->namagereja?></h2></b>
      <b><h5>Berdasar : <?=$berdasar?></h5></b>
    </td>
  </tr>
</table>
<br>
<h4>Tabel Statistik : </h4>
<table border="1" style="border-collapse: collapse;width: 100%;">
      <tr>
        <th style="background-color: blue;font-size:12px;">Pendidikan</th>
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
        <td style="font-size:12px;text-align: center;">SD</td>
        <td style="font-size:12px;text-align: center;"><?= $data->SD; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->SD / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">SMP</td>
        <td style="font-size:12px;text-align: center;"><?= $data->SMP; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->SMP / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">SMA</td>
        <td style="font-size:12px;text-align: center;"><?= $data->SMA; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->SMA / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">D1</td>
        <td style="font-size:12px;text-align: center;"><?= $data->D1; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->D1 / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">D2</td>
        <td style="font-size:12px;text-align: center;"><?= $data->D2; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->D2 / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">D3</td>
        <td style="font-size:12px;text-align: center;"><?= $data->D3; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->D3 / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">D4</td>
        <td style="font-size:12px;text-align: center;"><?= $data->D4; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->D4 / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Sarjana</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Sarjana; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Sarjana / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">S2</td>
        <td style="font-size:12px;text-align: center;"><?= $data->S2; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->S2 / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">S3</td>
        <td style="font-size:12px;text-align: center;"><?= $data->S3; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->S3 / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Tidak Sekolah</td>
        <td style="font-size:12px;text-align: center;"><?= $data->TidakSekolah; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->TidakSekolah / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Lain - Lain</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Lainlain; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Lainlain / $JumlahJemaat) * 100,2); ?>%</td>
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
            <th style="background-color: blue;font-size:12px;">Tanggal Lahir</th>
            <th style="background-color: blue;font-size:12px;">Gender</th>
            <th style="background-color: blue;font-size:12px;">Alamat</th>         
            <th style="background-color: blue;font-size:12px;">Telepon</th>
            <th style="background-color: blue;font-size:12px;">Pendidikan</th>
            <th style="background-color: blue;font-size:12px;">Asal Gereja</th>
                      
                          
      </tr>
      <?php $i=1; foreach ($isi as $data) { ?>
      <tr>
          
           <td style="font-size:10px;"><?= $data->NamaLengkap?></td>
           <td style="font-size:10px;"><?= $data->tanggal_lahir ?></td>
           <td style="font-size:10px;"><?= $data->jenis_kelamin?></td>
           <td style="font-size:10px;"><?= $data->alamat ?></td>
           <td style="font-size:10px;"><?= $data->telepon ?></td>
           <td style="font-size:10px;"><?= $data->pendidikan ?></td>
           <td style="font-size:10px;"><?= $data->namagereja ?></td>
                                
      </tr>
     <?php $i++; } ?>
</table>
