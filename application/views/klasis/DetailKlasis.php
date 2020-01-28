<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small></small>
      </h1>
      <ol class="breadcrumb">
       <li><a href="<?php echo base_url();?>Klasis/ManajemenJemaat"><i class="fa fa-briefcase"></i> Jemaat </a></li>
        <li class="active">Detail Jemaat</li>
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
                      <h3>Detail Jemaat</h3>
                    </div>
                  </div>

                  <div class="clearfix"></div>

                    <div class="">
                      <!-- <div class="x_panel"> -->
                        <div class="x_content">
                          <div class="container">
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
                          <table class="table table-striped">
                             <tbody>
                                <tr>
                                   <td colspan="1">
                                      <form class="well form-horizontal">
                                         <fieldset>
                                            <div class="form-group">
                                               <label class="col-md-4 control-label">Nama Lengkap</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input placeholder="Full Name" class="form-control" readonly="readonly" value="<?= $i['nama_lengkap']?>" type="text"></div>
                                               </div>
                                            </div>
                                            <div class="form-group">
                                               <label class="col-md-4 control-label">Nama Panggilan</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input readonly="readonly" class="form-control" value="<?= $i['nama_panggilan']?>" type="text"></div>
                                               </div>
                                            </div>
                                            <div class="form-group">
                                               <label class="col-md-4 control-label">Email</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input readonly="readonly" class="form-control" value="<?= $i['alamat_email']?>" type="text"></div>
                                               </div>
                                            </div>
                                            <div class="form-group">
                                               <label class="col-md-4 control-label">No. Induk</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input readonly="readonly" class="form-control" value="<?= $i['kode_gereja']?>.<?= $i['no_induk']?>" type="text"></div>
                                               </div>
                                            </div>
                                            <div class="form-group">
                                               <label class="col-md-4 control-label">No. KTP</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input readonly="readonly" class="form-control" value="<?= $ktp ?>" type="text"></div>
                                               </div>
                                            </div>
                                            <div class="form-group">
                                               <label class="col-md-4 control-label">No. KK</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input readonly="readonly" class="form-control" value="<?= $i['no_kk']?>" type="text"></div>
                                               </div>
                                            </div>

                                            <div class="form-group">
                                               <label class="col-md-4 control-label">Tempat, tanggal lahir</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input readonly="readonly" class="form-control" value="<?= $i['tempat_lahir']?>, <?= $i['tgl_lahir']?>" type="text"></div>
                                               </div>
                                            </div>

                                            <div class="form-group">
                                               <label class="col-md-4 control-label">Usia Jemaat</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input readonly="readonly" class="form-control" value="<?= $i['usia']?>" type="text"></div>
                                               </div>
                                            </div>

                                            <div class="form-group">
                                               <label class="col-md-4 control-label">Jenis Kelamin</label>
                                              <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input readonly="readonly" class="form-control" value="<?= $i['jenis_kelamin']?>" type="text"></div>
                                               </div>
                                            </div>

                                            <div class="form-group">
                                               <label class="col-md-4 control-label">Status Hidup</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span><input readonly="readonly" class="form-control" required="true" value="<?= $i['status']?>" type="text"></div>
                                               </div>
                                            </div>

                                            <div class="form-group">
                                               <label class="col-md-4 control-label">Alamat sesuai KTP</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input readonly="readonly" class="form-control" value="<?= $i['alamat_ktp']?>" type="text"></div>
                                               </div>
                                            </div>

                                            <div class="form-group">
                                               <label class="col-md-4 control-label">Nama Ayah</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input readonly="readonly" class="form-control" value="<?= $i['nama_ayah']?>" type="text"></div>
                                               </div>
                                            </div>
                                            <div class="form-group">
                                               <label class="col-md-4 control-label">Nama Ibu</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input readonly="readonly" class="form-control" value="<?= $namaibu?>" type="text"></div>
                                               </div>
                                            </div>
                                            <div class="form-group">
                                               <label class="col-md-4 control-label">Nama Suami</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input readonly="readonly" class="form-control" value="<?= $i['nama_suami']?>" type="text"></div>
                                               </div>
                                            </div>
                                            <div class="form-group">
                                               <label class="col-md-4 control-label">Nama Istri</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input readonly="readonly" class="form-control" value="<?= $i['nama_istri']?>" type="text"></div>
                                               </div>
                                            </div>

                                            <div class="form-group">
                                               <label class="col-md-4 control-label">No Telp</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input readonly="readonly" class="form-control" value="<?= $i['telepon']?>" type="text"></div>
                                               </div>
                                            </div>
                                            <div class="form-group">
                                               <label class="col-md-4 control-label">No Telp WA</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input readonly="readonly" class="form-control" value="<?= $i['telepon_wa']?>" type="text"></div>
                                               </div>
                                            </div>   

                                            <div class="form-group">
                                               <label class="col-md-4 control-label">Golongan Darah</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input readonly="readonly" class="form-control" value="<?= $i['gol_darah']?>" type="text"></div>
                                               </div>
                                            </div>

                                            <div class="form-group">
                                               <label class="col-md-4 control-label">Gereja Sekarang</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input readonly="readonly" class="form-control" value="<?= $i['namapepantan']?>" type="text"></div>
                                               </div>
                                            </div>

                                            <div class="form-group">
                                                 <label class="col-md-4 control-label">Status Warga Gereja</label>
                                                 <div class="col-md-8 inputGroupContainer">
                                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input readonly="readonly" class="form-control" value="<?= $i['status_warga']?>" type="text"></div>
                                                 </div>
                                              </div>
                                              
                                              <div class="form-group">
                                                 <label class="col-md-4 control-label">Tempat baptis, tanggal baptis</label>
                                                 <div class="col-md-8 inputGroupContainer">
                                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input readonly="readonly" class="form-control" value="<?= $i['tempat_baptis']?>, <?= $i['tgl_baptis']?>" type="text"></div>
                                                 </div>
                                              </div>

                                              <div class="form-group">
                                                 <label class="col-md-4 control-label">Tempat sidhi, tanggal sidhi</label>
                                                 <div class="col-md-8 inputGroupContainer">
                                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input readonly="readonly" class="form-control" value="<?= $i['tempat_sidhi']?>, <?= $i['tgl_sidhi']?>" type="text"></div>
                                                 </div>
                                              </div>

                                             
                                           
                                         </fieldset>
                                      </form>
                                   </td>
                                   <td colspan="1">
                                      <form class="well form-horizontal">
                                         <fieldset>
                                           <div class="form-group">
                                              <label class="col-md-4 control-label">Tempat Kebaktian</label>
                                              <div class="col-md-8 inputGroupContainer">
                                                 <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input readonly="readonly" class="form-control" value="<?= $i['tempat_kebaktian']?>" type="text"></div>
                                              </div>
                                           </div>

                                         <div class="form-group">
                                            <label class="col-md-4 control-label">Status Pernikahan</label>
                                            <div class="col-md-8 inputGroupContainer">
                                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span><input readonly="readonly" class="form-control" required="true" value="<?= $i['status_perkawinan']?>" type="text"></div>
                                            </div>
                                         </div>
                                            
                                           <div class="form-group">
                                              <label class="col-md-4 control-label">Tata Cara Pernikahan</label>
                                              <div class="col-md-8 inputGroupContainer">
                                                 <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input readonly="readonly" class="form-control" value="<?= $i['tatacara_nikah']?>" type="text"></div>
                                              </div>
                                           </div>

                                           <div class="form-group">
                                              <label class="col-md-4 control-label">Tanggal Pernikahan</label>
                                              <div class="col-md-8 inputGroupContainer">
                                                 <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input readonly="readonly" class="form-control" value="<?= $i['tgl_nikah']?>" type="text"></div>
                                              </div>
                                           </div>

                                           <div class="form-group">
                                              <label class="col-md-4 control-label">Jumlah Anak</label>
                                              <div class="col-md-8 inputGroupContainer">
                                                 <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input readonly="readonly" class="form-control" value="<?= $i['jml_anak']?>" type="text"></div>
                                              </div>
                                           </div>
                                           <div class="form-group">
                                               <label class="col-md-4 control-label">Status Rumah Tinggal</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input readonly="readonly" class="form-control" value="<?= $i['status_rumah_tinggal']?>" type="text"></div>
                                               </div>
                                            </div>
                                            
                                            <div class="form-group">
                                               <label class="col-md-4 control-label">Pendidikan Terakhir</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input readonly="readonly" class="form-control" value="<?= $i['pendidikan']?>" type="text"></div>
                                               </div>
                                            </div>

                                            <div class="form-group">
                                               <label class="col-md-4 control-label">Pekerjaan Pokok</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input readonly="readonly" class="form-control" value="<?= $i['pekerjaan']?>" type="text"></div>
                                               </div>
                                            </div>
                                            <div class="form-group">
                                               <label class="col-md-4 control-label">Pekerjaan Sampingan</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span><input readonly="readonly" class="form-control" value="<?= $i['pekerjaan_sampingan']?>" type="text"></div>
                                               </div>
                                            </div>
                                            <div class="form-group">
                                               <label class="col-md-4 control-label">Minat Usaha</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input readonly="readonly" class="form-control" value="<?= $i['minat_usaha']?>" type="text"></div>
                                               </div>
                                            </div>

                                            <div class="form-group">
                                               <label class="col-md-4 control-label">Penghasil Rata-rata Per bulan</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input readonly="readonly" class="form-control" value="<?= $i['penghasilan']?>" type="text"></div>
                                               </div>
                                            </div>

                                            <div class="form-group">
                                               <label class="col-md-4 control-label">Peran dalam gereja</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input readonly="readonly" class="form-control" value="<?= $i['peran_gereja']?>" type="text"></div>
                                               </div>
                                            </div>

                                            <div class="form-group">
                                               <label class="col-md-4 control-label">Lama Menjabat majelis (th)</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input readonly="readonly" class="form-control" value="<?= $i['lama_jabatan_majelis']?>" type="text"></div>
                                               </div>
                                            </div>

                                            <div class="form-group">
                                               <label class="col-md-4 control-label">Lama Menjabat Pengurus komisi (th)</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input readonly="readonly" class="form-control" value="<?= $i['lama_pengurus_komisi']?>" type="text"></div>
                                               </div>
                                            </div>

                                            <div class="form-group">
                                               <label class="col-md-4 control-label">Menjadi panitia/tim dalam kegiatan gereja</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input readonly="readonly" class="form-control" value="<?= $i['panitia_kegiatan']?>" type="text"></div>
                                               </div>
                                            </div>

                                            <div class="form-group">
                                               <label class="col-md-4 control-label">Minat pelayanan umum</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input readonly="readonly" class="form-control" value="<?= $i['minat_pelayanan_umum']?>" type="text"></div>
                                               </div>
                                            </div>

                                            <div class="form-group">
                                               <label class="col-md-4 control-label">Minat pelayanan gerejawi</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input readonly="readonly" class="form-control" value="<?= $i['minat_pelayanan_gereja']?>" type="text"></div>
                                               </div>
                                            </div>

                                            <div class="form-group">
                                               <label class="col-md-4 control-label">Pengalaman organisasi</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input readonly="readonly" class="form-control" value="<?= $i['pengalaman_organisasi']?>" type="text"></div>
                                               </div>
                                            </div>

                                            <div class="form-group">
                                               <label class="col-md-4 control-label">Pengalaman melayani masyarakat</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input readonly="readonly" class="form-control" value="<?= $i['pengalaman_melayani']?>" type="text"></div>
                                               </div>
                                            </div>
                                           
                                            <div class="form-group">
                                               <label class="col-md-4 control-label">Gangguan Kesehatan(jika ada)</label>
                                               <div class="col-md-8 inputGroupContainer">
                                                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input readonly="readonly" class="form-control" value="<?= $i['gangguan_kesehatan']?>" type="text"></div>
                                               </div>
                                            </div>
                                            
                                            
                                         </fieldset>
                                      </form>
                                   </td>
                                </tr>
                             </tbody>
                          </table>
                          <?php endforeach; ?>
                          </div>       
                        </div>
                      <!-- </div> -->
                    </div>
                  </div>
                </div>
            </div>
     

    </section>
</div>

