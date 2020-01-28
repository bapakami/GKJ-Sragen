  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manajemen Data Gereja
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Fasilitas </a></li>
        <li class="active">Manajemen Data Gereja </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">


            <div class="box-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#tambah_data"><span class="fa fa-plus"></span> Tambah Gereja</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-striped table-bordered table-responsive" style="width:100%;font-size:13px;">
                <thead>
                <tr>
                    <th style="width:38px;">#</th>
                    <th>Nama Gereja</th>
                    <th>Alamat</th>
                    <th>Pendeta</th>
                    <th>Telp</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                            $no = 0;
                             foreach ($data->result_array() as $i) :
                                    $no++;
                                    $id = $i['id'];
                                    $namagereja = $i['namagereja'];                                    
                                    $alamat = $i['alamat'];                                    
                                    $telp = $i['telp'];
                                    $pdt = $i['pdt'];
                         ?>
                <tr>
                    <td style="text-align:left;width:38px;"><?php echo $no; ?></td>
                    <td><?php echo $namagereja; ?></td>
                    <td><?php echo $alamat; ?></td>
                    <td><?php echo $pdt; ?></td>
                    <td><?php echo $telp; ?></td>                    
                    <td style="text-align:center;"> 
                        <span data-toggle="tooltip" data-placement="top" data-original-title="Lihat Detail">
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
  
?>
<!--EDIT DATA -->
<div class="modal fade" id="edit_data<?php echo $i['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-header-success">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          <h3>Edit Data Gereja</h3>
        </div>
        <form class="form-horizontal" action="<?php echo base_url('manajemendatagereja/editData')?>" method="post" enctype="multipart/form-data" role="form">
        <input type="hidden" name="idedit" value="<?= $i['id'] ?>">
        <div class="modal-body">
          <div class="col-md-12">
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Gereja*</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="namagereja_edit" name="namagereja_edit" value="<?= $i['namagereja']?>" class="form-control" type="text" Placeholder="Nama Gereja" style="z-index: 2000; width: 400px;" required="required"/>
              </div>
            </div>
            <br>
            <div class="form-group ">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kode Gereja*</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="kodegereja_edit" id="kodegereja_edit" type="text" value="<?= $i['kode_gereja']?>" Placeholder="Kode Gereja" class="form-control" style="z-index: 2000; width: 400px;" required="required"/>
              </div>
            </div>
          
            <br>
            <div class="form-group ">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat Gereja*</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea required="required" name="alamat_edit" id="alamat_edit" class="form-control" style="z-index: 2000; width: 400px;"><?= $i['alamat']?></textarea>
              </div>
            </div>
           
            <br>
            <div class="form-group ">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Pendeta*</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="pendeta_edit" id="pendeta_edit" type="text" value="<?= $i['pdt']?>" Placeholder="Pendeta" class="form-control" style="z-index: 2000; width: 400px;" required="required" />
              </div>
            </div>
           
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Telphone No*</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="telpno_edit" id="telpno_edit" value="<?= $i['telp']?>" type="text" class="form-control" Placeholder="Telephone" style="z-index: 2000; width: 400px;" required="required"/>
              </div>
            </div>
          
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email*</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="email_edit" type="Email" value="<?= $i['email']?>" id="email_edit" Placeholder="abc@mail.com" class="form-control" style="z-index: 2000; width: 400px;" required="required"/>
              </div>
            </div>
       
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat Web</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="web_edit" type="text" value="<?= $i['web'] ?>" class="form-control" Placeholder="Alamat Web" style="z-index: 2000; width: 400px;"/>
              </div>
            </div>
           
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Sejarah Gereja</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea name="sejarah_edit" id="ckeExample" class="form-control" style="z-index: 2000; width: 400px;"><?= $i['sejarah'] ?></textarea>
              </div>
            </div>
         
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Jadwal Kebaktian Gereja</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea name="jadwal_edit" class="form-control" style="z-index: 2000; width: 400px;" ><?= $i['jamkebaktian'] ?></textarea>
              </div>
            </div>
           
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">URL Gambar Peta</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="url_gambar_edit" type="text" value="<?= $i['peta'] ?>" class="form-control" Placeholder="URL Gambar Peta" style="z-index: 2000; width: 400px;"/>
              </div>
            </div>
         
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">URL Peta</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="url_peta_edit" type="text" value="<?= $i['linkpeta']?>" class="form-control" Placeholder="URL Peta" style="z-index: 2000; width: 400px;"/>
              </div>
            </div>
           
            <br>


            </div>
            <div class="modal-footer">
            <input class="btn btn-primary" type="submit" value="Update">
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
  
