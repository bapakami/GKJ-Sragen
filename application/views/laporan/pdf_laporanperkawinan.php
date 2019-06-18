<table>
  <tr>
    <td><b><h2>Laporan Pekerjaan Jemaat</h2></b>
      <b><h2><?=$namagereja[0]->namagereja?></h2></b>
      <h5>Berdasar : <?= $berdasar ?></h5>
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
        <td style="font-size:12px;text-align: center;">Belum Menikah</td>
        <td style="font-size:12px;text-align: center;"><?= $data->BelumMenikah; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->BelumMenikah / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Duda</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Duda; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Duda / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Janda</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Janda; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Janda / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Menikah</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Menikah; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Menikah / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Single Parent</td>
        <td style="font-size:12px;text-align: center;"><?= $data->SingleParent; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->SingleParent / $JumlahJemaat) * 100,2); ?>%</td>
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
            <th style="background-color: blue;font-size:12px;">Status Nikah</th>
            <th style="background-color: blue;font-size:12px;">Tata Cara Nikah</th>
            <th style="background-color: blue;font-size:12px;">Tanggal Nikah</th> 
            <th style="background-color: blue;font-size:12px;">Jumlah Anak</th>           
            <th style="background-color: blue;font-size:12px;">Asal Gereja</th>
                      
                          
      </tr>
      <?php $i=1; foreach ($isi as $data) { ?>
      <tr>
          
           <td style="font-size:10px;"><?= $data->NamaLengkap?></td>
           <td style="font-size:10px;"><?= $data->status_perkawinan ?></td>
           <td style="font-size:10px;"><?= $data->tatacara_nikah?></td>
           <td style="font-size:10px;"><?= $data->tgl_nikah ?></td>
           <td style="font-size:10px;"><?= $data->jumlah_anak ?></td>
            <td style="font-size:10px;"><?= $data->namagereja ?></td>
                                
      </tr>
     <?php $i++; } ?>
</table>
