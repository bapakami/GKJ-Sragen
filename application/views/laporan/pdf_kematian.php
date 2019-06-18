<table align="center">
  <tr>
    <td><b><h2 style="text-align: center;">Laporan Daftar Kematian Jemaat</h2></b>
      <b><h2 style="text-align: center;"><?=$namagereja[0]->namagereja?></h2>
    </td>
  </tr>
</table>
<br>
<h4>Tabel Statistik : </h4>
<table border="1" style="border-collapse: collapse;width: 100%;">
      <tr>
        <th style="background-color: blue;font-size:12px;">Gereja</th>
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
        <td style="font-size:12px;text-align: center;"><?=$namagereja[0]->namagereja?></td>
        <td style="font-size:12px;text-align: center;"><?= $data->JumlahJemaat; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format($Persentase,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;"><b>Total</b></td>
        <td style="font-size:12px;text-align: center;"><b><?= $data->JumlahJemaat ?> Jemaat</b></td>
        <td style="font-size:12px;text-align: center;"><b><?= number_format($Persentase,2)?>%</b></td>
      </tr>
      <?php $i++; } ?>
</table>
<br><br>
<h4>Tabel Jemaat : </h4>
<table border="1" style="border-collapse: collapse;width: 100%;">
      <tr>
            <th style="background-color: blue;font-size:12px;">Nama Lengkap</th>
            <th style="background-color: blue;font-size:12px;">Tanggal Kematian</th>
            <th style="background-color: blue;font-size:12px;">Kota Kematian</th>
            <th style="background-color: blue;font-size:12px;">Tempat Kematian</th>         
            <th style="background-color: blue;font-size:12px;">Asal Gereja</th>
                      
                          
      </tr>
      <?php $i=1; foreach ($isi as $data) { ?>
      <tr>
          
           <td style="font-size:10px;"><?= $data->NamaLengkap?></td>
           <td style="font-size:10px;"><?= $data->tanggal_kematian ?></td>
           <td style="font-size:10px;"><?= $data->kota_kematian?></td>
           <td style="font-size:10px;"><?= $data->tempat_kematian ?></td>
           <td style="font-size:10px;"><?= $data->namagereja ?></td>
                                
      </tr>
     <?php $i++; } ?>
</table>
