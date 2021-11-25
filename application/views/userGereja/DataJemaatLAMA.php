  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) --> 
    <section class="content-header">
      <h1>
        Manajemen Data Jemaat
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Fasilitas </a></li>
        <li class="active">Manajemen Data Jemaat </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">


            <div class="box-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#tambah_data"><span class="fa fa-plus"></span> Tambah Data</a>
              <div class="pull-right">
                <a href="<?= site_url('AdminGereja/Jemaat/export') ?>" target="_blank" role="button" class="btn btn-info">Export Data</a>
                <a href="<?= site_url('AdminGereja/Jemaat/import') ?>" role="button" class="btn btn-primary">Import Data</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-striped table-bordered table-responsive" style="width:100%;font-size:13px;">
                <thead>
                <tr>
                    <th style="width:38px;">#</th>
                    <th>Nama</th>
                    <th>No. KTP</th>
                    <th>No. KK</th>
                    <th>Usia</th>
                    <th>Tempat, Tgl Lahir</th>
                    <th>Gender</th>
                    <th>Alamat</th>
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
                    <td><?php echo $i['no_ktp']; ?></td>
                    <td><?php echo $i['no_kk'] ?></td>
                    <td><?php echo $i['usia'] ?></td>
                    <td><?php echo $i['tempat_lahir'] ?>, <?= tanggal_indo($i['tgl_lahir'])?></td>
                    <td><?php echo $i['jenis_kelamin'] ?></td>
                    <td><?php echo $i['alamat_ktp'] ?></td>
                    <td><?php echo $i['telepon'] ?></td>
                    <td style="text-align:center;"> 
                        <span data-toggle="tooltip" data-placement="top" data-original-title="Lihat Detail ">
                          <a href="<?php echo base_url().'AdminGereja/Jemaat/detail/'.$id; ?>">
                            <button type="button" class="btn btn-white btn-xs" title="View Details"><i class="fa fa-eye"> Detail</i></button>
                          </a>
                        </span> 
                        <span data-toggle="tooltip" data-placement="top" data-original-title="Edit ">
                          <a href="<?php echo base_url().'AdminGereja/Jemaat/FormEditJemaat/'.$id; ?>">
                            <button type="button" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-pencil"></i> Edit</button>
                          </a>
                        </span> 
                       <span data-toggle="tooltip" data-placement="top" data-original-title="Hapus ">
                          <a data-toggle="modal" data-target="#ModalHapus<?php echo $id; ?>">
                            <button type="button" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash"></i> Hapus</button>
                          </a>
                       </span>  
                       <span data-toggle="tooltip" data-placement="top" data-original-title="">
                          <a data-toggle="modal" data-target="#ModalStatus<?php echo $id; ?>">
                            <button type="button" class="btn btn-danger btn-xs" title="RIP"><i class="fa fa-user-times"></i> Status</button>
                          </a>
                       </span> 
                    </td>
                </tr>   
    <?php endforeach; ?>
                </tbody>
              </table>
            </div>
     

    </section>
  </div>
<!-- Modal Hapus -->
<?php foreach ($data->result_array() as $i) :
$id = $i['id'];
$username = $i['nama_lengkap'];
?>
        <div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Data Jemaat</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'AdminGereja/Jemaat/hapusData'; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                            <input type="hidden" name="kode" value="<?php echo $id; ?>"/>
                            <p>Apakah Anda yakin ingin menghapus <b><?php echo $username; ?></b> ?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-danger btn-flat" id="simpan"><i class="fa fa-trash"></i> Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
       </div>
    <?php endforeach; ?>

