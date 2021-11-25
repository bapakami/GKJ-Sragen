<table>
  <tr>
    <td><b><h2>Laporan Usia Jemaat</h2></b>
      <b><h2><?=$namagereja[0]->namagereja?></h2></b>
      <h5>Umur : <?= $berdasar ?></h5>
    </td>
  </tr>
</table>
<br>
<!-- <h4>Tabel Statistik : </h4>
<table border="1" style="border-collapse: collapse;width: 100%;">
      <tr>
        <td style="background-color: blue; font-size:12px;text-align: center;"><b>Usia</b></td>
        <td style="background-color: blue;font-size:12px;text-align: center;"><b>Jumlah Jemaat</b></td>
        <td style="background-color: blue;font-size:12px;text-align: center;"><b>Persentase (%)</b></td>
      </tr>
      <?php $i=1; foreach ($statistik as $data) {
        if($data->JumlahJemaat == 0 || is_null($data->JumlahJemaat)) 
            $JumlahJemaat = 1;
        else
            $JumlahJemaat = $data->JumlahJemaat;
        $Persentase = ($data->JumlahJemaat / $JumlahJemaat) * 100
        ?>
      <tr>
        <td style="font-size:12px;text-align: center;">12>th (dibawah 12 tahun)</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Anak; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Anak / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">13-17 th</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Remaja; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Remaja / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">18-25 th</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Dewasa; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Dewasa / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">41-60 th</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Tua; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Tua / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">60<</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Lansia; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Lansia / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;"><b>Total</b></td>
        <td style="font-size:12px;text-align: center;"><b><?= $data->JumlahJemaat ?> Jemaat</b></td>
        <td style="font-size:12px;text-align: center;"><b>100%</b></td>
      </tr>
     
</table> -->

<br><br>
<?php $i++; } ?>
<h4>Tabel Jemaat Berdasar Usia : </h4>
<table border="1" style="border-collapse: collapse;width: 100%;">
      <tr>
            <th style="background-color: blue;font-size:12px;">Nama Lengkap</th>
            <th style="background-color: blue;font-size:12px;">Jenis Kelamin</th>
            <th style="background-color: blue;font-size:12px;">Usia</th>
            <th style="background-color: blue;font-size:12px;">Alamat Tinggal</th>         
            <th style="background-color: blue;font-size:12px;">Asal Gereja</th>
                      
                          
      </tr>
      <?php $i=1; foreach ($isi as $data) { ?>
      <tr>
          
           <td style="font-size:10px;"><?= $data->NamaLengkap?></td>
           <td style="font-size:10px;"><?= $data->gender ?></td>
           <td style="font-size:10px;"><?= $data->usia?></td>
           <td style="font-size:10px;"><?= $data->alamat ?></td>
           <td style="font-size:10px;"><?= $data->namagereja ?></td>
                                
      </tr>
     <?php $i++; } ?>
</table>
 