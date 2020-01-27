<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Non Jemaat
        <small></small>
      </h1>
      <ol class="breadcrumb">
       
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">


           
            <div class="box-body table-responsive">
              <div class="right_col" role="main">
                <div class="">
                  <div class="page-title">
                    <div class="title_left">
                      <h3>Form Edit</h3>
                    </div>
                  </div>

                  <div class="clearfix"></div>

                    <div class="">
                      <!-- <div class="x_panel"> -->
                        <div class="x_content">
                        <?php foreach ($data->result_array() as $i) :
                          $id = $i['id'];
                          if($i['NoKTPEncrypt'] != null)
                           {
                            $ktp = $this->encrypt->decode($i['NoKTPEncrypt']);
                           } else
                           {
                            $ktp = $i['no_ktp'];
                           }     
                           
                           if($i['namaIbuEncrypt'] != null)
                           {
                            $namaibu = $this->encrypt->decode($i['namaIbuEncrypt']);
                           } else
                           {
                            $namaibu = $i['nama_ibu'];
                           }         
                        ?>
        <form class="form-horizontal" action="<?php echo base_url('AdminGereja/NonJemaat/editData')?>" method="post" enctype="multipart/form-data" role="form">
          <!-- <div class="modal-body"> -->
            <input type="hidden" name="idedit" value="<?php echo $id; ?>">

            <!-- ======================================================================= -->
                      <div class="jumbotron" style="background: transparent;">
                        <div class="container-fluid">
                           <h5 align="center"><strong> Biodata Non Jemaat </strong></h5> <br><br>
                          <div class="row">
                            <div class="col-md-6 ml-auto">
                              <label for="form_lastname">No. KTP*</label>
                              <input id="NoKtp_edit" type="text" name="NoKtp_edit" class="form-control" placeholder="Nomor KTP" value="<?= $ktp ?>" required="required">
                            </div>
                            <div class="col-md-6 ml-auto">
                              <label for="form_lastname">No. KK</label>
                              <input id="NoKK_edit" type="text" name="NoKK_edit" class="form-control" placeholder="Nomor KK" value="<?= $i['no_kk']?>" >
                            </div>
                          </div>

                          <br>
                          <div class="row">
                            <div class="col-md-4">
                              <label for="form_name">Nama Lengkap*</label>
                              <input id="namaLengkap_edit" type="text" name="namaLengkap_edit" class="form-control" placeholder="Nama Lengkap" value="<?= $i['nama_lengkap']?>" required="required">
                            </div>
                            <div class="col-md-4 ml-auto">
                              <label for="form_lastname">Nama Panggilan</label>
                              <input id="NamaPanggilan_edit" type="text" name="NamaPanggilan_edit" class="form-control" placeholder="Nama Panggilan" value="<?= $i['nama_panggilan']?>">
                            </div>
                            <div class="col-md-4 ml-auto">
                             <label for="form_lastname">Jenis Kelamin</label>
                                 <div class="form-check">
                                 <label>
                                     <input type="radio" name="gender_edit" value="Laki-laki" <?php echo ($i['jenis_kelamin']=='Laki-laki')?'checked':'' ?>> <span class="label-text">Pria</span>
                                 </label>
                                 </div>
                                 <div class="form-check">
                                 <label>
                                     <input type="radio" name="gender_edit" value="Perempuan" <?php echo ($i['jenis_kelamin']=='Perempuan')?'checked':'' ?>> <span class="label-text">Wanita</span>
                                 </label>
                                 </div>
                            </div>
                          </div>  

                          <br>
                          <div class="row">
                            <div class="col-md-4"> 
                              <label for="form_lastname">Tempat Lahir*</label>
                              <input id="tempatLahir" type="text" name="tempatLahir_edit" class="form-control" placeholder="Tempat Lahir" value="<?= $i['tempat_lahir']?>" required="required">
                            </div>
                            <div class="col-md-4 ml-auto">
                              <label for="form_lastname">Tanggal Lahir*</label>
                              <input id="datepickerEdit" type="text" name="tanggalLahir_edit" class="form-control" placeholder="Tanggal Lahir" value="<?= $i['tgl_lahir']?>" required="required">
                            </div>
                            <div class="col-md-4">
                              <label class="control-label">Usia Non Jemaat&nbsp;&nbsp;&nbsp;&nbsp;</label>
                               <select class="form-control" name="usiaJemaat_edit">
                                          <option value="<?= $i['usia']?>"><?= $i['usia']?></option>
                                          <?php 
                                            foreach ($usiaJemaat as $usj) {
                                              echo "<option value='$usj[usia]'>$usj[usia]</option>";
                                            }
                                          ?>
                                      </select>
                            </div>
                          </div>

                          <br>
                                <div class="row">
                                  <div class="col-md-6"> 
                                    <label for="form_lastname">Email*</label>
                                    <input id="Email_edit" type="email" name="Email_edit" class="form-control" placeholder="Email" value="<?= $i['alamat_email']?>" required="required">
                                  </div>
                                  <!-- <div class="col-md-4 ml-auto">
                                    <label class="control-label">Status Hidup</label>
                                      <select class="form-control" id="status_edit" name="status_edit">
                                        <option value="Hidup" <?php echo ($i['status']=='Hidup')?'selected':'' ?>> Hidup </option>
                                        <option value="Wafat" <?php echo ($i['status']=='Wafat')?'selected':'' ?>>Wafat</option>                               
                                      </select>
                                  </div> -->
                                  <div class="col-md-6">
                                    <label class="control-label">Golongan Darah</label>
                                      <select class="form-control" name="golonganDarah_edit">                                    
                                             <option value="A" <?php echo ($i['gol_darah']=='A')?'selected':'' ?>>A</option>
                                             <option value="AB" <?php echo ($i['gol_darah']=='AB')?'selected':'' ?>>AB</option>
                                             <option value="B" <?php echo ($i['gol_darah']=='B')?'selected':'' ?>>B</option>
                                             <option value="O" <?php echo ($i['gol_darah']=='O')?'selected':'' ?>>O</option>
                                         </select>
                                  </div>
                                </div>

                                <br>
                                <div class="row">
                                  <div class="col-md-6 ml-auto">
                                    <label class="control-label" for="Overview (max 200 words)">Alamat KTP*</label>
                                    <textarea class="form-control" rows="3" id="Overview (max 200 words)" name="AlamatKTP_edit" placeholder="Alamat sesuai KTP"><?= $i['alamat_ktp']?></textarea>
                                  </div>
                                  <div class="col-md-6"> 
                                    <label class="control-label" for="Overview (max 200 words)">Alamat Tinggal Sekarang</label>  
                                    <textarea class="form-control" rows="3" id="Overview (max 200 words)" name="AlamatTinggalSekarang_edit" placeholder="Alamat"><?= $i['alamat_tinggal']?></textarea>
                                  </div>                                 
                                </div>

                                <br>
                                <div class="row">
                                  <div class="col-md-4">
                                    <label for="form_lastname">No Handphone</label>
                                    <input id="NoTelp_edit" type="text" name="NoTelp_edit" class="form-control" placeholder="Nomor Handphone" value="<?= $i['telepon']?>">
                                  </div>
                                  <div class="col-md-4 ml-auto">
                                    <label for="form_lastname">No Telp Rumah</label>
                                    <input id="NoTelp" type="text" name="NoTelprumah_edit" class="form-control" placeholder="Nomor Rumah" value="<?= $i['telepon_rumah']?>">
                                  </div>
                                  <div class="col-md-4 ml-auto">
                                   <label for="form_lastname">No Telp WA</label>
                                   <input id="NoTelp" type="text" name="NoTelpwa_edit" class="form-control" placeholder="Nomor WA" value="<?= $i['telepon_wa']?>">
                                  </div>
                                </div>

                                <br>
                                <div class="row">
                                  <div class="col-md-4">
                                    <label>Status dalam Keluarga</label>
                                       <select class="form-control" name="status_keluarga_edit">
                                                <option value="<?= $i['status_keluarga']?>"><?= $i['status_keluarga']?></option>
                                                <option value="Kepala Keluarga" >Kepala Keluarga</option>
                                                <option value="Istri">Istri</option>
                                                <option value="Anak">Anak</option>     
                                                <option value="Saudara">Saudara</option>                       
                                                <option value="Menantu">Menantu</option>
                                                <option value="Cucu">Cucu</option>
                                                <option value="Kakek/Nenek">Kakek/Nenek</option>
                                                <option value="Lain-lain">Lain-lain</option>
                                            </select>
                                  </div>                                          
                                </div>

                                <br>
                                <div class="row">
                                  <div class="col-md-6">
                                    <label for="form_lastname">Nama Ayah</label>
                                    <input id="namaAyah_edit" type="text" name="namaAyah_edit" class="form-control" placeholder="Nama Ayah" value="<?= $i['nama_ayah']?>">
                                  </div>
                                  <div class="col-md-6 ml-auto">
                                    <label for="form_lastname">Nama Ibu*</label>
                                    <input id="namaIbu_edit" type="text" name="namaIbu_edit" class="form-control" placeholder="Nama Ibu" value="<?= $namaibu?>" required="required">
                                  </div>                     
                                </div>

                                <br>
                                <div class="row">
                                  <div class="col-md-6">
                                    <label for="form_lastname">Nama Suami</label>
                                    <input id="namaSuami_edit" type="text" name="namaSuami_edit" class="form-control" placeholder="Nama Suami" value="<?= $i['nama_suami']?>">
                                  </div>
                                  <div class="col-md-6 ml-auto">
                                    <label for="form_lastname">Nama Istri</label>
                                    <input id="namIstri_edit" type="text" name="namaIstri_edit" class="form-control" placeholder="Nama Istri" value="<?= $i['nama_istri']?>">
                                  </div>                     
                                </div> 

                                <br>
                                <div class="row">
                                  <div class="col-md-4">
                                    <label>Status Rumah Tinggal</label>
                                       <select class="form-control" name="StatusRumahTinggal_edit">
                                           <option value="<?= $i['status_rumah_tinggal']?>"><?= $i['status_rumah_tinggal']?></option>
                                           <option value="Milik Sendiri">Milik Sendiri</option>
                                           <option value="Milik orang tua">Milik Orang Tua</option>
                                           <option value="Milik Saudara">Milik Saudara</option>
                                           <option value="Numpang">Numpang</option>
                                           <option value="Numpang">Kontrak/Sewa</option>
                                           <option value="Numpang">Lain-lain</option>
                                       </select>
                                  </div>
                                  <div class="col-md-4 ml-auto">
                                    <label>Pendidikan Terakhir</label>
                                      <select class="form-control" name="PendidikanTerakhir_edit">
                                          <option value="<?= $i['pendidikan']?>"><?= $i['pendidikan']?></option>
                                          <option>--pilih--</option>
                                           <?php 
                                            foreach ($pendidikan as $pnd) {
                                            echo "<option value='$pnd[nama_strata]'>$pnd[nama_strata]</option>";
                                            }
                                         ?>
                                      </select>
                                  </div> 
                                  <div class="col-md-4 ml-auto">
                                    <label>Penghasil Per bulan</label>
                                       <select class="form-control" name="PenghasilanPerBulan_edit">
                                           <option value="<?= $i['penghasilan']?>"><?= $i['penghasilan']?></option>
                                           <?php 
                                             foreach ($penghasilan as $png) {
                                             echo "<option value='$png[penghasilan_perbulan]'>$png[penghasilan_perbulan]</option>";
                                             }
                                          ?>
                                       </select>
                                  </div>                     
                                </div> 

                                <br>
                                <div class="row">
                                  <div class="col-md-4">
                                    <label>Pekerjaan Pokok</label>
                                        <select class="form-control" name="PekerjaanPokok_edit">
                                            <option value="<?= $i['pekerjaan']?>"><?= $i['pekerjaan']?></option>
                                            <?php 
                                              foreach ($pekerjaan as $pkj) {
                                              echo "<option value='$pkj[nama_pp]'>$pkj[nama_pp]</option>";
                                              }
                                           ?>
                                        </select>
                                  </div>
                                  <div class="col-md-4 ml-auto">
                                   <label for="form_lastname">Pekerjaan Sampingan</label>
                                   <input id="PekerjaanSampingan_edit" type="text" name="PekerjaanSampingan_edit" class="form-control" placeholder="Pekerjaan Sampingan" value="<?= $i['pekerjaan_sampingan']?>">
                                  </div> 
                                  <div class="col-md-4 ml-auto">
                                    <label for="form_lastname">Minat Usaha</label>
                                    <input id="minatUsaha_edit" type="text" name="minatUsaha_edit" class="form-control" placeholder="Minat Usaha" value="<?= $i['minat_usaha']?>">
                                  </div>                     
                                </div>    
                            
                            </div>
                          </div>


                   
            <!-- ====================================================================== -->
                      <div class="jumbotron" style="background: grey;">
                        <div class="container-fluid" >
                          <h5 align="center"><strong> Data Gerejawi Non Jemaat</strong></h5> <br><br>
                          <div class="row">
                            <div class="col-md-4">
                              <label>Wilayah Gereja</label>
                              <select class='form-control' id='gereja_edit' name="gereja_edit">
                                  <option value='0'>--pilih--</option>
                                    <?php 
                                      foreach ($gereja as $grj) {
                                        echo "<option value='$grj[id]'>$grj[namagereja]</option>";
                                      }
                                    ?>
                                </select>                               
                            </div>
                            <div class="col-md-4 ml-auto">
                              <label>Wilayah Pepanthan</label>
                                <select class='form-control' id='pepantan_edit' name="pepantan_edit">
                                   <?php if($i['Pepantan_id'] != null) {?>
                                   <option value="<?= $i['Pepantan_id']?>"><?= $i['namapepantan']?></option>
                                   <?php }?>                                   
                                    <option value='Gereja Induk'>Gereja Induk</option>
                                    <?php 
                                        foreach ($pepantan as $pnt) {
                                        echo "<option value='$pnt[namapepantan]'>$pnt[namapepantan]</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            
                          </div>

                          <br>
                          <div class="row">
                            <div class="col-md-4">
                              <label>Status Warga Non Gereja</label>
                                <select class="form-control" name="StatusWargaGereja_edit">
                                     <option value="<?= $i['status_warga']?>"><?= $i['status_warga']?></option>
                                    <option value="Warga">Warga</option>
                                    <option value="Tamu">Tamu</option>
                                    <option value="Warga Belajar">Warga Belajar</option>                            
                                </select>                               
                            </div>
                            <div class="col-md-4 ml-auto">
                              <label>Tempat Kebaktian</label>
                                <select class="form-control" name="TempatKebaktian_edit">
                                    <option value="<?= $i['tempat_kebaktian']?>"><?= $i['tempat_kebaktian']?></option>
                                    <option value="Induk">Induk</option>
                                    <option value="Wilayan">Wilayan</option>
                                    <option value="Gereja">Gereja</option>                            
                                </select>
                            </div>
                          </div>

                          <br>
                          <div class="row">
                            <div class="col-md-4">
                              <label for="form_lastname">Pendeta yang Membaptis</label>
                              <input id="pdt_baptis_edit" type="text" name="pdt_baptis_edit" class="form-control" placeholder="Nama Pendeta" value="<?= $i['pdt_baptis']?>">                               
                            </div>
                            <div class="col-md-4 ml-auto">
                              <label for="form_lastname">Tempat Baptis</label>
                              <input type="text" name="tempat_baptis_edit" class="form-control" placeholder="Tempat Baptis" value="<?= $i['tempat_baptis']?>">
                            </div>
                            <div class="col-md-4 ml-auto">
                              <label for="form_lastname">Tanggal Baptis</label>
                              <input id="datepickerbaptis_edit" type="text" name="tanggal_baptis_edit" class="form-control" placeholder="Tanggal Baptis" value="<?= $i['tgl_baptis']?>">
                            </div>
                          </div>

                          <br>
                          <div class="row">
                            <div class="col-md-4">
                              <label for="form_lastname">Pendeta</label>
                              <input id="pdt_sidhi_edit" type="text" name="pdt_sidhi_edit" class="form-control" placeholder="Nama Pendeta" value="<?= $i['pdt_sidhi']?>">                               
                            </div>
                            <div class="col-md-4 ml-auto">
                              <label for="form_lastname">Tempat Sidhi</label>
                              <input type="text" name="tempat_sidhi_edit" class="form-control" value="<?= $i['tempat_sidhi']?>" placeholder="Tempat Sidhi">
                            </div>
                            <div class="col-md-4 ml-auto">
                              <label for="form_lastname">Tanggal Sidhi</label>
                              <input id="datepickersidhi_edit" type="text" name="tanggal_sidhi_edit" class="form-control" placeholder="Tanggal Sidhi" value="<?= $i['tgl_sidhi']?>" >
                            </div>
                          </div>

                          <br>
                         
                        </div>
                      </div>


            <!-- ==================================================================== -->
                      <div class="jumbotron" style="background: transparent;">
                        <div class="container-fluid">
                          <h5 align="center"><strong> Data Marital Jemaat</strong></h5> <br><br>
                          <div class="row">
                            <div class="col-md-4">
                              <label for="form_lastname">Tanggal Pernikahan</label>
                              <input id="datepickerOtherEdit" type="text" name="tanggalPernikahan_edit" class="form-control" placeholder="Tanggal Pernikahan" value="<?= $i['tgl_nikah']?>">                               
                            </div>
                            <div class="col-md-4 ml-auto">
                              <label>Tata Cara Pernikahan</label>
                                <select class="form-control" name="tataCaraPernikahan_edit">
                                    <option value="<?= $i['tatacara_nikah']?>"><?= $i['tatacara_nikah']?></option>
                                    <option value="Kristiani">Kristiani</option>
                                    <option value="Non Kristiani">Non Kristiani</option>
                                    <option value="Lain-lain">Lain-lain</option>                            
                                </select>
                            </div>
                            <div class="col-md-4 ml-auto">
                              <label for="form_lastname">Status Pernikahan</label>
                                  <div class="form-check">
                                  <label>
                                      <input type="radio" name="statusNikah_edit" value="Belum Menikah" <?php echo ($i['status_perkawinan']=='Belum Menikah')?'checked':'' ?>> <span class="label-text">Belum Menikah</span>
                                  </label>
                                  </div>
                                  <div class="form-check">
                                  <label>
                                      <input type="radio" name="statusNikah_edit" value="Menikah" <?php echo ($i['status_perkawinan']=='Menikah')?'checked':'' ?>> <span class="label-text">Menikah</span>
                                  </label>
                                  </div>
                            </div>
                          </div>

                          <br>
                          <div class="row">
                            <div class="col-md-4">
                              <label for="form_lastname">Orang yang Menikahkan</label>
                              <input id="pdt_nikah_edit" type="text" name="pdt_nikah_edit" class="form-control" placeholder="Nama Pendeta" value="<?= $i['pdt_nikah']?>">    
                            </div>
                            <div class="col-md-4">
                              <label for="form_lastname">Tempat Pernikahan</label>
                              <input id="tempat_nikah_edit" type="text" name="tempat_nikah_edit" class="form-control" placeholder="Tempat Pernikahan" value="<?= $i['tempat_pernikahan']?>">    
                            </div> 
                            <div class="col-md-4">
                              <label for="form_lastname">No Pencatatan Sipil</label>
                              <input id="no_pencatatan_sipil_edit" type="text" name="no_pencatatan_sipil_edit" class="form-control" placeholder="No Pencatatan Sipil" value="<?= $i['no_pencatatan_sipil']?>">    
                            </div>                    
                          </div>
                            
                        </div>
                      </div>

            <!-- ======================================================================================== -->
                      <div class="jumbotron" style="background: grey;">
                        <div class="container-fluid">
                          <h5 align="center"><strong> Data Keaktifan Non Jemaat</strong></h5> <br><br>
                          <div class="row">
                            <div class="col-md-4">
                              <label>Minat Pelayanan Umum</label>      
                               <select class="form-control" name="minat_pelayanan_umum_edit">
                                   <option value="<?= $i['minat_pelayanan_umum']?>"><?= $i['minat_pelayanan_umum']?></option>
                                   <?php 
                                        foreach ($minatPelayananUmum as $mpu) {
                                        echo "<option value='$mpu[nama_pu]'>$mpu[nama_pu]</option>";
                                        }
                                    ?>                           
                               </select>
                            </div>
                            <div class="col-md-4 ml-auto">
                              <label>Minat Pelayanan Gereja</label>
                                  <select class="form-control" name="minat_pelayanan_gereja_edit">
                                       <option value="<?= $i['minat_pelayanan_gereja']?>"><?= $i['minat_pelayanan_gereja']?></option>
                                      <?php 
                                        foreach ($minatPelayananGereja as $mpg) {
                                        echo "<option value='$mpg[nama_pg]'>$mpg[nama_pg]</option>";
                                        }
                                      ?>                               
                                  </select>
                            </div>
                            <div class="col-md-4 ml-auto">
                              <label for="form_lastname">Pengalaman Organisasi</label>
                              <input type="text" name="pengalaman_organisasi_edit" class="form-control" value="<?= $i['pengalaman_organisasi']?>" placeholder="Pengalaman Organisasi">
                            </div>
                          </div> 

                          <br>

                          <div class="row">
                            <div class="col-md-4">
                              <label>Peran dalam Gereja</label>
                                 <select class="form-control" name="perangereja_edit">
                                    <option value="<?= $i['peran_gereja']?>"><?= $i['peran_gereja']?></option>
                                     <?php 
                                          foreach ($peranDalamGereja as $prn) {
                                          echo "<option value='$prn[nama_peran]'>$prn[nama_peran]</option>";
                                          }
                                      ?>                                 
                                 </select>
                                                                        
                            </div>
                            <div class="col-md-4 ml-auto">
                              <label for="form_lastname">Lama menjabat majelis (tahun)</label>
                              <input type="text" name="jabat_majelis_edit" class="form-control" placeholder="Lama Menjabat" value="<?= $i['lama_jabatan_majelis']?>">
                            </div>
                            <div class="col-md-4 ml-auto">
                              <label for="form_lastname">Lama menjabat pengurus komisi (tahun)</label>
                              <input type="text" name="jabat_komisi_edit" class="form-control" placeholder="Lama Menjabat" value="<?= $i['lama_pengurus_komisi']?>">
                            </div>
                          </div>

                      
                          <br>
                          <div class="row">
                            <div class="col-md-4">
                              <label>Menjadi panitia dalam kegiatan gereja</label>
                                 <select class="form-control" name="kegiatan_gereja_edit">
                                     <option value="<?= $i['panitia_kegiatan']?>"><?= $i['panitia_kegiatan']?></option>
                                     <option value="1-5 kali">1-5 kali</option>
                                     <option value="6-20 kali">6-20 kali</option>
                                     <option value="> 10 kali">> 10 kali</option>  
                                                                
                                 </select>                              
                            </div>
                            <div class="col-md-4">
                              <label>Pengalaman Melayani Masyarakat</label>
                                 <select class="form-control" name="pengalaman_melayani_edit">
                                     <option value="<?= $i['pengalaman_melayani']?>"><?= $i['pengalaman_melayani']?></option>
                                     <?php 
                                        foreach ($pengalamanMelayaniMasyarakat as $pmm) {
                                        echo "<option value='$pmm[nama_pmm]'>$pmm[nama_pmm]</option>";
                                        }
                                      ?>                              
                                 </select>
                            </div>
                       
                          </div>



                          <br>
                          <div class="row">
                            <div class="col-md-6 ml-auto">
                              <label class="control-label">Gangguan kesehatan (jika ada)</label>
                                <textarea class="form-control" rows="3" name="gangguan_kesehatan_edit" placeholder="Riwayat Gangguan Kesehatan"><?= $i['gangguan_kesehatan']?></textarea>
                            </div>
                          </div> 

                        </div>
                      </div>
                      

            <div class="modal-footer">
                <input class="btn btn-primary" type="submit" value="Edit&nbsp;&nbsp;">
                <button class="btn btn-default" data-dismiss="modal">Close</button>
            </div>                        
        </div>
      </form>       
      <?php endforeach; ?>
                        </div>
                      <!-- </div> -->
                    </div>
                  </div>
                </div>
            </div>
     

    </section>
</div>