<!--RIP Status-->
<?php foreach ($data->result_array() as $i) :
$id = $i['id'];
$username = $i['nama_lengkap'];
?>
<div class="modal fade" id="ModalStatus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-header-success">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3>Tambah Data Kematian Jemaat</h3>
            </div>
         <form class="form-horizontal" action="<?php echo base_url('AdminGereja/Jemaat/KematianJemaat')?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <div class="col-md-12">
            <input type="hidden" name="kode" value="<?php echo $id; ?>"/>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Jemaat</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" value="<?= $username ?>" class="form-control" readonly="readonly" style="z-index: 2000; width: 400px;" />
              </div>
            </div>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Asal Gereja</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" value="<?=$i['namagereja'];?>" class="form-control" readonly="readonly" style="z-index: 2000; width: 400px;" />
              </div>
            </div>
            <div class="form-group ">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Kematian</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="datepickerSyukur" name="tanggalKematian" required="required" Placeholder="Tanggal Kematian" class="form-control" type="text" style="z-index: 2000; width: 400px;"/>
              </div>
            </div>
            <br>
            <br>
           
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kota Kematian</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="KotaKematian" type="text" Placeholder="Kota Kematian" required="required" class="form-control" style="z-index: 2000; width: 400px;" />
              </div>
            </div>

            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tempat Kematian</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="TempatKematian" type="text" Placeholder="Tempat Kematian" required="required" class="form-control" style="z-index: 2000; width: 400px;" />
              </div>
            </div>
           
          </div>
          
            <div class="modal-footer">
            <input class="btn btn-primary"  type="submit" value="Simpan">
            <button class="btn btn-default" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </form>
        </div>
    </div>
</div>
<?php endforeach; ?>
<!--END RIP Status -->

<!--Tambah Data -->
<div class="modal fade" id="tambah_data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-header-success">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3>Tambah Data Jemaat</h3>
          <h7>Keterangan : yang diberi * wajib diisi!</h7>
      </div>
        <form class="form-horizontal" onsubmit="return validateForm()" action="<?php echo base_url('AdminGereja/Jemaat/insertData')?>" method="post" enctype="multipart/form-data" role="form">
          
         
<!-- ======================================================================= -->
          <div class="jumbotron" style="background: transparent;">
            <div class="container-fluid">
               <h5 align="center"><strong> Biodata Jemaat </strong></h5> <br><br>
              <div class="row">
                <div class="col-md-4">
                  <label for="form_lastname">No. Induk*</label>
                  <input id="NoInduk" type="text" name="NoInduk" class="form-control" placeholder="Nomor Induk" data-error="Lastname is required.">
                </div>
                <div class="col-md-4 ml-auto">
                  <label for="form_lastname">NIK*</label>
                  <input id="NoKtp" type="text" name="NoKtp" class="form-control" placeholder="Nomor Induk Karyawan" data-error="Lastname is required.">
                </div>
                <div class="col-md-4 ml-auto">
                  <label for="form_lastname">No. KK*</label>
                  <input id="NoKK" type="text" name="NoKK" class="form-control" placeholder="Nomor KK" data-error="Lastname is required.">
                </div>
              </div>

              <br>
              <div class="row">
                <div class="col-md-4">
                  <label for="form_name">Nama Lengkap*</label>
                  <input id="namaLengkap" type="text" name="namaLengkap" class="form-control" placeholder="Nama Lengkap" data-error="Firstname is required.">
                </div>
                <div class="col-md-4 ml-auto">
                  <label for="form_lastname">Nama Panggilan</label>
                  <input id="NamaPanggilan" type="text" name="NamaPanggilan" class="form-control" placeholder="Nama Panggilan" data-error="Lastname is required.">
                </div>
                <div class="col-md-4 ml-auto">
                 <label for="form_lastname">Jenis Kelamin</label>
                     <div class="form-check">
                     <label>
                         <input type="radio" name="gender" value="Laki-laki" checked> <span class="label-text">Laki-laki</span>
                     </label>
                     </div>
                     <div class="form-check">
                     <label>
                         <input type="radio" name="gender" value="Perempuan"> <span class="label-text">Perempuan</span>
                     </label>
                     </div>
                </div>
              </div>  

              <br>
              <div class="row">
                <div class="col-md-4"> 
                  <label for="form_lastname">Tempat Lahir*</label>
                  <input id="tempatLahir" type="text" name="tempatLahir" class="form-control" placeholder="Tempat Lahir" data-error="Lastname is required.">
                         </div>
                <div class="col-md-4 ml-auto">
                  <label for="form_lastname">Tanggal Lahir*</label>
                  <input id="datepicker" type="text" name="tanggalLahir" class="form-control" placeholder="Tanggal Lahir" data-error="Lastname is required.">
                         </div>
