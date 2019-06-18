  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manajemen Kelola Bulanan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Persembahan </a></li>
        <li class="active">Manajemen Kelola Bulanan </li>
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
                    <th>Bulan</th>
                    <th>Tahun</th>
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
                    <td><?php echo $i['Bulan']; ?></td>
                    <td><?php echo $i['Tahun']; ?></td>
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
?>
<!--EDIT DATA -->
<div class="modal fade" id="edit_data<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-header-success">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          <h3>Edit Data Persembahan</h3>
        </div>
        <form class="form-horizontal" action="<?php echo base_url('AdminGereja/Kelola_Bulanan/editData')?>" method="post" enctype="multipart/form-data" role="form">
        <input type="hidden" name="idedit" value="<?= $i['Idx'] ?>">
        <div class="modal-body">
          <div class="col-md-12">
            <div class="form-group ">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="datecreated_edit" name="datecreated_edit" class="form-control" type="text" readonly="readonly" value="<?= date("Y-m-d") ?>" style="z-index: 2000; width: 400px;"/>
              </div>
            </div>
            <br>
           
            <br>
            <div class="form-group ">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Bulan</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="bulan_edit" id="bulan_edit" type="text" Placeholder="Januari,Februari, dll" value='<?php echo $i['Bulan']; ?>' class="form-control" style="z-index: 2000; width: 400px;" required="required" />
              </div>
            </div>
           
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tahun</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="tahun_edit" id="tahun_edit" type="text" class="form-control" Placeholder="Tahun" value='<?php echo $i['Tahun']; ?>' style="z-index: 2000; width: 400px;" required="required"/>
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
                    <form class="form-horizontal" action="<?php echo base_url().'AdminGereja/Kelola_Bulanan/hapusData'; ?>" method="post" enctype="multipart/form-data">
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
         <form class="form-horizontal" onsubmit="return validateForm()" action="<?php echo base_url('AdminGereja/Kelola_Bulanan/insertData')?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <div class="col-md-12">
            <div class="form-group ">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="datecreated" name="datecreated" class="form-control" type="text" readonly="readonly" value="<?= date("Y-m-d") ?>" style="z-index: 2000; width: 400px;"/>
              </div>
            </div>
            <br>
  
            <br>
            <div class="form-group ">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Bulan</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="bulan" id="bulan" type="text" Placeholder="Januari,Februari, dll" class="form-control" style="z-index: 2000; width: 400px;" />
              </div>
            </div>
           
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tahun</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="tahun" id="tahun" type="text" class="form-control" Placeholder="Tahun" style="z-index: 2000; width: 400px;"/>
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

function validateForm() {
    if($('#bulan').val() == ''){
        alert("Bulan tidak boleh kosong!!");
        return false;
    } else if($('#tahun').val() == ''){
        alert("Tahun tidak boleh kosong!!");
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


