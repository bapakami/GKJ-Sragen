<table>
  <tr>
    <td><b><h2>Laporan Usia Jemaat</h2></b>
<!--       <b><h2><?=$namagereja[0]->namagereja?></h2></b> -->
<!--       <h5>Umur : 
      <?php 
      $lahir_start  =new DateTime($usia_start);
      $lahir_end    =new DateTime($usia_end);
      $today        =new DateTime();
      $umur = $today->diff($lahir_start);
      $umur_end = $today->diff($lahir_end);
    echo $umur->y; echo " Tahun Hingga "; echo $umur_end->y;
?></h5> -->
<h5> Tanggal Lahir : <?= $usia_start; ?> hingga <?= $usia_end; ?></h5>
      <h5>Status : <?= $berdasarStatus ?> </h5>
    </td>
  </tr>
</table>
<br>
 <h4>Tabel Statistik : </h4>
<!-- <?php $i=1; foreach ($statistik as $data) {
        if($data->jumlah == 0 || is_null($data->jumlah)) 
            $jumlah = 1;
        else
            $jumlah = $data->jumlah;
        $Persentase = ($data->jumlah / $jumlah) * 100
?> -->
<table border="1" style="border-collapse: collapse;width: 100%;">
      <tr>
        <td style="font-size:12px;text-align: center;"><b>Usia</b></td>
        <td style="font-size:12px;text-align: center;"><b>Jumlah Jemaat</b></td>
        <td style="font-size:12px;text-align: center;"><b>Presentase%</b></td>
      </tr>

      <?php $sum = 0; foreach ($statistik1 as $stat)  {  
         ?>
<tr>
  <td><?php echo $stat->range_umur; ?></td>
  <td><?php echo $stat->jumlah; ?></td>
  <td><?php echo  $stat->jumlah  ; ?></td>
</tr>
      <?php }?>
     
</table>
<br><br>
<!-- <table border="1" style="border-collapse: collapse;width: 100%;">
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
  -->