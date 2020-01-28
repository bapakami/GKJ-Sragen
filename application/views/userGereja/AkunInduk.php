  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manajemen Akun <?= $NamaGereja?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Fasilitas </a></li>
        <li class="active">Manajemen Akun </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">


            <div class="box-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#tambah_data"><span class="fa fa-plus"></span> Tambah Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-striped table-bordered table-responsive" style="width:100%;font-size:13px;">
                <thead>
                <tr>
                    <th style="width:38px;">#</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>No. Telp</th>
                    <th>Status Akun</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                            $no = 0;
                             foreach ($data->result_array() as $i) :
                                    $no++;
                                    $id = $i['id'];                                    
                                    $username = $i['username'];
                                    $fullname = $i['fullname'];
                                    $email = $i['email'];                                    
                                    $telpno = $i['telpno'];
                                    if($i['active'] == 0)
                                      $statusAkun = 'Tidak Aktif';
                                    else
                                      $statusAkun = 'Aktif';
                         ?>
                <tr>
                    <td style="text-align:left;width:38px;"><?php echo $no; ?></td>
                    <td><?php echo $username; ?></td>
                    <td><?php echo $fullname; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $telpno; ?></td>
                    <td> <?= $statusAkun; ?> </td>
                    <td style="text-align:center;"> 
                        <span data-toggle="tooltip" data-placement="top" data-original-title="Lihat Detail ">
                          <a data-toggle="modal" data-target="#detail_data<?php echo $id; ?>">
                            <button type="button" class="btn btn-white btn-xs" title="View Details"><i class="fa fa-eye"> Detail</i></button>
                          </a>
                        </span> 
                        <span data-toggle="tooltip" data-placement="top" data-original-title="Edit">
                          <a data-toggle="modal" data-target="#edit_data<?php echo $id; ?>">
                            <button type="button" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-pencil"></i> Edit</button>
                          </a>
                        </span> 
                        <span data-toggle="tooltip" data-placement="top" data-original-title="Hapus">
                          <a data-toggle="modal" data-target="#ModalHapus<?php echo $id; ?>">
                            <button type="button" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash"></i> Hapus</button>
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

<?php foreach ($data->result_array() as $i) :
    $id = $i['id'];
    $username = $i['username'];
    $fullname = $i['fullname'];
    $email = $i['email'];  
    $active = $i['active'];                                    
    $telpno = $i['telpno'];
    $namagereja = $i['namagereja'];
   
    $groupname = $i['groupname'];
?>
<!--EDIT DATA -->
<div class="modal fade" id="edit_data<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-header-success">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          <h3>Edit Akun Pemakai</h3>
        </div>
        <form class="form-horizontal" action="<?php echo base_url('AdminGereja/Manajemenakun/editData')?>" method="post" enctype="multipart/form-data" role="form">
          <input type="hidden" name="idedit" value="<?php echo $id; ?>">
          <div class="modal-body">
              <div class="form-group col-md-6">
                <div class="input-group col-md-10">
                  <label>Username</label>
                  <input id="username_edit" name="username_edit" value="<?php echo $username; ?>" class="form-control" type="text" required="" />
                </div>
              </div>
              <div class="form-group col-md-6">
                <div class="input-group col-md-10">
                  <label for='text'>Fullname</label>
                  <input id="fullname_edit" name="fullname_edit" value="<?php echo $fullname; ?>" class="form-control" type="text" required="" />
                </div>
              </div>              
                  <br>
              <div class="form-group col-md-6">
                  <div class="input-group col-md-10">
                      <label>User Group</label>
                        <select class='form-control' name="user_group_edit" >
                          <option value='1'>Gereja Induk</option>   
                        </select>
                  </div>
              </div>
                  <br>
              <div class="form-group col-md-6">
                  <div class="input-group col-md-10">
                      <label>Telephone</label>
                      <input id="telephone_edit" value="<?php echo $telpno; ?>" name="telephone_edit" class="form-control" type="Text" required="" />
                  </div>
              </div>
                  <br>
              <div class="form-group col-md-6">
                  <div class="input-group col-md-10">
                      <label>Email</label>
                        <input id="email_edit" value="<?php echo $email; ?>" name="email_edit" class="form-control" type="text" required=""/>
                  </div>
              </div>
                <br>
                <br>
              <div class="modal-footer">
                  <span id='error'></span>
                   <button class="btn btn-info" type="submit">Update</button>
                  <button class="btn btn-default" data-dismiss="modal">close</button>
              </div>                
          </div>
      </form>
    </div>
   </div>
</div>
<!--tutup EDIT DATA -->
<?php endforeach; ?>


