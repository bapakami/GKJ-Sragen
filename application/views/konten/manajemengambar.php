<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manajemen Gambar</h3>
              </div>

             
            </div>

            <div class="clearfix"></div>


              <div class="">
                <div class="x_panel">
                  <div class="x_content">
                    

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

                    <a class="btn btn-primary" href="#tambah_data" data-toggle="modal" style="width: 170px;text-align:left;margin:10px;"><i class="fa fa-fw fa-plus">Tambah Gambar Baru</i></a>
                    <div style="overflow-x: auto;">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Gallery</th>
                          <th>Name</th>
                          <th>Image File</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>

                     
                          <tbody>
                            <?php $i=1; foreach ($isi as $data) { ?>
                            <tr>
                              <td><?= $data->namagereja ?></td>
                              <td><?= $data->nama ?></td>
                              <td><img src="<?php echo base_url('gallery/'.$data->file); ?>" style="width:250px; height:auto; z-index:2000;" class="img-responsive img-thumbnail"></td>
                              <td>
                                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#edit_data<?= $data->id ?> " >Edit</button>
                                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#hapus_data<?= $data->id ?> " >Hapus</button>
                              </td>
                            </tr>
                      <div class="modal fade" id="edit_data<?= $data->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" >
                                  <div class="modal-content" >
                                    <div class="modal-header modal-header-success">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                      <h3>Edit Data Gambar</h3>
                                    </div>
                                    <form class="form-horizontal" action="<?php echo base_url('manajemengambar/updateData')?>" method="post" enctype="multipart/form-data" role="form">
                                      <input type="hidden" name="idedit" value="<?= $data->id ?>">
                                        <div class="modal-body">
                                          <div class = "col-md-12">
                                            <div class = "col-md-6">
                                              <div class="form-group col-md-12">
                                              <label>Gallery</label>
                                                <select class='form-control' id='gereja' name="gereja_edit">
                                                   <option value='<?=$data->gallery_id?>'><?=$data->namagereja?></option>
                                                      <?php 
                                                        foreach ($gereja as $grj) {
                                                          echo "<option value='$grj[id]'>$grj[namagereja]</option>";
                                                        }
                                                      ?>
                                                </select>
                                              </div>

                                              <br>
                                              <div class="form-group col-md-12">
                                                <label for='text'>Name </label>
                                                <input id="form_name" type="text" name="name_edit" class="form-control" placeholder="Nama" value="<?= $data->nama ?>" required="required">
                                              </div>
                                              <br>
                                              <div class="form-group col-md-12">
                                                <input type="file" onchange="readURL_edit(this);" name="filefoto_edit" >
                                                <input type="hidden"  id="old_name"  name="old_name" value="<?=$data->file?>">
                                              </div>
                                            </div> <!--Col MD 6 -->
                                            <div class="col-md-6">
                                              <div class="form-group col-md-12">
                                               <label style="width: 475px; height:400px;"><img alt="Image Display Here" id="test_edit" src="<?php echo base_url('gallery/'.$data->file); ?>" style="width:475px; height:400px; z-index:2000;" class="img-responsive img-thumbnail"></label>
                                              </div>
                                            </div>
                                         </div> <!--Col MD 12 -->
                                        </div>
                                        <div class="modal-footer">
                                        <input class="btn btn-primary"  type="submit" value="Update">
                                        <button class="btn btn-default" data-dismiss="modal">close</button>
                                    
                                        </div>
                                    </form>
                                  </div>
                                </div>
                      </div>
                      <!--MODAL HAPUS-->
                      <div class="modal fade" id="hapus_data<?= $data->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                                          <h4 class="modal-title" id="myModalLabel">Hapus Gallery Gambar</h4>
                                  </div>
                                    <form class="form-horizontal">
                                         <div class="modal-body">                                        
                                            <input type="hidden" name="kode" id="textkode" value="<?=$data->id?>">
                                                 <div class="alert alert-danger"><p>Apakah Anda yakin mau menghapus data ini?</p></div>               
                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                             <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                                         </div>
                                    </form>
                              </div>
                          </div>
                      </div>

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
          <div class="modal-dialog modal-lg" >
            <div class="modal-content" >
              <div class="modal-header modal-header-success">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3>Tambah Data Gambar</h3>
              </div>
              <form class="form-horizontal" action="<?php echo base_url('manajemengambar/insertData')?>" method="post" enctype="multipart/form-data" role="form">
                  <div class="modal-body">
                    <div class = "col-md-12">
                      <div class = "col-md-6">
                        <div class="form-group col-md-12">
                        <label>Gallery</label>
                          <select class='form-control' id='gereja' name="gereja">
                              <option value='0'>--pilih--</option>
                                <?php 
                                  foreach ($gereja as $grj) {
                                    echo "<option value='$grj[id]'>$grj[namagereja]</option>";
                                  }
                                ?>
                          </select>
                        </div>

                        <br>
                        <div class="form-group col-md-12">
                          <label for='text'>Name </label>
                          <input id="form_name" type="text" name="name" class="form-control" placeholder="Nama" required="required" data-error="Firstname is required.">
                        </div>
                        <br>
                        <div class="form-group col-md-12">
                          <input type="file" onchange="readURL(this);" name="filefoto">
                        </div>
                      </div> <!--Col MD 6 -->
                      <div class="col-md-6">
                        <div class="form-group col-md-12">
                         <label style="width: 475px; height:400px;"><img alt="Image Display Here" id="test" src="<?php echo base_url();?>assets/img/user-default.png" style="width:475px; height:400px; z-index:2000;" class="img-responsive img-thumbnail"></label>
                        </div>
                      </div>
                    </div> <!--Col MD 12 -->
                  </div>
                  <div class="modal-footer">
                  <input class="btn btn-primary"  type="submit" value="Tambah">
                  <button class="btn btn-default" data-dismiss="modal">close</button>
              
                  </div>
              </form>
            </div>
          </div>
        </div>

        <script>
        $(window).on("load resize ", function() {
          var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
          $('.tbl-header').css({'padding-right':scrollWidth});
        }).resize();

        function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
              reader.onload = function (e) {
                $('#test').attr('src', e.target.result);
              }
                reader.readAsDataURL(input.files[0]);
                }
            }

        function readURL_edit(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
              reader.onload = function (e) {
                $('#test_edit').attr('src', e.target.result);
              }
                reader.readAsDataURL(input.files[0]);
                }
            }

              //Hapus Barang
            $('#btn_hapus').on('click',function(){
                var kode=$('#textkode').val();
                $.ajax({
                type : "POST",
                url  : "<?php echo base_url('manajemengambar/hapusData')?>",
                dataType : "JSON",
                    data : {kode: kode},
                        success: function(data){
                            $('#hapus_data').modal('hide');
                            window.location.reload();
                        }
                    });
                    return false;
                });
        </script>