<!--                 <div class="col-md-4">
                  <label class="control-label">Usia Jemaat&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <select class="form-control" name="usiaJemaat">
                        <option>--Select Usia Jemaat--</option>
                        <?php 
                          foreach ($usiaJemaat as $usj) {
                            echo "<option value='$usj[usia]'>$usj[usia]</option>";
                          }
                        ?>
                    </select>
                </div> -->
                                      <div class="col-md-4">
                        <label>Status dalam Keluarga</label>
                           <select class="form-control" name="status_keluarga">
                                    <option>--Select Status--</option>
                                    <option value="Kepala Keluarga">Kepala Keluarga</option>
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
                      <div class="col-md-4"> 
                        <label for="form_lastname">Email*</label>
                        <input id="Email" type="email" name="Email" class="form-control" placeholder="Email" data-error="Lastname is required.">
                      </div>
                      <div class="col-md-4 ml-auto">
                        <label class="control-label">Status Hidup</label>
                          <select class="form-control" name="Status">
                            <option value="Hidup"> Hidup </option>
                            <option value="Wafat">Wafat</option>                               
                          </select>
                      </div>
                      <div class="col-md-4">
                        <label class="control-label">Golongan Darah</label>
                          <select class="form-control" name="golonganDarah">
                                    <option>--Select Golongan Darah--</option>
                                    <option value="A">A</option>
                                    <option value="AB">AB</option>
                                    <option value="B">B</option>
                                    <option value="O">O</option>
                          </select>
                      </div>
                    </div>

                    <br>
                    <div class="row">
                      <div class="col-md-6"> 
                        <label class="control-label" for="Overview (max 200 words)">Alamat sesuai KTP*</label>
                          <textarea class="form-control" rows="3" id="Overview (max 200 words)" name="AlamatKTP" placeholder="Alamat sesuai KTP"></textarea>
                      </div>
                      <div class="col-md-6 ml-auto">
                        <label class="control-label" for="Overview (max 200 words)">Alamat Tinggal Sekarang*</label>               
                          <textarea class="form-control" rows="3" id="Overview (max 200 words)" name="AlamatTinggalSekarang" placeholder="Alamat"></textarea>
                      </div>
                    </div>

                    <br>
                    <div class="row">
                      <div class="col-md-4">
                        <label for="form_lastname">No Handphone</label>
                        <input id="NoTelp" type="text" name="NoTelp" class="form-control" placeholder="Nomor Handphone" data-error="Lastname is required.">
                      </div>
                      <div class="col-md-4 ml-auto">
                        <label for="form_lastname">No Telp Rumah</label>
                        <input id="NoTelp" type="text" name="NoTelprumah" class="form-control" placeholder="Nomor Rumah" data-error="Lastname is required.">
                      </div>
                      <div class="col-md-4 ml-auto">
                       <label for="form_lastname">No Telp WA</label>
                       <input id="NoTelp" type="text" name="NoTelpwa" class="form-control" placeholder="Nomor WA" data-error="Lastname is required.">
                      </div>
                    </div>

                    <br>
                    <br>
                    <div class="row">
                      <div class="col-md-6">
                        <label for="form_lastname">Nama Ayah*</label>
                        <input id="namaAyah" type="text" name="namaAyah" class="form-control" placeholder="Nama Ayah" data-error="Lastname is required.">
                      </div>
                      <div class="col-md-6 ml-auto">
                        <label for="form_lastname">Nama Ibu*</label>
                        <input id="namaIbu" type="text" name="namaIbu" class="form-control" placeholder="Nama Ibu" data-error="Lastname is required.">
                      </div>                     
                    </div>

                    <br>
                    <div class="row">
                      <div class="col-md-6">
                        <label for="form_lastname">Nama Suami</label>
                           <input id="namaSuami" type="text" name="namaSuami" class="form-control" placeholder="Nama Suami" data-error="Lastname is required.">
                      </div>
                      <div class="col-md-6 ml-auto">
                        <label for="form_lastname">Nama Istri</label>
                                                   <input id="namIstri" type="text" name="namaIstri" class="form-control" placeholder="Nama Istri" data-error="Lastname is required.">
                      </div>                     
                    </div> 

                    <br>
                    <div class="row">
                      <div class="col-md-4">
                        <label>Status Rumah Tinggal</label>
                           <select class="form-control" name="StatusRumahTinggal">
                                    <option>--Select Status Rumah--</option>
                                    <option value="Milik Sendiri">Milik Sendiri</option>
                                    <option value="Milik orang tua">Milik Orang Tua</option>
                                    <option value="Milik Saudara">Milik Saudara</option>
                                    <option value="Numpang">Numpang</option>
                                    <option value="Kontrak/Sewa">Kontrak/Sewa</option>
                                    <option value="Lain-lain">Lain-lain</option>
                                </select>
                      </div>
                      <div class="col-md-4 ml-auto">
                        <label>Pendidikan Terakhir</label>
                           <select class="form-control" name="PendidikanTerakhir">
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
                           <select class="form-control" name="PenghasilanPerBulan">
                                    <option>--Select Penghasilan--</option>
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
                            <select class="form-control" name="PekerjaanPokok">
                                    <option>--Select Pekerjaan Pokok--</option>
                                    <?php 
                                      foreach ($pekerjaan as $pkj) {
                                      echo "<option value='$pkj[nama_pp]'>$pkj[nama_pp]</option>";
                                      }
                                   ?>
                                </select>
                      </div>
                      <div class="col-md-4 ml-auto">
                       <label for="form_lastname">Pekerjaan Sampingan*</label>
                       <input id="PekerjaanSampingan" type="text" name="PekerjaanSampingan" class="form-control" placeholder="Pekerjaan Sampingan" data-error="Lastname is required.">
                      </div> 
                      <div class="col-md-4 ml-auto">
                        <label for="form_lastname">Minat Usaha*</label>
                        <input id="minatUsaha" type="text" name="minatUsaha" class="form-control" placeholder="Minat Usaha" data-error="Lastname is required.">
                      </div>                     
                    </div>    
                
                </div>
              </div>


       
