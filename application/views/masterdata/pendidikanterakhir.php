  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pendidikan Terakhir
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Master Data </a></li>
        <li class="active">Pendidikan Terakhir </li>
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
                  <th style="width: 300px">Pendidikan Terakhir</th>
                  <th style="width: 400px">Deskripsi</th>
                  <th style="text-align:center;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                            $no = 0;
                             foreach ($data->result_array() as $i) :
                                    $no++;
                                    $idx = $i['idx'];
                                    $nama_strata = $i['nama_strata'];
                                    $deskripsi = $i['deskripsi'];
                         ?>
                <tr>
                    <td style="text-align:left;width:38px;"><?php echo $no; ?></td>
                    <td><?php echo $nama_strata; ?></td>
                    <td><?php echo $deskripsi; ?></td>
                    <td style="text-align:center;"> 
                        <span data-toggle="tooltip" data-placement="top" data-original-title="Edit">
                          <a data-toggle="modal" data-target="#edit_data<?php echo $idx; ?>">
                            <button type="button" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-pencil"></i> Edit</button>
                          </a>
                        </span> 
                       <span data-toggle="tooltip" data-placement="top" data-original-title="Hapus">
                          <a data-toggle="modal" data-target="#hapus_data<?php echo $idx; ?>">
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
    $idx = $i['idx'];
    $nama_strata = $i['nama_strata'];
    $deskripsi = $i['deskripsi'];
?>

<!-- Modal Edit Data -->
<div class="modal fade" id="edit_data<?= $idx; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-header-success">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3>Edit Pendidikan Terakhir</h3>
      </div>
      <form class="form-horizontal" action="<?php echo base_url('Pendidikanterakhir/editData')?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <!-- <div class="row"> -->
          <input type="hidden" name="idedit" class="form-control" value="<?php echo $idx;?>">
          <div class="col-md-6">
            <div class="form-group">
              <div class="input-group col-md-10">
                <label for="nama_strata">Pendidikan Terakhir</label>
                <input id="nama_strata" type="text" name="nama_strata" class="form-control" value="<?=$nama_strata;?>" placeholder="Masukkan Pendidikan Terakhir.." required="required" data-error="Education is required.">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <div class="input-group col-md-10">
                <label for="deskripsi">Deskripsi</label>
                <input id="deskripsi" type="text" name="deskripsi" class="form-control" value="<?=$deskripsi;?>" placeholder="Masukkan Deskripsi Pendidikan Terakhir.." required="required" data-error="The description of education is required.">
              </div>
            </div>
          </div>
          <!-- </div> -->


          <br><br><br>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" value="Edit">Edit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div> 
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--tutup EDIT DATA -->
<?php endforeach; ?>


<?php foreach ($data->result_array() as $i) :
    $idx = $i['idx'];
    $nama_strata = $i['nama_strata'];
    $deskripsi = $i['deskripsi'];
?>

<!-- Modal Hapus Data -->
<div class="modal fade" id="hapus_data<?= $idx; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">
   <div class="modal-content" style="width: 440px">
     <div class="modal-header modal-header-success">
       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
       <h3>Hapus Data</h3>
     </div>
     <form class="form-horizontal" action="<?php echo base_url('Pendidikanterakhir/hapusData')?>" method="post" enctype="multipart/form-data" role="form">
       <input type="hidden" name="idhapus" value="<?= $idx; ?>">
       <div class="modal-body">
         <p>Apakah Anda Ingin Menghapus Data Ini?</p>
       </div>
       <div class="modal-footer">
         <input class="btn btn-primary"  type="submit" value="Hapus">
         <button class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
     </form>
   </div>
 </div>
</div>
<!--tutup HAPUS DATA -->
<?php endforeach; ?>

<!--Modal Tambah Data -->
<div class="modal fade" id="tambah_data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header modal-header-success">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3>Tambah Pendidikan Terakhir</h3>
                        </div>
                    <form class="form-horizontal" action="<?php echo base_url('Pendidikanterakhir/insertData')?>" method="post" enctype="multipart/form-data" role="form">
                        <div class="modal-body">
                <!-- <div class="row"> -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group col-md-10">
                            <label for="nama_strata">Pendidikan Terakhir</label>
                            <input id="nama_strata" type="text" name="nama_strata" class="form-control" placeholder="Masukkan Pendidikan Terakhir.." required="required" data-error="Education is required.">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group col-md-10">
                            <label for="deskripsi">Deskripsi</label>
                            <input id="deskripsi" type="text" name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi Pendidikan Terakhir.." required="required" data-error="The description of education is required.">
                            </div>
                        </div>
                    </div>
                <!-- </div> -->

                    
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
<!--tutup TAMBAH DATA -->

<script type="text/javascript">
$(document).ready(function () {
   $('#example1').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );

});
</script>