<?php foreach ($data->result_array() as $i) :
    $id = $i['id'];
    $username = $i['username'];
    $fullname = $i['fullname'];
    $email = $i['email'];  
    $active = $i['active'];                                    
    $telpno = $i['telpno'];
    $namagereja = $i['namagereja'];
   
    $groupname = $i['groupname'];
?>
<!--DETAIL DATA -->
<div class="modal fade" id="detail_data<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-header-success">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          <h3>Detail Akun Pemakai</h3>
        </div>
        <form class="form-horizontal" action="<?php echo base_url('AdminGereja/Manajemenakun/editData')?>" method="post" enctype="multipart/form-data" role="form">
          <input type="hidden" name="idedit" value="<?php echo $id; ?>">
          <div class="modal-body">
              <div class="form-group col-md-6">
                <div class="input-group col-md-10">
                  <label>Username</label>
                  <input readonly="readonly" value="<?php echo $username; ?>" class="form-control" type="text" />
                </div>
              </div>
              <div class="form-group col-md-6">
                <div class="input-group col-md-10">
                  <label for='text'>Fullname</label>
                  <input readonly="readonly" value="<?php echo $fullname; ?>" class="form-control" type="text" />
                </div>
              </div>              
                  <br>
              <div class="form-group col-md-6">
                  <div class="input-group col-md-10">
                      <label>Telephone</label>
                      <input readonly="readonly" value="<?php echo $telpno; ?>" class="form-control" type="Text" />
                  </div>
              </div>
                  <br>
              <div class="form-group col-md-6">
                  <div class="input-group col-md-10">
                      <label>Email</label>
                        <input readonly="readonly" value="<?php echo $email; ?>" class="form-control" type="text" />
                  </div>
              </div>
                <br>
                <br>
              <div class="modal-footer">
                  <span id='error'></span>
                  <button class="btn btn-default" data-dismiss="modal">Close</button>
              </div>                
          </div>
      </form>
    </div>
   </div>
</div>
<!--tutup DETAIL DATA -->
<?php endforeach; ?>

<?php foreach ($data->result_array() as $i) :
$id = $i['id'];
$username = $i['username'];
?>
        <div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Akun</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'AdminGereja/Manajemenakun/hapusData'; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                            <input type="hidden" name="kode" value="<?php echo $id; ?>"/>
                            <p>Apakah Anda yakin mau menghapus Username  <b><?php echo $username; ?></b> ?</p>

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

<div class="modal fade" id="tambah_data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-header-success">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3>Tambah Data</h3>
            </div>
        <form class="form-horizontal" onsubmit="return validateForm()" action="<?php echo base_url('AdminGereja/Manajemenakun/insertData')?>" method="post" enctype="multipart/form-data" role="form">

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Username <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="username" placeholder="Username" name="username" class="form-control col-md-7 col-xs-12">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Full Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="fullname" placeholder ="Full Name" name="fullname" class="form-control col-md-7 col-xs-12">
                </div>
            </div>
            <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="password" class="form-control col-md-7 col-xs-12" name="password" type="password" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Re-type Password</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="confirm_password" class="form-control col-md-7 col-xs-12" type="password" placeholder="Re-Type Password">
                </div>
                <span id='message'></span>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">User Group</label>
                <div class="col-md-4 col-sm-9 col-xs-12">
                    <select class="form-control" name="user_group">
                        <option value='1'>Admin Gereja</option>                       
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Aktif Akun Pemakai</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div id="gender" class="btn-group" data-toggle="buttons">
                        <label data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input type="radio" name="status" checked="checked" value="1"> &nbsp; Aktif &nbsp;
                        </label>
                        <label data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input type="radio" name="status" value="0"> Tidak Aktif
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Telepon <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="telephone" class="form-control col-md-7 col-xs-12" name="telephone" placeholder="Telephone" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="email" name="email" class="form-control col-md-7 col-xs-12" type="email" placeholder="Email@mail.com">
                </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 pull-right">
                    <button class="btn btn-primary" data-dismiss="modal" type="button">Cancel</button>                    
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
            <br>
            <br>
        </form>
        </div>
    </div>
</div>

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
    

// if($('#username_edit').val() == ''){
//                alert("Username tidak boleh kosong!!");
//                return false;
//            } else if($('#fullname_edit').val() == ''){
//                alert("FullName tidak boleh kosong!!");
//                return false;
//            } else if($('#telephone_edit').val() == ''){
//                alert("Telephone tidak boleh kosong!!");
//                return false;
//            } else if($('#email_edit').val() == ''){
//                alert("Email tidak boleh kosong!!");
//                return false;
//            } else {}


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
    } 
}

</script>