<!-- ====================================================================== -->
          <div class="jumbotron" style="background: grey;">
            <div class="container-fluid" >
              <h5 align="center"><strong> Data Gerejawi Jemaat</strong></h5> <br><br>
              <div class="row">
                <div class="col-md-4">
                  <label>Gereja Sekarang</label>
                    <select class='form-control' id='gereja' name="gereja">
                      <option value='0'>--pilih--</option>
                        <?php 
                          foreach ($gereja as $grj) {
                            echo "<option value='$grj[id]'>$grj[namagereja]</option>";
                          }
                        ?>
                    </select>                               
                </div>
                <div class="col-md-4 ml-auto">
                  <label>Asal Pepanthan</label>
                    <select class='form-control' id='pepantan' name="pepantan">
                        <option value='0'>--pilih--</option>
                        <option value='Gereja Induk'>Gereja Induk</option>
                        <?php 
                            foreach ($pepantan as $pnt) {
                            echo "<option value='$pnt[id]'>$pnt[namapepantan]</option>";
                            }
                        ?>
                    </select>
                </div>
                
              </div>

              <br>
              <div class="row">
                <div class="col-md-4">
                  <label>Status Warga Gereja</label>
                    <select class="form-control" name="StatusWargaGereja">
                      <option>--Select Warga Gereja--</option>
                      <option value="Warga">Warga</option>
                      <option value="Tamu">Tamu</option>
                      <option value="Warga Belajar">Warga Belajar</option>
                    </select>                               
                </div>
                <div class="col-md-4 ml-auto">
                  <label>Tempat Kebaktian</label>
                    <select class="form-control" name="TempatKebaktian">
                              <option>--Select Tempat--</option>
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
                  <input id="pdt_baptis" type="text" name="pdt_baptis" class="form-control" placeholder="Nama Pendeta">                               
                </div>
                <div class="col-md-4 ml-auto">
                  <label for="form_lastname">Tempat Baptis</label>
                  <input type="text" name="tempat_baptis" class="form-control" placeholder="Tempat Baptis">
                </div>
                <div class="col-md-4 ml-auto">
                  <label for="form_lastname">Tanggal Baptis</label>
                  <input id="datepickerbaptis" type="text" name="tanggal_baptis" class="form-control" placeholder="Tanggal Baptis" data-error="Lasatnme is required.">
                </div>
              </div>

              <br>
              <div class="row">
                <div class="col-md-4">
                  <label for="form_lastname">Pendeta Sidhi</label>
                  <input id="pdt_sidhi" type="text" name="pdt_sidhi" class="form-control" placeholder="Pendeta Sidhi">                               
                </div>
                <div class="col-md-4 ml-auto">
                  <label for="form_lastname">Tempat Sidhi</label>
                  <input type="text" name="tempat_sidhi" class="form-control" placeholder="Tempat Sidhi">
                </div>
                <div class="col-md-4 ml-auto">
                  <label for="form_lastname">Tanggal Sidhi</label>
                  <input id="datepickersidhi" type="text" name="tanggal_sidhi" class="form-control" placeholder="Tanggal Sidhi">
                </div>
              </div>

              <br>
              <div class="row">
                <div class="col-md-4">
                  <label>Peran dalam Gereja</label>
                     <select class="form-control" name="perangereja">
                       <option>--Select Peran--</option>                     
                        <?php 
                            foreach ($peranDalamGereja as $prn) {
                            echo "<option value='$prn[nama_peran]'>$prn[nama_peran]</option>";
                            }
                        ?>      
                     </select>                               
                </div>
                <div class="col-md-4 ml-auto">
                  <label for="form_lastname">Lama menjabat majelis (tahun)</label>
                  <input type="text" name="jabat_majelis" class="form-control" placeholder="Lama Menjabat">
                </div>
                <div class="col-md-4 ml-auto">
                  <label for="form_lastname">Lama menjabat pengurus komisi (tahun)</label>
                  <input type="text" name="jabat_komisi" class="form-control" placeholder="Lama Menjabat">
                </div>
              </div>

              <br>
              <div class="row">
                <div class="col-md-4">
                  <label>Menjadi panitia dalam kegiatan gereja</label>
                     <select class="form-control" name="kegiatan_gereja">
                              <option>--Select panitia--</option>
                              <option value="1-5 kali">1-5 kali</option>
                              <option value="6-20 kali">6-20 kali</option>
                              <option value="> 10 kali">> 10 kali</option>  
                     </select>                               
                </div>                
              </div>

            </div>
          </div>


