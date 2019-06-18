    <style type="text/css">
     table{
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
      }

      td, th {
        border: 1px solid #dddddd;
        text-align: left;
      }
   </style>
   
 <div class="content-wrapper">
        <!--personal-info-->
        <!-- Main content -->
  <section class="content">
          <div class="narrow col-md-12">
            <div class="row">
              <div class="box">
                <div class="box-body">
                  <h3>Manajemen Akun Pemakai</h3><br>
                  <p>Berikut ini adalah daftar akun pemakai sistem. Anda dapat menambahkan akun baru, mengubah akun yang sudah ada atau menghapus akun pemakai yang sudah tidak aktif lagi.</p>
                  <!-- <div> -->
                   
                  <!-- </div> -->
                </div>
              </div> <!--Tutup BOX -->
            </div>
          <!-- </div>

      
          <div class="narrow col-md-12"> -->
           <!--  <div class="box"> -->
                <ul class="nav top-menu" >
                      <li>
                        <form class="navbar-form">
                          <input class="form-control" placeholder="Masukkan nama pemakai yang akan dicari" type="text" style="width: 350px;">
                          <button class="icon"><i class="fa fa-search"></i>Cari</button>
                          <a class="btn btn-primary" href="#tambah_data" data-toggle="modal" style="width: 170px;text-align:left;margin:10px;"><i class="fa fa-fw fa-plus">Tambah Akun Baru</i></a>
                        </form>
                      </li>
                    </ul>
             <!--  </div> -->

              <div class="box-body">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th rowspan="2">Username</th>
                      <th rowspan="2">Nama Lengkap</th>
                      <th rowspan="2">email</th>
                      <th rowspan="2">No. Telp</th>
                      <th rowspan="2">Asal Gereja</th>
                      <th rowspan="2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
      <?php $i=1; foreach ($isi as $data) { ?>
    <!--EDIT DATA -->
      <div class="modal fade" id="edit_data<?= $data->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header modal-header-success">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
              <h3>Edit Akun Pemakai</h3>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('manajemenakun/editData')?>" method="post" enctype="multipart/form-data" role="form">
              <input type="hidden" name="idedit" value="<?= $data->id ?>">
              <div class="modal-body">
                  <div class="form-group col-md-12">
                    <div class="input-group col-md-10">
                      <label><img alt="Image Display Here" id="test_edit" src="<?php echo base_url('gallery/akun/'.$data->foto); ?>" style="width:155px; height:150px;" class="img-responsive img-thumbnail"></label>
                      <input type="hidden"  id="old_name"  name="old_name" value="<?=$data->foto?>">
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <div class="input-group col-md-5">
                      <label>Gambar</label>
                      <input id="foto" onchange="readURL_edit(this);" name="filefoto_edit" class="form-control" type="File" />
                    </div>
                  </div>

                  <div class="form-group col-md-6">
                    <div class="input-group col-md-10">
                      <label for='text'>Fullname</label>
                      <input id="fullname" name="fullname_edit" value="<?= $data->fullname ?>" class="form-control" type="text" required="" />
                    </div>
                  </div>

                  <div class="form-group col-md-6">
                    <div class="input-group col-md-10">
                      <label>Username</label>
                      <input id="username" name="username_edit" value="<?= $data->username ?>" class="form-control" type="text" required="" />
                    </div>
                  </div>              
                      <br>
                  <div class="form-group col-md-6">
                      <div class="input-group col-md-10">
                        <label>Status Aktif Akun Pemakai</label>
                          <select class="form-control" name="status_aktif_edit">
                            <?php 
                            if($data->active == 1){
                              echo "<option value='1' selected>Aktif</option>";
                              echo "<option value='0'>Tidak Aktif</option>";
                            }else{
                               echo "<option value='1'>Aktif</option>";
                              echo "<option value='0' selected>Tidak Aktif</option>";
                            } 
                            ?>
                          </select>
                      </div>
                  </div>
                      <br>
                  <div class="form-group col-md-6">
                      <div class="input-group col-md-10">
                          <label>User Group</label>
                            <select class='form-control' name="user_group_edit">
                              <option value='<?=$data->group?>'><?=$data->groupname?></option>
                                <?php 
                                foreach ($group as $grp) {
                                     echo "<option value='$grp[id]'>$grp[groupname]</option>";

                                   } ?>
                            </select>

                      </div>
                  </div>
                      <br>
                  <div class="form-group col-md-6">
                      <div class="input-group col-md-10">
                          <label>Telephone</label>
                          <input id="telephone" value="<?=$data->telp?>" name="telephone_edit" class="form-control" type="Text" required="" />
                      </div>
                  </div>
                      <br>
                  <div class="form-group col-md-6">
                      <div class="input-group col-md-10">
                          <label>Email</label>
                            <input id="email" value="<?=$data->email?>" name="email_edit" class="form-control" type="text" />
                      </div>
                  </div>
                    <br>

                      <br>
                  <div class="form-group col-md-12">
                      <div class="input-group col-md-5">
                        <label>Asal Gereja</label>
                        <select class='form-control' id='gereja' name="gereja_edit">
                          <option value='<?=$data->gerejaid?>'><?=$data->nama_gereja?></option>
                              <?php 
                                foreach ($gereja as $grj) {
                                  echo "<option value='$grj[id]'>$grj[namagereja]</option>";
                                }
                              ?>
                        </select>
                      </div>
                  </div>      
                    <br>
                  <div class="modal-footer">
                      <span id='error'></span>
                      <button class="btn btn-primary">Update</button>
                      <button class="btn btn-default" data-dismiss="modal">close</button>
                  </div>                
              </div>
          </form>
        </div>
       </div>
      </div>
    <!--tutup EDIT DATA -->
    <!--UBAH PASSWORD -->
      <div class="modal fade" id="ubah_password<?= $data->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header modal-header-success">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
              <h3>Edit Password</h3>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('manajemenakun/ubahPassword')?>" method="post" enctype="multipart/form-data" role="form">
              <input type="hidden" name="ubahpassword_id" value="<?= $data->id ?>">
              <div class="modal-body">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="input-group col-md-12">
                        <label>Password</label>
                        <input id="password_edit" name="password_edit" class="form-control" placeholder="Password" type="Password" required="" />
                      </div>
                    </div>
                  </div>
                <br>
                <br>
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="input-group col-md-12">
                        <label>Re-Type Password</label>
                        <input id="confirm_password_edit" name="confirm_password_edit" placeholder="Re-Type Password" class="form-control" type="Password" required="" />
                        
                      </div>
                      <span id='message_edit'></span>
                    </div>
                  </div>
                    <br>
                    <br>
                  <div class="modal-footer">
                      <button class="btn btn-primary" id="ubah_password">Update</button>
                      <button class="btn btn-default" data-dismiss="modal">close</button>
                  </div>                
              </div>
          </form>
        </div>
       </div>
      </div>
      
    <!--TUTUP HAPUS PASSWORD -->
    <!--HAPUS DATA -->
      <div class="modal fade" id="hapus_data<?= $data->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content" style="width: 440px">
            <div class="modal-header modal-header-success">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
              <h3>Hapus Data</h3>
            </div>
            <form class="form-horizontal">
              <input type="hidden" name="kode" id="textkode" value="<?=$data->id?>">
              <div class="modal-body">
                <p>Apakah Anda Ingin Menghapus Data Ini?</p>

                </div>
                <div class="modal-footer">
                 <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                <button class="btn btn-default" data-dismiss="modal">close</button>
                </div>
          </form>
        </div>
       </div>
      </div>
    <!--TUTUP HAPUS DATA -->
      <tr>
        <td><?= $data->username ?></td>
        <td><?= $data->fullname ?></td>
        <td><?= $data->email ?></td>
        <td><?= $data->telp?></td>
        <td><?= $data->nama_gereja ?></td>
        <td>
          <button class="btn btn-default" type="button" data-toggle="modal" data-target="#edit_data<?= $data->id ?> " >Edit</button>
          <button class="btn btn-default" type="button" data-toggle="modal" data-target="#hapus_data<?= $data->id ?> " >Hapus</button>
          <button class="btn btn-default" type="button" data-toggle="modal" data-target="#ubah_password<?= $data->id ?> " >Ubah Password</button>
        </td>

      </tr>
         <?php $i++;}  ?>
    </tbody>
                </table>
                <div class="row">
                  <div class="col">
                      <!--Tampilkan pagination-->
                      <?php echo $pagination; ?>
                  </div>
                </div>
              </div> <!--Tutup Box Body -->
              
            </div>
          </div>
  </section><!-- /.content -->
        

</div><!-- /.content-wrapper -->

<div class="modal fade" id="tambah_data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-header-success">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3>Tambah Data</h3>
      </div>
    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Middle Name / Initial</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="female"> Female
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
  </div>
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
$('#btn_tambah').prop('disabled', true);
$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
    $('#btn_tambah').prop('disabled', false);
  } else {
    $('#btn_tambah').prop('disabled', true);
    $('#message').html('Not Matching').css('color', 'red');
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

    //Hapus Barang
    $('#btn_hapus').on('click',function(){
        var kode=$('#textkode').val();
        $.ajax({
        type : "POST",
        url  : "<?php echo base_url('manajemenakun/hapusData')?>",
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
