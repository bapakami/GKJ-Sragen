  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h3 style="color: red;"><?php echo $this->session->flashdata('msg');?></h3>
      <h1>
        Manajemen Berita
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Fasilitas </a></li>
        <li class="active">Manajemen Berita </li>
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
                  <th>Judul Berita</th>
                  <th>Tanggal Penulisan</th>
                  <th>Gereja</th>
                  <th>Penulis</th>
                  <th>Status</th>
                  <th style="text-align:center;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                            $no = 0;
                             foreach ($data->result_array() as $i) :
                                    $no++;
                                    $id = $i['id'];
                                    $judul = $i['judul'];
                                    $tanggal_berita = $i['tanggal_berita'];
                                    $namagereja = $i['namagereja'];
                                    $fullname = $i['fullname'];
                                    $status = $i['status'];
                         ?>
                <tr>
                    <td style="text-align:left;width:38px;"><?php echo $no; ?></td>
                    <td><?php echo $judul; ?></td>
                    <td><?php echo $tanggal_berita; ?></td>
                    <td><?php echo $namagereja; ?></td>
                    <td><?php echo $fullname; ?></td>
                    <td><?php echo $status; ?></td>
                    <td style="text-align:center;"> 
                        <!-- <span data-toggle="tooltip" data-placement="top" data-original-title="Lihat Detail Berita">
                          <a data-toggle="modal" data-target="#detail_data<?php echo $id; ?>">
                            <button type="button" class="btn btn-white btn-xs" title="View Details"><i class="fa fa-eye"> Detail</i></button>
                          </a>
                        </span> -->
                        <span data-toggle="tooltip" data-placement="top" data-original-title="Edit Berita">
                          <a data-toggle="modal" data-target="#edit_data<?php echo $id; ?>">
                            <button type="button" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-pencil"></i> Edit</button>
                          </a>
                        </span> 
                       <span data-toggle="tooltip" data-placement="top" data-original-title="Hapus Berita">
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
    $judul = $i['judul'];
    $tanggal_berita = $i['tanggal_berita'];
    $namagereja = $i['namagereja'];
    $fullname = $i['fullname'];
    $status = $i['status'];
    $isi_berita = $i['isi_berita'];
    $gerejaid = $i['gerejaid'];
?>
<!--EDIT DATA -->
<div class="modal fade" id="edit_data<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 440px">
      <div class="modal-header modal-header-success">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3>Edit Data</h3>
      </div>
      <form class="form-horizontal" action="<?php echo base_url('Manajemenberita/editData')?>" method="post" enctype="multipart/form-data" role="form">
        <input type="hidden" name="idedit" value="<?php echo $id; ?>">
        <input type="hidden" name="oldname" value="<?php echo $i['image']; ?>">
        <div class="modal-body">
          <label>Judul</label>
          <input id="judul" name="judul_edit" class="form-control" type="text" style="z-index: 2000; width: 400px;" value="<?php echo $judul; ?>" required="" />
          <br>
          <label for='text'>Isi Berita</label>
          <textarea name="isi_berita_edit" class="form-control" style="z-index: 2000; width: 400px;"><?php echo $isi_berita; ?></textarea>
          <br>
           <label>Asal Gereja</label>
                    <select class='form-control' id='gereja_edit' name="gereja_edit">
                      <option value='<?php echo $gerejaid; ?>'><?php echo $namagereja; ?></option>                    
                          <?php 
                            foreach ($gereja as $grj) {
                              echo "<option value='$grj[id]'>$grj[namagereja]</option>";
                            }
                          ?>
                    </select>
          <br>
          <div class="radio">
           <label><input type="radio" name="status" value="publikasi" <?php echo ($i['status']=='publikasi')?'checked':'' ?>> Publikasikan</label>
         </div>

         <div class="radio">
           <label><input type="radio" name="status" value="draft" <?php echo ($i['status']=='draft')?'checked':'' ?>>Simpan Sebagai Draft</label>
         </div>
         <br>
          <label for='text'> file foto :<input type="file" onchange="readURL_edit(this);" name="filefoto_edit" value="<?=$i['image'];?>"> </label>
          <center><label style="width: 275px; height:300px;"><img alt="Image Display Here" id="test_edit" src="<?php echo base_url('gallery/'.$i['image']); ?>" style="width:275px; height:300px; z-index:2000;" class="img-responsive img-thumbnail"></label></center>
        </div>
        <div class="modal-footer">
          <input class="btn btn-primary"  type="submit" value="Edit">
          <button class="btn btn-default" data-dismiss="modal">close</button>  
        </div>
      </form>
    </div>
  </div>