<!-- ==================================================================== -->
          <div class="jumbotron" style="background: transparent;">
            <div class="container-fluid">
              <h5 align="center"><strong> Data Marital Jemaat</strong></h5> <br><br>
              <div class="row">
                <div class="col-md-4">
                  <label for="form_lastname">Tanggal Pernikahan</label>
                  <input id="datepickerOther" type="text" name="tanggalPernikahan" class="form-control" placeholder="Tanggal Pernikahan" data-error="Lastname is required.">                               
                </div>
                <div class="col-md-4 ml-auto">
                  <label>Tata Cara Pernikahan</label>
                    <select class="form-control" name="tataCaraPernikahan">
                       <option>--Select Tempat--</option>
                       <option value="Kristiani">Kristiani</option>
                       <option value="Non Kristiani">Non Kristiani</option>
                       <option value="Lain-lain">Lain-lain</option>
                    </select>
                </div>
                      <div class="col-md-4 ml-auto">
                        <label>Status Pernikahan</label>
                           <select class="form-control" name="statusNikah">
                                   <option>--pilih--</option>
                                   <?php 
                                      foreach ($status as $stat) {
                                      echo "<option value='$stat[nama_status]'>$stat[nama_status]</option>";
                                      }
                                   ?>
                            </select>
                      </div> 

              <br>
              <div class="row">
                <div class="col-md-4">
                  <label for="form_lastname">Pendeta yang Menikahkan</label>
                  <input id="pdt_nikah" type="text" name="pdt_nikah" class="form-control" placeholder="Nama Pendeta">    
                  </div>             
                </div>
                
            </div>
          </div>

