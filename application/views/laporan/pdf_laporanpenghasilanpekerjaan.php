<table>
  <tr>
    <td><b><h2>Laporan Penghasilan Jemaat</h2></b>
      <b><h2><?=$namagereja[0]->namagereja?></h2></b>
      <h5>Pekerjaan : <?= $berdasarPekerjaan?></h5>      
    </td>
  </tr>
</table>
<br>
<h4>Tabel Statistik : </h4>
<h5>Penghasilan : <?= $berdasarPenghasilan?></h5>
<table border="1" style="border-collapse: collapse;width: 100%;">
      <tr>
        <th style="background-color: blue;font-size:12px;">Pekerjaan</th>
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
        <td style="font-size:12px;text-align: center;">Belum bekerja</td>
        <td style="font-size:12px;text-align: center;"><?= $data->BelumBekerja; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->BelumBekerja / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Buruh</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Buruh; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Buruh / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">DPR</td>
        <td style="font-size:12px;text-align: center;"><?= $data->DPR; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->DPR / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Mengurus Rumah Tangga</td>
        <td style="font-size:12px;text-align: center;"><?= $data->MRT; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->MRT / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Nelayan</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Nelayan; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Nelayan / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Pedagang</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Pedagang; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Pedagang / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Pelajar / Mahasiswa</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Pelajar; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Pelajar / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Pensiunan</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Pensiunan; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Pensiunan / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Perangkat Desa</td>
        <td style="font-size:12px;text-align: center;"><?= $data->PerangkatDesa; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->PerangkatDesa / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Petani</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Petani; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Petani / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">PNS</td>
        <td style="font-size:12px;text-align: center;"><?= $data->PNS; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->PNS / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Swasta</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Swasta; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Swasta / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Tidak Bekerja</td>
        <td style="font-size:12px;text-align: center;"><?= $data->TidakBekerja; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->TidakBekerja / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">TNI / Pori</td>
        <td style="font-size:12px;text-align: center;"><?= $data->TNI; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->TNI / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Wiraswasta</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Wiraswasta; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Wiraswasta / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Lain-lain</td>
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
            <th style="background-color: blue;font-size:12px;">Gender</th>
            <th style="background-color: blue;font-size:12px;">Pendidikan Akhir</th>
            <th style="background-color: blue;font-size:12px;">Jumlah Tanggungan</th>         
            <th style="background-color: blue;font-size:12px;">Alamat Tinggal</th>
            <th style="background-color: blue;font-size:12px;">Asal Gereja</th>
                      
                          
      </tr>
      <?php $i=1; foreach ($isi as $data) { ?>
      <tr>
          
           <td style="font-size:10px;"><?= $data->NamaLengkap?></td>
           <td style="font-size:10px;"><?= $data->gender ?></td>
           <td style="font-size:10px;"><?= $data->pendidikan?></td>
           <td style="font-size:10px;"><?= $data->jml_anak ?></td>
           <td style="font-size:10px;"><?= $data->alamat ?></td>
           <td style="font-size:10px;"><?= $data->namagereja ?></td>
                                
      </tr>
     <?php $i++; } ?>
</table>
