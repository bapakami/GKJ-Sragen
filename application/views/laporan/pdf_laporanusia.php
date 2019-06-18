<table>
  <tr>
    <td><b><h2>Laporan Usia Jemaat</h2></b>
      <b><h2><?=$namagereja[0]->namagereja?></h2></b>
      <h5>Usia : <?= $berdasarUsia ?> </h5>
      <h5>Status : <?= $berdasarStatus ?> </h5>
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
        <th style="background-color: blue;font-size:12px;">Usia</th>
        <th style="background-color: blue;font-size:12px;">Jumlah Jemaat</th>
        <th style="background-color: blue;font-size:12px;">Persentase</th>
      </tr>
     
      <tr>
        <td style="font-size:12px;text-align: center;">Anak (Kurang 12 th) </td>
        <td style="font-size:12px;text-align: center;"><?= $data->Kurang12; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Kurang12 / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
       <tr>
        <td style="font-size:12px;text-align: center;">Remaja (13-17 th)</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Remaja; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Remaja / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
       <tr>
        <td style="font-size:12px;text-align: center;">Pemuda (18-25 th)</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Pemuda; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Pemuda / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
       <tr>
        <td style="font-size:12px;text-align: center;">Dewasa Muda/Keluarga Muda (26-40 th)</td>
        <td style="font-size:12px;text-align: center;"><?= $data->DewasaMuda; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->DewasaMuda / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
       <tr>
        <td style="font-size:12px;text-align: center;">Dewasa (41-60 th)</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Dewasa; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Dewasa / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Adiyuswa (>60 th)</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Adiyuswa; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Adiyuswa / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;"><b>Total</b></td>
        <td style="font-size:12px;text-align: center;"><b><?= $data->JumlahJemaat ?> Jemaat</b></td>
        <td style="font-size:12px;text-align: center;"><b><?= $Persentase?>%</b></td>
      </tr>
     
</table>
<br><br>
<table border="1" style="border-collapse: collapse;width: 100%;">
      <tr>
        <th style="background-color: blue;font-size:12px;">Status Pernikahan</th>
        <th style="background-color: blue;font-size:12px;">Jumlah Jemaat</th>
        <th style="background-color: blue;font-size:12px;">Persentase</th>
      </tr>
     
      <tr>
        <td style="font-size:12px;text-align: center;">Menikah</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Menikah; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Menikah / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Belum Menikah</td>
        <td style="font-size:12px;text-align: center;"><?= $data->BelumMenikah ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->BelumMenikah / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Janda</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Janda; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Janda / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Duda</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Duda; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Duda / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Single Parent</td>
        <td style="font-size:12px;text-align: center;"><?= $data->SingleParent; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->SingleParent / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;"><b>Total</b></td>
        <td style="font-size:12px;text-align: center;"><b><?= $data->JumlahJemaat ?> Jemaat</b></td>
        <td style="font-size:12px;text-align: center;"><b>100%</b></td>
      </tr>
     
</table>

<br><br>
<?php $i++; } ?>
<h4>Tabel Jemaat : </h4>
<table border="1" style="border-collapse: collapse;width: 100%;">
      <tr>
            <th style="background-color: blue;font-size:12px;">Nama Lengkap</th>
            <th style="background-color: blue;font-size:12px;">Jenis Kelamin</th>
            <th style="background-color: blue;font-size:12px;">Usia</th>
            <th style="background-color: blue;font-size:12px;">Status</th>
            <th style="background-color: blue;font-size:12px;">Alamat Tinggal</th>         
            <th style="background-color: blue;font-size:12px;">Asal Gereja</th>
                      
                          
      </tr>
      <?php $i=1; foreach ($isi as $data) { ?>
      <tr>
          
           <td style="font-size:10px;"><?= $data->NamaLengkap?></td>
           <td style="font-size:10px;"><?= $data->gender ?></td>
           <td style="font-size:10px;"><?= $data->usia?></td>
           <td style="font-size:10px;"><?= $data->status_perkawinan ?></td>
           <td style="font-size:10px;"><?= $data->alamat ?></td>
           <td style="font-size:10px;"><?= $data->namagereja ?></td>
                                
      </tr>
     <?php $i++; } ?>
</table>