<!-- ======================================================================================== -->
          <div class="jumbotron" style="background: grey;">
            <div class="container-fluid">
              <h5 align="center"><strong> Data Keaktifan Jemaat</strong></h5> <br><br>
              <div class="row">
                <div class="col-md-4">
                  <label>Minat Pelayanan Umum</label>                        
                  <select class="form-control" name="minat_pelayanan_umum">
                      <option>--Select Pelayanan--</option>                      
                        <?php 
                            foreach ($minatPelayananUmum as $mpu) {
                            echo "<option value='$mpu[nama_pu]'>$mpu[nama_pu]</option>";
                            }
                        ?>                          
                  </select>
                </div>
                <div class="col-md-4 ml-auto">                
                  <label>Minat Pelayanan Gereja</label>
                      <select class="form-control" name="minat_pelayanan_gereja">
                          <option>--Select Minat--</option>                     
                            <?php 
                              foreach ($minatPelayananGereja as $mpg) {
                              echo "<option value='$mpg[nama_pg]'>$mpg[nama_pg]</option>";
                              }
                            ?>                            
                      </select>
                </div>
                <div class="col-md-4 ml-auto">
                  <label for="form_lastname">Pengalaman Organisasi</label>
                  <input type="text" name="pengalaman_organisasi" class="form-control" placeholder="Pengalaman Organisasi">
                </div>
              </div> 

              <br>
              <div class="row">
                <div class="col-md-4">
                
                  <label>Pengalaman Melayani Masyarakat</label>
                    <select class="form-control" name="pengalaman_melayani">
                        <option>--Select Pengalaman--</option>                                                
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
                    <textarea class="form-control" rows="3" name="gangguan_kesehatan" placeholder="Riwayat Gangguan Kesehatan"></textarea>
                </div>
              </div> 

            </div>
          </div>
          
          <div class="modal-footer">
            <input class="btn btn-primary" type="submit" value="Tambah">
            <button class="btn btn-default" data-dismiss="modal">Close</button>
          </div> 
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
$(document).ready(function () {

function validateForm() {
    if($('#namaLengkap').val() == ''){
        alert("Nama Lengkap tidak boleh kosong!!");
        return false;
    } else if($('#Email').val() == ''){
        alert("Email tidak boleh kosong!!");
        return false;
    } else if($('#NoInduk').val() == ''){
        alert("No Induk Tidak Boleh Kosong!!");
        return false;
    } else if($('#tempatLahir').val() == ''){
        alert("Tempat Lahir tidak boleh kosong!!");
        return false;
    } else if($('.tanggalLahir').val() == ''){
        alert("Tanggal Lahir tidak boleh kosong!!");
        return false;
    } else if($('#namaIbu').val() == ''){
        alert("Nama Ibu tidak boleh kosong!!");
        return false;
    }
}


</script>
