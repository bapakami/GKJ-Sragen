  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manajemen Kelola Khusus
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Persembahan </a></li>
        <li class="active">Manajemen Kelola Khusus </li>
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
                    <th>Asal Dana</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Asal</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                            $no = 0;
                             foreach ($data->result_array() as $i) :
                                    $no++;
                                    $id = $i['Idx'];
                                    $namapepantan = $i['Pepantan_id'];
                                    if($namapepantan == 0){
                                      $asal = 'Gereja Induk';
                                    } else{
                                      $asal = $i['namapepantan'];
                                    }                                   
                         ?>
                <tr>
                    <td style="text-align:left;width:38px;"><?php echo $no; ?></td>
                    <td><?php echo $i['Keterangan']; ?></td>
                    <td><?php echo tanggal_indo($i['DateCreated']); ?></td>
                    <td><?php echo 'Rp '.number_format($i['Jumlah']); ?></td>
                    <td><?php echo $asal; ?></td>                   
                    <td style="text-align:center;"> 
                        <span data-toggle="tooltip" data-placement="top" data-original-title="Edit">
                          <a data-toggle="modal" data-target="#edit_data<?php echo $i['Idx']; ?>">
                            <button type="button" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-pencil"></i> Edit</button>
                          </a>
                        </span> 
                       <span data-toggle="tooltip" data-placement="top" data-original-title="Hapus">
                          <a data-toggle="modal" data-target="#ModalHapus<?php echo $i['Idx']; ?>">
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
    $id = $i['Idx'];
    $sumber = $i['Keterangan'];
