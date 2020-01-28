
<?php
function tanggal_indo($tanggal)
         {
           $bulan = array (1 =>   'Januari',
                 'Februari',
                 'Maret',
                 'April',
                 'Mei',
                 'Juni',
                 'Juli',
                 'Agustus',
                 'September',
                 'Oktober',
                 'November',
                 'Desember'
               );
           $split = explode('-', $tanggal);
           return $split[1] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
         }
 ?>
 <table>
  <tr>
    <td><img src="<?php echo base_url();?>assets/img/logoGKJ.png" style="width: 150px; height: 150px" class="lazyload img-circle" alt="User Image"></td>
    <td><b><h2 style="text-align: center;">Detail Jemaat</h2></b>
      <b><h2 style="text-align: center;">GKJ Klasis</h2>
    </td>
  </tr>
</table>
<div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                  <?php $i=1; foreach ($isi as $data) { ?>
                    <div class="card-body">
                        <div class="card-title mb-4">
                       
                            <div class="d-flex justify-content-start">
                               
                                <!-- <div class="userData ml-3">
                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><?= $data->nama_lengkap?></h2>
                                    <h6 class="d-block"><?= $data->namagereja?></h6>
                                    <!-- <h6 class="d-block"><a href="javascript:void(0)">300</a> Blog Posts</h6>
                                </div>  -->
                               
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                        
                                       <br>
                                        <table border="1" style="border-collapse: collapse;width: 100%;">
                                          <tr>
                                                <td style="font-size:16px;font-weight: bold;">No. Buku Induk</td> 
                                                <td style="font-size:12px;"><?= $data->kode_gereja?>.<?= $data->no_induk?></td>
                                          </tr>
                                              <tr>
                                                    <td style="font-size:16px;font-weight: bold;">Nama Lengkap</td> 
                                                    <td style="font-size:12px;"><?= $data->nama_lengkap?></td>
                                              </tr> 

                                              <tr>
                                                    <td style="font-size:16px;font-weight: bold;">Nama Panggilan</td> 
                                                    <td style="font-size:12px;"><?= $data->nama_panggilan?></td>
                                              </tr> 

                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Email</td> 
                                                   <td style="font-size:12px;"><?= $data->alamat_email?></td>
                                              </tr>
                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">No KTP</td> 
                                                   <td style="font-size:12px;">
                                                   <?php 
                                                   if($data->NoKTPEncrypt != null)
                                                     {
                                                       $ktp = $this->encrypt->decode($data->NoKTPEncrypt);
                                                     } else
                                                     {
                                                       $ktp = $data->no_ktp;
                                                     }           
                                                   echo $ktp;
                                                   ?>
                                                     
                                                   </td>
                                              </tr>
                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">No KK</td> 
                                                   <td style="font-size:12px;"><?= $data->no_kk?></td>
                                              </tr>
                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Tempat, Tanggal Lahir</td> 
                                                   <td style="font-size:12px;"><?= $data->tempat_lahir?>, <?= tanggal_indo($data->tgl_lahir)?> </td>
                                              </tr>

                                              <tr>
                                                    <td style="font-size:16px;font-weight: bold;">Usia</td> 
                                                    <td style="font-size:12px;"><?= $data->usia?></td>
                                              </tr> 

                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Jenis Kelamin</td> 
                                                   <td style="font-size:12px;"><?= $data->jenis_kelamin?></td>
                                              </tr>

                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Status</td> 
                                                   <td style="font-size:12px;"><?= $data->status?></td>
                                              </tr>
                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Alamat</td> 
                                                   <td style="font-size:12px;"><?= $data->alamat_ktp?></td>
                                              </tr>
                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Nama Ayah</td> 
                                                   <td style="font-size:12px;"><?= $data->nama_ayah?></td>
                                              </tr>
                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Nama Ibu</td> 
                                                   <td style="font-size:12px;">
                                                   <?php 
                                                   if($data->namaIbuEncrypt != null)
                                                     {
                                                       $motherName = $this->encrypt->decode($data->namaIbuEncrypt);
                                                     } else
                                                     {
                                                       $motherName = $data->nama_ibu;
                                                     }           
                                                   echo $motherName;
                                                   ?>
                                                     
                                                   </td>
                                              </tr>

                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Nama Suami</td> 
                                                   <td style="font-size:12px;"><?= $data->nama_suami?></td>
                                              </tr>

                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Nama Istri</td> 
                                                   <td style="font-size:12px;"><?= $data->nama_istri?></td>
                                              </tr>

                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">No Telepon</td> 
                                                   <td style="font-size:12px;"><?= $data->telepon?></td>
                                              </tr>
                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Gol Darah</td> 
                                                   <td style="font-size:12px;"><?= $data->gol_darah?></td>
                                              </tr>

                                            

                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Status Warga</td> 
                                                   <td style="font-size:12px;"><?= $data->status_warga?></td>
                                              </tr>
                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Tempat Mengikuti Kebaktian</td> 
                                                   <td style="font-size:12px;"><?= $data->tempat_kebaktian?></td>
                                              </tr>

                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Status Perkawinan</td> 
                                                   <td style="font-size:12px;"><?= $data->status_perkawinan?></td>
                                              </tr>
                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Tata Cara Pengesahan Pernikahan</td> 
                                                   <td style="font-size:12px;"><?= $data->tatacara_nikah?></td>
                                              </tr>
                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Tanggal Nikah</td> 
                                                   <td style="font-size:12px;"><?= $data->tgl_nikah?></td>
                                              </tr>

                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Jumlah Anak</td> 
                                                   <td style="font-size:12px;"><?= $data->jml_anak?></td>
                                              </tr>

                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Status Rumah Tinggal</td> 
                                                   <td style="font-size:12px;"><?= $data->status_rumah_tinggal?></td>
                                              </tr>

                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Pendidikan Terakhir</td> 
                                                   <td style="font-size:12px;"><?= $data->pendidikan?></td>
                                              </tr>

                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Pekerjaan</td> 
                                                   <td style="font-size:12px;"><?= $data->pekerjaan?></td>
                                              </tr>

                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Pekerjaan Sampingan</td> 
                                                   <td style="font-size:12px;"><?= $data->pekerjaan_sampingan?></td>
                                              </tr>

                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Minat Usaha</td> 
                                                   <td style="font-size:12px;"><?= $data->minat_usaha?></td>
                                              </tr>

                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Penghasilan</td> 
                                                   <td style="font-size:12px;"><?= $data->penghasilan?></td>
                                              </tr>

                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Peran Dalam Gereja</td> 
                                                   <td style="font-size:12px;"><?= $data->peran_gereja?></td>
                                              </tr>

                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Lama Menjabat Majelis(th)</td> 
                                                   <td style="font-size:12px;"><?= $data->lama_jabatan_majelis?> tahun</td>
                                              </tr>

                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Lama Menjabat Pengurus Komisi(th)</td> 
                                                   <td style="font-size:12px;"><?= $data->lama_pengurus_komisi?> tahun</td>
                                              </tr>

                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Minat Pelayanan umum</td> 
                                                   <td style="font-size:12px;"><?= $data->minat_pelayanan_umum?></td>
                                              </tr>


                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Minat pelayanan gerejawi</td> 
                                                   <td style="font-size:12px;"><?= $data->minat_pelayanan_gereja?></td>
                                              </tr>
     <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Menjadi panitia / tim dalam kegiatan gereja</td> 
                                                   <td style="font-size:12px;"><?= $data->panitia_kegiatan?></td>
                                              </tr>

                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Pengalaman Organisasi</td> 
                                                   <td style="font-size:12px;"><?= $data->pengalaman_organisasi?></td>
                                              </tr>

                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Pengalaman Melayani Masyarakat</td> 
                                                   <td style="font-size:12px;"><?= $data->pengalaman_melayani?></td>
                                              </tr>

                                              <tr>
                                                   <td style="font-size:16px;font-weight: bold;">Gangguan kesehatan (jika ada)</td> 
                                                   <td style="font-size:12px;"><?= $data->gangguan_kesehatan?></td>
                                              </tr>



                                            
                                              </tr>
                                             
                                      
                                        </table>
                                        <?php $i++; } ?>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>