</div>

<?php endforeach; ?>

<?php foreach ($data->result_array() as $i) :
    $id = $i['id'];
    $judul = $i['judul'];
    $tanggal_berita = $i['tanggal_berita'];
    $namagereja = $i['namagereja'];
    $fullname = $i['fullname'];
    $status = $i['status'];
    $isi_berita = $i['isi_berita'];
?>

<!--HAPUS DATA -->
<div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel">Hapus Data Berita</h4>
      </div>
      <form class="form-horizontal" action="<?php echo base_url().'Manajemenberita/hapusData'; ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" name="kode" value="<?php echo $id; ?>"/>
          <p>Apakah Anda yakin mau menghapus berita  <b><?php echo $judul; ?></b> ?</p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-danger btn-flat" id="simpan"><i class="fa fa-trash"></i> Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--tutup HAPUS DATA -->
<?php endforeach; ?>

<!--TAMBAH DATA -->
<div class="modal fade" id="tambah_data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">
   <div class="modal-content" style="width: 440px">
     <div class="modal-header modal-header-success">
       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
       <h3>Tambah Data</h3>
     </div>
     <form class="form-horizontal" action="<?php echo base_url('Manajemenberita/insertData')?>" method="post" enctype="multipart/form-data" role="form">
       <div class="modal-body">
         <label>Judul</label>
         <input id="judul" name="judul" class="form-control" type="text" style="z-index: 2000; width: 400px;" required="" />
         <br>
         <label for='text'>Isi Berita</label>
         <textarea name="isi_berita" id="ckeExample" class="form-control" style="z-index: 2000; width: 400px;"></textarea>
         <br> 
          <label>Asal Gereja</label>
          <select class='form-control' id='gereja' name="gereja">
            <option>--pilih--</option>            
              <?php 
                foreach ($gereja as $grj) {
                  echo "<option value='$grj[id]'>$grj[namagereja]</option>";
                }
              ?>
          </select>             

         <br>
         <div class="radio">
           <label><input type="radio" name="status" value="publikasi"> Publikasikan</label>
         </div>

         <div class="radio">
           <label><input type="radio" name="status" value="draft" checked>Simpan Sebagai Draft</label>
         </div>

         <br>

         <label for='text'> File Foto : <span style="color: red;">Ukuran gambar max 1 MB</span><input type="file" onchange="readURL(this);" name="filefoto"> </label>
         <center><label style="width: 275px; height:300px;"><img alt="Image Display Here" id="test" src="<?php echo base_url();?>assets/img/user-default.png" style="width:275px; height:300px; z-index:2000;" class="img-responsive img-thumbnail"></label></center>



       </div>
       <div class="modal-footer">
         <input class="btn btn-primary"  type="submit" value="Tambah">
         <button class="btn btn-default" data-dismiss="modal">Close</button>

       </div>
     </form>
   </div>
 </div>
</div>
<!--tutup TAMBAH DATA -->

<script>
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
$(window).on("load resize ", function() {
 var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
 $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();


var ckEditorID;

ckEditorID = 'ckeExample';

function fnConsolePrint()
{
         //console.log($('#' + ckEditorID).val());
         console.log(CKEDITOR.instances[ckEditorID].getData());
       }
       CKEDITOR.config.forcePasteAsPlainText = true;
       CKEDITOR.replace( ckEditorID,
       {
         toolbar :
         [
         {
           items : [ 'Bold','Italic','Underline','Strike','-','RemoveFormat' ]
         },
         {
           items : [ 'Format']
         },
         {
           items : [ 'Link','Unlink' ]
         },
         {
           items : [ 'Indent','Outdent','-','BulletedList','NumberedList']
         },
         {
           items : [ 'Undo','Redo']
         }
         ]
       })
     </script>

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
    } else if ($("#gereja").find(":selected").text() == '--pilih--'){
        alert("Asal Gereja tidak boleh kosong!!");
        return false;
    }
}

</script>