?>
<!--EDIT DATA -->
<div class="modal fade" id="edit_data<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-header-success">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          <h3>Edit Data Persembahan</h3>
        </div>
        <form class="form-horizontal" action="<?php echo base_url('AdminGereja/Kelola_Khusus/editData')?>" method="post" enctype="multipart/form-data" role="form">
        <input type="hidden" name="idedit" value="<?= $i['Idx'] ?>">
        <div class="modal-body">
          <div class="col-md-12">
            <div class="form-group ">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="datepickerSyukur_edit" name="datecreated_edit" class="form-control" type="text" value="<?= $i['DateCreated'] ?>" style="z-index: 2000; width: 400px;" required="required"/>
              </div>
            </div>
            <br>
          
           <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Sumber Persembahan</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <form id='form-id-edit'>
                    <input id='Jemaat_edit' name='asalpersembahan_edit' type='radio' value="Jemaat" <?php echo ($i['Sumber_persembahan']=='Jemaat')?'checked':'' ?> />Jemaat
                    <input id='Acara_edit' name='asalpersembahan_edit' value="Acara" type='radio' <?php echo ($i['Sumber_persembahan']=='Acara')?'checked':'' ?> />Acara
                </form>
              </div>
            </div>
            <br>
            <div class="form-group" id="Show_Jemaat_edit">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Jemaat</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="keterangan_edit" id="ket_jemaat_edit" type="text" Placeholder="Nama Jemaat" <?php echo ($i['Sumber_persembahan']=='Jemaat')?'value="'.$i['Keterangan'].'"':'' ?> class="form-control" style="z-index: 2000; width: 400px;" required="required"/>
              </div>
            </div>
            <div class="form-group" id="Show_Acara_edit">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Acara</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="keterangan_edit" id="ket_acara_edit" type="text" Placeholder="Nama Acara" <?php echo ($i['Sumber_persembahan']=='Acara')?'value="'.$i['Keterangan'].'"':'' ?> class="form-control" style="z-index: 2000; width: 400px;" required="required"/>
              </div>
            </div>
          
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="jumlah_edit" type="text" id="jumlah_edit" Placeholder="Jumlah" value='<?php echo $i['Jumlah']; ?>' class="form-control" style="z-index: 2000; width: 400px;" required="required"/>
              </div>
            </div>
            <div class="form-group">
                <label for="inputUserName" class="col-sm-3 control-label">Asal Persembahan</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">           
                      <select class='form-control' id='pepantan_edit' name="pepantan_edit">
                      <?php if($i['Pepantan_id'] == 0) {?>
                      <option value='0'>Gereja Induk</option>
                      <?php }else {?>
                      <option value='<?php echo $i['Pepantan_id']; ?>'><?php echo $i['namapepantan']; ?></option>
                      <?php }?>
                      <option value='0'>Gereja Induk</option>
                          <?php 
                            foreach ($NamaPepantan as $pnt) {
                              echo "<option value='$pnt[id]'>$pnt[namapepantan]</option>";
                            }
                          ?>
                      </select>
                                           
                  </div>
            </div>
          </div>
          
            <div class="modal-footer">
            <input class="btn btn-primary"  type="submit" value="Edit">
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
$id = $i['Idx'];
?>
        <div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'AdminGereja/Kelola_Khusus/hapusData'; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                            <input type="hidden" name="kode" value="<?php echo $id; ?>"/>
                            <p>Apakah Anda yakin mau menghapus persembahan dengan Jumlah  <b><?php echo 'Rp '.number_format($i['Jumlah']); ?></b> ?</p>

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
                <h3>Tambah Data Persembahan</h3>
            </div>
         <form class="form-horizontal" onsubmit="return validateForm()" action="<?php echo base_url('AdminGereja/Kelola_Khusus/insertData')?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <div class="col-md-12">
            <div class="form-group ">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="datepickerSyukur" name="datecreated" class="form-control" type="text" style="z-index: 2000; width: 400px;"/>
              </div>
            </div>
            <br>
          
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Sumber Persembahan</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <form id='form-id'>
                    <input id='Jemaat' name='asalpersembahan' type='radio' value="Jemaat" checked />Jemaat
                    <input id='Acara' name='asalpersembahan' type='radio' value="Acara" />Acara
                </form>
              </div>
            </div>
            <br>
            <div class="form-group" id="Show_Jemaat">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Jemaat</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="keterangan" id="ket_jemaat" type="text" Placeholder="Nama Jemaat" class="form-control" style="z-index: 2000; width: 400px;" />
              </div>
            </div>
            <div class="form-group" id="Show_Acara">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Acara</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="keterangan" id="ket_acara" type="text" Placeholder="Nama Acara" class="form-control" style="z-index: 2000; width: 400px;" />
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="jumlah" type="text" id="jumlah" Placeholder="Jumlah" class="form-control" style="z-index: 2000; width: 400px;"/>
              </div>
            </div>
            <div class="form-group">
                <label for="inputUserName" class="col-sm-3 control-label">Asal Persembahan</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">           
                      <select class='form-control' id='pepantan' name="pepantan">
                        <option>--pilih--</option>
                        <option value='0'>Gereja Induk</option>
                          <?php 
                            foreach ($NamaPepantan as $pnt) {
                              echo "<option value='$pnt[id]'>$pnt[namapepantan]</option>";
                            }
                          ?>
                      </select>
                                           
                  </div>
            </div>
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

      
    
});
$('#Show_Acara').hide();
    if($('#Jemaat_edit').prop('checked')===false)
        {
          $('#Show_Jemaat_edit').hide();
        }
    if($('#Acara_edit').prop('checked')===false){           
           $('#Show_Acara_edit').hide();
        } 

    $("#Jemaat").click(function()
      {
        $('#ket_jemaat').prop( "disabled", false );
        $("#Show_Jemaat:hidden").show('slow');
        $('#ket_acara').prop( "disabled", true );
        $("#Show_Acara").hide();
      });
        $("#Jemaat").click(function()
      {
        if($('Jemaat').prop('checked')===false)
        {
          $('#Show_Jemaat').hide();
        }
      });
       
      $("#Acara").click(function()
      {
        $('#ket_acara').prop( "disabled", false );
        $("#Show_Acara:hidden").show('slow');
        $('#ket_jemaat').prop( "disabled", true );
        $("#Show_Jemaat").hide();
      });
       
      $("#Acara").click(function()
      {
        if($('Acara').prop('checked')===false)
       {
        $('#Acara').hide();
       }
      });


      $("#Jemaat_edit").click(function()
      {
        $('#ket_jemaat_edit').prop( "disabled", false );
        $("#Show_Jemaat_edit:hidden").show('slow');
        $('#ket_acara_edit').prop( "disabled", true );
        $("#Show_Acara_edit").hide();
      });
        $("#Jemaat_edit").click(function()
      {
        if($('Jemaat_edit').prop('checked')==false)
        {
          $('#Show_Jemaat_edit').hide();
        }
      });
       
      $("#Acara_edit").click(function()
      {
        $('#ket_acara_edit').prop( "disabled", false );
        $("#Show_Acara_edit:hidden").show('slow');
        $('#ket_jemaat_edit').prop( "disabled", true );
        $("#Show_Jemaat_edit").hide();
      });
       
      $("#Acara_edit").click(function()
      {
        if($('Acara_edit').prop('checked')===false)
       {
        $('#Acara_edit').hide();
       }
      });
function validateForm() {
    if($('#datepickerSyukur').val() == ''){
        alert("Tanggal tidak boleh kosong!!");
        return false;
    } else if($('#jumlah').val() == ''){
        alert("Jumlah tidak boleh kosong!!");
        return false;
    } else if ($("#pepantan").find(":selected").text() == '--pilih--'){
        alert("Asal Persembahan tidak boleh kosong!!");
        return false;
    }
}

</script>


