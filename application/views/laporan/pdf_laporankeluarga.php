<table>
  <tr> 
    <td><b><h2>Laporan Keluarga</h2></b>
      <b><h2><?=$namagereja[0]->namagereja?></h2></b>
      <h5>Status : <?= $berdasarStatus?></h5>
      <h5>Gender : <?= $berdasarGender?></h5>
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
        <th style="background-color: blue;font-size:12px;">Status Keluarga</th>
        <th style="background-color: blue;font-size:12px;">Jumlah Jemaat</th>
        <th style="background-color: blue;font-size:12px;">Persentase</th>
      </tr>
     
      <tr>
        <td style="font-size:12px;text-align: center;">Anak</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Anak; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Anak / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Cucu</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Cucu; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Cucu / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Istri</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Istri; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Istri / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Kakek / Nenek</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Kakek; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Kakek / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Kepala Keluarga</td>
        <td style="font-size:12px;text-align: center;"><?= $data->KepalaKeluarga; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->KepalaKeluarga / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Menantu</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Menantu; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Menantu / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Numpang</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Numpang; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Numpang / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Saudara</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Saudara; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Saudara / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Lain- lain</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Lainlain; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Lainlain / $JumlahJemaat) * 100,2); ?>%</td>
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
            <th style="background-color: blue;font-size:12px;">Nama Ayah</th>
            <th style="background-color: blue;font-size:12px;">Nama Ibu</th>
            
            <th style="background-color: blue;font-size:12px;">Status Keluarga</th>        
            <th style="background-color: blue;font-size:12px;">Asal gereja</th>                     
                          
      </tr>
      <?php $i=1; foreach ($isi as $data) { ?>
      <tr>
          
           <td style="font-size:10px;"><?= $data->NamaLengkap?></td>
           <td style="font-size:10px;"><?= $data->gender ?></td>
           <td style="font-size:10px;"><?= $data->nama_ayah ?></td>
           <td style="font-size:10px;"><?= $data->nama_ibu ?></td>
           <td style="font-size:10px;"><?= $data->status_keluarga ?></td>
          
           <td style="font-size:10px;"><?= $data->namagereja ?></td>
                                
      </tr>
     <?php $i++; } ?>
</table>
