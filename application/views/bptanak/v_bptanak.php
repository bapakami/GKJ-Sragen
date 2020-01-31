  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manajemen Jemaat
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Fasilitas </a></li>
        <li class="active">Manajemen Jemaat </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">


            <div class="box-header" style="color: #000000">
            <div class="form-group">
            <form class="form-horizontal" action="<?php echo base_url('Bptanak/Baptisanakpergereja/')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="col-md-4">
                  <label class="control-label">Pilih Gereja&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <select class="form-control" name="pilihgereja">
                    <option value='0'>--pilih Gereja--</option>
                            <?php 
                                foreach ($gereja as $grj) {
                                    echo "<option value='$grj[id]'>$grj[namagereja]</option>";
                                }
                            ?>
                  </select>       
                </div>
                <div class="col-md-4">
                  <!-- <label class="control-label">Status&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <select class="form-control" name="statuskematian">                        
                        <option value="Hidup">Hidup</option>
                        <option value="Wafat">Wafat</option>
                    </select> -->
                </div>            
                <div class="col-md-2">
                  <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;</label>
                  <button class="btn btn-info form-control" type="submit">Cari</button>            
                </div>
              
            </div>
            </form>
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive" style="display: <?php if( $idgereja === 0):?> none; <?php endif; ?>">
              <table id="example1" onchange="toggle();" class="table table-striped table-bordered table-responsive" style="width:100%;font-size:13px;">
                <thead>
                <tr>
                    <th style="width:38px;">#</th>
                    <th>Nama</th>                    
                    <th>Tempat, Tgl Lahir</th>
                    <th>Gender</th>
                    <th>Alamat</th>
                    <th>No. Induk</th>
                    <th>Asal Gereja</th>
                    <th>No. Telp</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                            $no = 0;
                             foreach ($data->result_array() as $i) :
                                    $no++;
                                    $id = $i['id'];
                         ?>
                <tr>
                    <td style="text-align:left;width:38px;"><?php echo $no; ?></td>
                    <td><?php echo $i['nama_lengkap']; ?></td>
                    <td><?php echo $i['tempat_lahir']; ?>, <?php echo $i['tgl_lahir']; ?> </td>
                    <td><?php echo $i['jenis_kelamin']; ?></td>
                    <td><?php echo $i['alamat_tinggal']; ?></td>
                    <td><?php echo $i['nmrbkinduk']; ?></td>
                    <td><?php echo $i['namagereja']; ?></td>
                    <td><?php echo $i['telepon']; ?></td>
                    <td style="text-align:center;"> 
                        <span data-toggle="tooltip" data-placement="top" data-original-title="Lihat Detail Jemaat">
                          <a data-toggle="modal" data-target="#detail_data<?php echo $id; ?>">
                            <button type="button" class="btn btn-info btn-xs" title="Detail"><i class="fa fa-eye"></i> Detail</button>
                          </a>
                        </span> 
                        <span data-toggle="tooltip" data-placement="top" data-original-title="Cetak">
                          <a href="<?php echo base_url().'Baptisanak/report_Data/'.$id; ?>" target="_blank">
                            <button type="button" class="btn btn-info btn-xs" title="Cetak"><i class="fa fa-print"></i> Cetak</button>
                          </a>
                        </span>                     
                    </td>
                </tr>   
    <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <div style="display: <?php if( $idgereja != 0):?> none;<?php endif; ?>">
            <br><br>
                <h3><p><center>Silahkan Memilih Gereja Untuk Menampilkan Data</center></p></h3>
                <br><Br>
            </div>

    </section>
  </div>
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
<!--Detail DATA -->
<div class="modal fade" id="detail_data<?php echo $i['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-header-success">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          <h3>Detail Jemaat</h3>
        </div>
        <div class="modal-body">
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
                          
                          </div>       
                        </div>
                      <!-- </div> -->
                    </div>
                  </div>
                </div>
            </div>
            <br><br>
            <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
    </div>
   </div>
</div>
<!--tutup Detail DATA -->
<?php endforeach; ?>
<script type="text/javascript">
$(document).ready(function () {
   $('#example1').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );

    //Update Barang
        $('#btn_edit').click(function(){
            alert("ehe");
            return false;
            var kobar=$('#kode_barang2').val();
            var nabar=$('#nama_barang2').val();
            var harga=$('#harga2').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/barang/update_barang')?>",
                dataType : "JSON",
                data : {kobar:kobar , nabar:nabar, harga:harga},
                success: function(data){
                    $('[name="kobar_edit"]').val("");
                    $('[name="nabar_edit"]').val("");
                    $('[name="harga_edit"]').val("");
                    $('#ModalaEdit').modal('hide');
                    tampil_data_barang();
                }
            });
            return false;
        });
});
    

window.test = function(e) {
  if (e.value === 'AN01') {
    console.log(e.value);
  } else if (e.value === 'AN02') {
    console.log(e.value);
  } else if (e.value === 'AN03') {
    console.log(e.value);
  }
}


var resultPassword = "";

$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
    $('#btn_tambah').prop('disabled', false);
    resultPassword = "true";
  } else {
    $('#btn_tambah').prop('disabled', true);
    $('#message').html('Not Matching').css('color', 'red');
    resultPassword = "false";
  }

});
$('#ubah_password').prop('disabled', true);
$('#password_edit, #confirm_password_edit').on('keyup', function () {
  if ($('#password_edit').val() == $('#confirm_password_edit').val()) {
    $('#message_edit').html('Matching').css('color', 'green');
    
    $('#ubah_password').prop('disabled', false);
  } else {
    $('#ubah_password').prop('disabled', true);
    $('#message_edit').html('Not Matching').css('color', 'red');
    
  }

});

function validateForm() {
    if($('#username').val() == ''){
        alert("Username tidak boleh kosong!!");
        return false;
    } else if($('#fullname').val() == ''){
        alert("FullName tidak boleh kosong!!");
        return false;
    } else if(resultPassword == "false"){
        alert("Password tidak Sama!!");
        return false;
    } else if($('#telephone').val() == ''){
        alert("Telephone tidak boleh kosong!!");
        return false;
    } else if($('#email').val() == ''){
        alert("Email tidak boleh kosong!!");
        return false;
    } else if ($("#gereja").find(":selected").text() == '--pilih--'){
        alert("Asal Gereja tidak boleh kosong!!");
        return false;
    }
}

</script>