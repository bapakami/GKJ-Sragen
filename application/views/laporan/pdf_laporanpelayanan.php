<table>
  <tr>
    <td><b><h2>Laporan Pelayanan</h2></b>
      <b><h2><?=$namagereja[0]->namagereja?></h2></b>
      <h5>berdasar : <?= $berdasar ?></h5>
    </td>
  </tr>
</table>
<br>
<h4>Tabel Statistik : </h4>
<table border="1" style="border-collapse: collapse;width: 100%;">
      <tr>
        <th style="background-color: blue;font-size:12px;">Pelayanan</th>
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
        <td style="font-size:12px;text-align: center;">Paduan suara</td>
        <td style="font-size:12px;text-align: center;"><?= $data->PaduanSuara; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->PaduanSuara / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Pengurus komisi</td>
        <td style="font-size:12px;text-align: center;"><?= $data->PengurusKomisi; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->PengurusKomisi / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Pengiring ibadah</td>
        <td style="font-size:12px;text-align: center;"><?= $data->PengiringIbadah; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->PengiringIbadah / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Menjadi majelis</td>
        <td style="font-size:12px;text-align: center;"><?= $data->MenjadiMajelis; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->MenjadiMajelis / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Memimpin PA</td>
        <td style="font-size:12px;text-align: center;"><?= $data->MemimpinPA; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->MemimpinPA / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Membuat bahan PA</td>
        <td style="font-size:12px;text-align: center;"><?= $data->BahanPA; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->BahanPA / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Guru sekolah minggu</td>
        <td style="font-size:12px;text-align: center;"><?= $data->GuruSekolahMinggu; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->GuruSekolahMinggu / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Mendampingi anak/remaja/pemuda</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Mendampingi; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Mendampingi / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Panitia pembangunan</td>
        <td style="font-size:12px;text-align: center;"><?= $data->PanitiaPembangunan; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->PanitiaPembangunan / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Multimedia</td>
        <td style="font-size:12px;text-align: center;"><?= $data->Multimedia; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->Multimedia / $JumlahJemaat) * 100,2); ?>%</td>
      </tr>
      <tr>
        <td style="font-size:12px;text-align: center;">Administrasi gereja</td>
        <td style="font-size:12px;text-align: center;"><?= $data->AdministrasiGereja; ?> </td>
        <td style="font-size:12px;text-align: center;"><?= number_format(($data->AdministrasiGereja / $JumlahJemaat) * 100,2); ?>%</td>
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
            <th style="background-color: blue;font-size:12px;">Jenis Kelamin</th>
            <th style="background-color: blue;font-size:12px;">Alamat tinggal</th>
            <th style="background-color: blue;font-size:12px;">Telepone</th>
            
            <th style="background-color: blue;font-size:12px;">Minat Pelayanan</th>        
            <th style="background-color: blue;font-size:12px;">Asal gereja</th>                     
                          
      </tr>
      <?php $i=1; foreach ($isi as $data) { ?>
      <tr>
          
           <td style="font-size:10px;"><?= $data->NamaLengkap?></td>
           <td style="font-size:10px;"><?= $data->gender ?></td>
           <td style="font-size:10px;"><?= $data->alamat ?></td>
           <td style="font-size:10px;"><?= $data->telepon ?></td>
           <td style="font-size:10px;"><?= $data->minat_pelayanan_gereja ?></td>
          
           <td style="font-size:10px;"><?= $data->namagereja ?></td>
                                
      </tr>
     <?php $i++; } ?>
</table>
