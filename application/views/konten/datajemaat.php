<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manajemen Jemaat</h3>
              </div>

             
            </div>

            <div class="clearfix"></div>


              <div class="">
                <div class="x_panel">
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Berikut ini adalah daftar jemaat yang ada di GKJ Klasis
                    </p>

                    <div class="title_right">
                      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Masukkan nama pemakai yang akan dicari">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Cari</button>
                          </span>
                        </div>
                      </div>
                    </div>

                  <button class="btn btn-primary"><i class="fa fa-fw fa-print"></i>Cetak</button>
                  <a class="btn btn-primary" href="#tambah_data" data-toggle="modal" style="width: 170pX><i class="fa fa-fw fa-plus">Tambah Jemaat</i></a>

                  <!-- <div style="overflow-x: auto;"> -->
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" >
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Nama Panggilan</th>
                          <th>No KTP</th>
                          <th>No KK</th>
                          <th>Tmpt/Tgl Lahir</th>
                          <th>Gender</th>
                          <th>Alamat Tinggal</th>
                          <th>Gereja Sekarang</th>
                          <th>Nomor Telepon</th>
                          <th>No. Buku Induk</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>

                        <tbody>
                        <?php $i=1; foreach ($isi as $data) { ?>
                         
                        <div class="modal fade" id="hapus_data<?= $data->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content" style="width: 440px">
                              <div class="modal-header modal-header-success">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                <h3>Hapus Data</h3>
                              </div>
                              <form class="form-horizontal" action="<?php echo base_url('manajemenberita/hapusData')?>" method="post" enctype="multipart/form-data" role="form">
                                    <input type="hidden" name="idhapus" value="<?= $data->id ?>">
                                  <div class="modal-body">
                                    <p>Apakah Anda Ingin Menghapus Data Ini?</p>
                                  </div>
                                  <div class="modal-footer">
                                    <input class="btn btn-primary"  type="submit" value="Hapus">
                                    <button class="btn btn-default" data-dismiss="modal">close</button>
                                  </div>
                              </form>
                            </div>
                          </div>
                        </div>

                        <tr>
                          <td><?= $data->nama ?></td>
                          <td><?= $data->namapanggilan ?></td>
                          <td><?= $data->ktp ?></td>
                          <td><?= $data->kk ?></td>
                          <td><?= $data->tempat_lahir." ".$data->tgl_lahir ?></td>
                          <td><?= $data->gender ?></td>
                          <td><?= $data->alamat ?></td> 
                          <td><?= $data->namagereja ?></td>
                          <td><?= $data->notelp ?></td> 
                          <td><?= $data->buku_induk ?></td>
                          <td>
                            <!-- <button class="btn btn-default" type="button" data-toggle="modal" data-target="#edit_data<?= $data->id ?> " >Edit</button> -->
                            <button class="btn btn-default" type="button" data-toggle="modal" data-target="#edit_data<?= $data->id ?> " >Detail</button>
                            <button class="btn btn-default" type="button" data-toggle="modal" data-target="#hapus_data<?= $data->id ?> " >Hapus</button>
                          </td>

                        </tr>
                           <?php $i++;}  ?>
                      </tbody>


                    </table>
                  </div>
                   
                   <div class="row">
                     <div class="col">
                         <!--Tampilkan pagination-->
                         <?php echo $pagination; ?>
                     </div>
                   </div>
          
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

       <div class="modal fade" id="tambah_data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-lg">
                   <div class="modal-content">
                       <div class="modal-header modal-header-success">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3>Tambah Jemaat</h3>
                       </div>
                   <form class="form-horizontal" action="<?php echo base_url('Datajemaat/insertData')?>" method="post" enctype="multipart/form-data" role="form">
                       <div class="modal-body">
               <!-- <div class="row"> -->
                   <div class="col-md-6">
                       <div class="form-group">
                           <div class="input-group col-md-10">
                           <label for="form_name">Nama Lengkap</label>
                           <input id="form_name" type="text" name="name" class="form-control" placeholder="Nama Lengkap" required="required" data-error="Firstname is required.">
                           </div>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div class="form-group">
                           <div class="input-group col-md-10">
                           <label for="form_lastname">Nama Panggilan</label>
                           <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Nama Panggilan" required="required" data-error="Lastname is required.">
                           </div>
                       </div>
                   </div>
               <!-- </div> -->

                   <div class="col-md-6">
                       <div class="form-group">
                           <div class="input-group col-md-10">
                           <label for="form_lastname">Email</label>
                           <input id="form_lastname" type="email" name="surname" class="form-control" placeholder="Email" required="required" data-error="Lastname is required.">
                           </div>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div class="form-group">
                           <div class="input-group col-md-10">
                           <label for="form_lastname">No. Induk</label>
                           <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Nomor Induk" required="required" data-error="Lastname is required.">
                           </div>
                       </div>
                   </div>

                   <div class="col-md-6">
                       <div class="form-group">
                           <div class="input-group col-md-10">
                           <label for="form_lastname">No. KTP</label>
                           <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Nomor KTP" required="required" data-error="Lastname is required.">
                           </div>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div class="form-group">
                           <div class="input-group col-md-10">
                           <label for="form_lastname">No. KK</label>
                           <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Nomor KK" required="required" data-error="Lastname is required.">
                           </div>
                       </div>
                   </div>

                   <div class="col-md-6">
                       <div class="form-group">
                           <div class="input-group col-md-10">
                           <label for="form_lastname">Gender</label>
                               <div class="form-check">
                               <label>
                                   <input type="radio" name="check" checked> <span class="label-text">Pria</span>
                               </label>
                               </div>
                               <div class="form-check">
                               <label>
                                   <input type="radio" name="check"> <span class="label-text">Wanita</span>
                               </label>
                               </div>
                           </div>
                       </div>
                   </div>
                   
                   <div class="col-md-6">
                       <div class="form-group">
                           <div class="input-group col-md-10">
                           <label for="form_lastname">Status Pernikahan</label>
                               <div class="form-check">
                               <label>
                                   <input type="radio" name="check" checked> <span class="label-text">Belum Menikah</span>
                               </label>
                               </div>
                               <div class="form-check">
                               <label>
                                   <input type="radio" name="check"> <span class="label-text">Menikah</span>
                               </label>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div class="form-group">
                           <div class="input-group col-md-10">
                           <label for="form_lastname">Tempat Lahir</label>
                           <input id="tempat_lahir" type="text" name="tempatlahir" class="form-control" placeholder="Tempat Lahir" required="required" data-error="Lastname is required.">
                           </div>
                       </div>
                   </div>
                  
                   <div class="col-md-6">
                       <div class="form-group">
                           <div class="input-group col-md-10">
                           <label for="form_lastname">Tanggal Lahir</label>
                           <input id="datepicker" type="text" name="tanggallahir" class="form-control" placeholder="Tanggal Lahir" required="required" data-error="Lastname is required.">
                           </div>
                       </div>
                   </div>
                    
                  <div class="col-md-6">
                       <div class="form-group">
                           <label>Usia Jemaat</label>
                               <div class="col-md-10">
                                           
                                   <select class="form-control" name="divisi_magang">
                                       <option>--Select Usia--</option>
                                      <option value="<12 th">12 th</option>
                                       <option value="13-17 th">13-17 th</option>
                                       <option value="18-25th">18-25th</option>
                                       <option value="26-40 th">26-40 th</option>
                                       <option value="41-60 th">41-60 th</option>
                                       <option value=">60 th">60 th</option>
                                   </select>
                                           
                               </div>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div class="form-group">
                           <label>Golongan Darah</label>
                               <div class="col-md-10">
                                           
                                   <select class="form-control" name="divisi_magang">
                                       <option>--Select Golongan Darah--</option>
                                       <option value="A">A</option>
                                       <option value="AB">AB</option>
                                       <option value="B">B</option>
                                       <option value="O">O</option>
                                   </select>
                                           
                               </div>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div class="form-group">
                           <div class="input-group col-md-10">
                           <label for="form_lastname">Nama Ayah</label>
                           <input id="nama_ayah" type="text" name="tempatlahir" class="form-control" placeholder="Nama Ayah" required="required" data-error="Lastname is required.">
                           </div>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div class="form-group">
                           <div class="input-group col-md-10">
                           <label for="form_lastname">Nama Ibu</label>
                           <input id="nama_ibu" type="text" name="tempatlahir" class="form-control" placeholder="Nama Ibu" required="required" data-error="Lastname is required.">
                           </div>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div class="form-group">
                           <div class="input-group col-md-10">
                           <label for="form_lastname">Nama Suami</label>
                           <input id="nama_ayah" type="text" name="tempatlahir" class="form-control" placeholder="Nama Suami" required="required" data-error="Lastname is required.">
                           </div>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div class="form-group">
                           <div class="input-group col-md-10">
                           <label for="form_lastname">Nama Istri</label>
                           <input id="nama_ibu" type="text" name="tempatlahir" class="form-control" placeholder="Nama Istri" required="required" data-error="Lastname is required.">
                           </div>
                       </div>
                   </div>
                   <div class="col-md-12">
                       <div class="form-group">
                           <div class="input-group col-md-5">
                           <label for="form_lastname">Nama Anak</label>
                           <input id="nama_ibu" type="text" name="tempatlahir" class="form-control" placeholder="Nama Anak" required="required" data-error="Lastname is required.">
                           </div>
                       </div>
                   </div>
                   <div class="col-md-5">
                       <div class="form-group">
                           <label class="control-label" for="Overview (max 200 words)">Alamat KTP</label>
                                              
                                   <textarea class="form-control" rows="3" id="Overview (max 200 words)" name="Alamat" placeholder="Alamat sesuai KTP"></textarea>
                               
                       </div> 
                   </div>
                   <div class="col-md-1">
                       
                   </div>
                   <div class="col-md-5">
                       <div class="form-group">
                           <label class="control-label" for="Overview (max 200 words)">Alamat Tinggal Sekarang</label>               
                                   <textarea class="form-control" rows="3" id="Overview (max 200 words)" name="Alamat" placeholder="Alamat"></textarea>
                       </div> 
                   </div>
                   <div class="col-md-12">
                       <div class="form-group">
                           <div class="input-group col-md-5">
                           <label for="form_lastname">No Telp</label>
                           <input id="nama_ibu" type="text" name="tempatlahir" class="form-control" placeholder="Nomor Telepon" required="required" data-error="Lastname is required.">
                           </div>
                       </div>
                   </div>
                   <div class="col-md-3">
                       <div class="form-group">
                           <label>Status Rumah Tinggal</label>
                               <div class="col-md-10">
                                           
                                   <select class="form-control" name="divisi_magang">
                                       <option>--Select Status Rumah--</option>
                                       <option value="Milik Sendiri">Milik Sendiri</option>
                                       <option value="Milik orang tua">Milik Orang Tua</option>
                                       <option value="Milik Saudara">Milik Saudara</option>
                                       <option value="Numpang">Numpang</option>
                                       <option value="Numpang">Kontrak/Sewa</option>
                                       <option value="Numpang">Lain-lain</option>
                                   </select>
                                           
                               </div>
                       </div>
                   </div>
                   <div class="col-md-3">
                       <div class="form-group">
                           <label>Pendidikan Terakhir</label>
                               <div class="col-md-10">
                                           
                                   <select class="form-control" name="divisi_magang">
                                       <option>--Select Pendidikan Terakhir--</option>
                                       <option value="Tidak sekolah">Tidak sekolah</option>
                                       <option value="SD">SD</option>
                                       <option value="SMP">SMP</option>
                                       <option value="SMA">SMA</option>
                                       <option value="D1">D1</option>
                                       <option value="D2">D2</option>
                                       <option value="D3">D3</option>
                                       <option value="D4">D4</option>
                                       <option value="Sarjana">Sarjana</option>
                                       <option value="S2">S2</option>
                                       <option value="S3">S3</option>
                                       <option value="Lain-lain">Lain-lain</option>
                                   </select>
                                           
                               </div>
                       </div>
                   </div>
                   <div class="col-md-3">
                       <div class="form-group">
                           <label>Penghasil Per bulan</label>
                               <div class="col-md-10">
                                           
                                   <select class="form-control" name="divisi_magang">
                                       <option>--Select Penghasilan--</option>
                                       <option value="<500.000"><500.000</option>
                                       <option value="500.000s.d<1.000.000">500.000s.d<1.000.000</option>
                                       <option value="1000.000s.d<2.000.000">1000.000s.d<2.000.000</option>
                                       <option value="2000.000s.d<3.000.000">2000.000s.d<3.000.000</option>
                                       <option value="3000.000s.d<4.000.000">3000.000s.d<4.000.000</option>
                                       <option value=">4000.000">>4000.000</option>
                                   </select>
                                           
                               </div>
                       </div>
                   </div>
                   <div class="col-md-3">
                       <div class="form-group">
                           <label>Pekerjaan Pokok</label>
                               <div class="col-md-10">
                                           
                                   <select class="form-control" name="divisi_magang">
                                       <option>--Select Pekerjaan Pokok--</option>
                                       <option value="Belum bekerja">Belum bekerja</option>
                                       <option value="Tidak bekerja">Tidak bekerja</option>
                                       <option value="PNS">PNS</option>
                                       <option value="TNI/Polri">TNI/Polri</option>
                                       <option value="DPR">DPR</option>
                                       <option value="Wiraswasta">Wiraswasta</option>
                                       <option value="Swasta">Swasta</option>
                                       <option value="Pensiunan">Pensiunan</option>
                                       <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                       <option value="Perangkat Desa">Perangkat Desa</option>
                                       <option value="Petani">Petani</option>
                                       <option value="Nelayan">Nelayan</option>
                                       <option value="Buruh">Buruh</option>
                                       <option value="Mengurus rumah tangga">Mengurus rumah tangga</option>
                                       <option value="Pedagang">Pedagang</option>
                                       <option value="Lain-lain">Lain-lain</option>
                                   </select>
                                           
                               </div>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div class="form-group">
                           <div class="input-group col-md-10">
                           <label for="form_lastname">Pekerjaan Sampingan</label>
                           <input id="nama_ayah" type="text" name="tempatlahir" class="form-control" placeholder="Pekerjaan Sampingan" required="required" data-error="Lastname is required.">
                           </div>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div class="form-group">
                           <div class="input-group col-md-10">
                           <label for="form_lastname">Minat Usaha</label>
                           <input id="nama_ibu" type="text" name="tempatlahir" class="form-control" placeholder="Minat Usaha" required="required" data-error="Lastname is required.">
                           </div>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div class="form-group">
                           <label>Gereja Sekarang</label>
                               <div class="col-md-10">
                                           
                               <select class='form-control' id='gereja' name="gereja">
                                   <option value='0'>--pilih--</option>
                                   <?php 
                                       foreach ($gereja as $grj) {
                                       echo "<option value='$grj[id]'>$grj[namagereja]</option>";
                                       }
                                   ?>
                               </select>
                                           
                               </div>
                       </div>
                   </div>
                   <div class="col-md-3">
                       <div class="form-group">
                           <label>Status Warga Gereja</label>
                               <div class="col-md-10">
                                           
                                   <select class="form-control" name="divisi_magang">
                                       <option>--Select Warga Gereja--</option>
                                       <option value="Warga">Warga</option>
                                       <option value="Tamu">Tamu</option>
                                       <option value="Warga Belajar">Warga Belajar</option>                            
                                   </select>
                                           
                               </div>
                       </div>
                   </div>
                   <div class="col-md-3">
                       <div class="form-group">
                           <label>Tempat Kebaktian</label>
                               <div class="col-md-10">
                                           
                                   <select class="form-control" name="divisi_magang">
                                       <option>--Select Tempat--</option>
                                       <option value="Warga">Induk</option>
                                       <option value="Tamu">Wilayan</option>
                                       <option value="Warga Belajar">Gereja</option>                            
                                   </select>
                                           
                               </div>
                       </div>
                   </div>

                   <div class="col-md-6">
                       <div class="form-group">
                           <div class="input-group col-md-10">
                           <label for="form_lastname">Tanggal Pernikahan</label>
                           <input id="datepicker" type="text" name="tanggallahir" class="form-control" placeholder="Tanggal Pernikahan" required="required" data-error="Lastname is required.">
                           </div>
                       </div>
                   </div>

                   <div class="col-md-3">
                       <div class="form-group">
                           <label>Tata Cara Pernikahan</label>
                               <div class="col-md-10">
                                           
                                   <select class="form-control" name="divisi_magang">
                                       <option>--Select Tempat--</option>
                                       <option value="Kristiani">Kristiani</option>
                                       <option value="Non Kristiani">Non Kristiani</option>
                                       <option value="Lain-lain">Lain-lain</option>                            
                                   </select>
                                           
                               </div>
                       </div>
                   </div>
                   <br><br><br>
                       <div class="modal-footer">
                           <input class="btn btn-primary" type="submit" value="Tambah">
                           <button class="btn btn-default" data-dismiss="modal">Close</button>
                       </div> 
                   </div>
                   </form>
                   </div><!-- /.modal-content -->
               </div><!-- /.modal-dialog -->
       </div><!-- /.modal -->

       <script>
       $(window).on("load resize ", function() {
         var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
         $('.tbl-header').css({'padding-right':scrollWidth});
       }).resize();
       </script>