?>
<!--Detail DATA -->
<div class="modal fade" id="detail_data<?php echo $i['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-header-success">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          <h3>Detail Data Gereja</h3>
        </div>
        <div class="modal-body">
          <!-- <div class="col-md-12"> -->
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Gereja*</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input readonly="readonly" value="<?= $i['namagereja']?>" class="form-control" type="text" style="z-index: 2000; width: 400px;"/>
              </div>
            </div>
            <br><br>

            <div class="form-group ">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kode Gereja*</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input readonly="readonly" type="text" value="<?= $i['kode_gereja']?>" class="form-control" style="z-index: 2000; width: 400px;" />
              </div>
            </div>          
            <br><br>

            <div class="form-group ">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat Gereja*</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea readonly="readonly" class="form-control" style="z-index: 2000; width: 400px;"><?= $i['alamat']?></textarea>
              </div>
            </div>           
            <br> <br><br>

            <div class="form-group ">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Pendeta*</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input readonly="readonly" type="text" value="<?= $i['pdt']?>" class="form-control" style="z-index: 2000; width: 400px;" />
              </div>
            </div>           
            <br> <br><br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Telphone No*</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input readonly="readonly" value="<?= $i['telp']?>" type="text" class="form-control" style="z-index: 2000; width: 400px;" />
              </div>
            </div>          
            <br> <br><br>

            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email*</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="Email" value="<?= $i['email']?>" readonly="readonly" class="form-control" style="z-index: 2000; width: 400px;"/>
              </div>
            </div>       
            <br> <br><br>

            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat Web</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input readonly="readonly" type="text" value="<?= $i['web'] ?>" class="form-control" style="z-index: 2000; width: 400px;"/>
              </div>
            </div>           
            <br> <br><br>

            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Sejarah Gereja</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea readonly="readonly" class="form-control" style="z-index: 2000; width: 400px;"><?= $i['sejarah'] ?></textarea>
              </div>
            </div>         
            <br> <br><br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Jadwal Kebaktian Gereja</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea readonly="readonly" class="form-control" style="z-index: 2000; width: 400px;" ><?= $i['jamkebaktian'] ?></textarea>
              </div>
            </div>
           
            <br> <br><br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">URL Gambar Peta</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input readonly="readonly" type="text" value="<?= $i['peta'] ?>" class="form-control" style="z-index: 2000; width: 400px;"/>
              </div>
            </div>         
            <br> <br><br>

            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">URL Peta</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input readonly="readonly" type="text" value="<?= $i['linkpeta']?>" class="form-control" style="z-index: 2000; width: 400px;"/>
              </div>
            </div>           
            <br><br><br>
            </div>
            <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal">close</button>
          </div>
        </div>
    </div>
   </div>
</div>
<!--tutup Detail DATA -->
<?php endforeach; ?>


<?php foreach ($data->result_array() as $i) :
$id = $i['id'];
$namagereja = $i['namagereja'];
?>
        <div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Barang</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'manajemendatagereja/hapusData'; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                            <input type="hidden" name="kode" value="<?php echo $id; ?>"/>
                            <p>Apakah Anda yakin mau menghapus Gereja  <b><?php echo $namagereja; ?></b> ?</p>

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
        <h3>Tambah Data Gereja</h3>
      </div>
      <form class="form-horizontal" onsubmit="return validateForm()" action="<?php echo base_url('manajemendatagereja/insertData')?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <div class="col-md-12">
            <div class="form-group ">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Gereja*</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="namagereja" name="namagereja" class="form-control" type="text" Placeholder="Nama Gereja" style="z-index: 2000; width: 400px;"/>
              </div>
            </div>
            <br>
            <div class="form-group ">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kode Gereja*</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="kodegereja" id="kodegereja" type="text" Placeholder="Kode Gereja" class="form-control" style="z-index: 2000; width: 400px;"/>
              </div>
            </div>
          
            <br>
            <div class="form-group ">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat Gereja*</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea name="alamat" id="alamat" class="form-control" style="z-index: 2000; width: 400px;"></textarea>
              </div>
            </div>
           
            <br>
            <div class="form-group ">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Pendeta*</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="pendeta" id="pendeta" type="text" Placeholder="Pendeta" class="form-control" style="z-index: 2000; width: 400px;" />
              </div>
            </div>
           
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Telphone No*</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="telpno" id="telpno" type="text" class="form-control" Placeholder="Telephone" style="z-index: 2000; width: 400px;"/>
              </div>
            </div>
          
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email*</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="email" type="Email" id="email" Placeholder="abc@mail.com" class="form-control" style="z-index: 2000; width: 400px;"/>
              </div>
            </div>
       
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat Web</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="web" type="text" class="form-control" Placeholder="Alamat Web" style="z-index: 2000; width: 400px;"/>
              </div>
            </div>
           
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Sejarah Gereja</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea name="sejarah" id="ckeExample" class="form-control" style="z-index: 2000; width: 400px;"></textarea>
              </div>
            </div>
         
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Jadwal Kebaktian Gereja</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea name="jadwal" class="form-control" style="z-index: 2000; width: 400px;" ></textarea>
              </div>
            </div>
           
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">URL Gambar Peta</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="url_gambar" type="text" class="form-control" Placeholder="URL Gambar Peta" style="z-index: 2000; width: 400px;"/>
              </div>
            </div>
         
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">URL Peta</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="url_peta" type="text" class="form-control" Placeholder="URL Peta" style="z-index: 2000; width: 400px;"/>
              </div>
            </div>
           
            <br>


            </div>
            <div class="modal-footer">
            <input class="btn btn-primary"  type="submit" value="Tambah">
            <button class="btn btn-default" data-dismiss="modal">close</button>
          </div>
        </div>
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


function validateForm() {
    if($('#namagereja').val() == ''){
        alert("Nama Gereja tidak boleh kosong!!");
        return false;
    } else if($('#kodegereja').val() == ''){
        alert("Kode Gereja tidak boleh kosong!!");
        return false;
    } else if($('#alamat').val() == ''){
        alert("Alamat tidak boleh kosong!!");
        return false;
    } else if($('#pendeta').val() == ''){
        alert("Pendeta tidak boleh kosong!!");
        return false;
    } else if($('#telpno').val() == ''){
        alert("Telephone tidak boleh kosong!!");
        return false;
    } else if ($('#email').val() == ''){
        alert("Email tidak boleh kosong!!");
        return false;
    }
}

var ckEditorID;
var ckEditEditorID;

ckEditorID = 'ckeExample';
ckEditEditorID = 'ckeditExample';
function fnConsolePrint()
{
  //console.log($('#' + ckEditorID).val());
  console.log(CKEDITOR.instances[ckEditorID].getData());
}
CKEDITOR.config.forcePasteAsPlainText = true;
CKEDITOR.replace( ckEditorID,ckEditEditorID,
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