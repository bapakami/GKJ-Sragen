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


            <!-- <div class="box-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#tambah_data"><span class="fa fa-plus"></span> Tambah Data</a>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-striped table-bordered table-responsive" style="width:100%;font-size:13px;">
                <thead>
                <tr>
                    <th style="width:38px;">#</th>
                    <th>Nama</th>
                    <th>No. KTP</th>
                    <th>No. KK</th>
                    <th>Tempat, Tgl Lahir</th>
                    <th>Gender</th>
                    <th>Alamat</th>
                    <th>No. Telp</th>
                    <th>Buku Induk</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                            $no = 0;
                             foreach ($data->result_array() as $i) :
                                    $no++;
                                    $id = $i['id'];
                                    $nama = $i['nama_lengkap'];                                 
                                    if($i['NoKTPEncrypt'] != null)
                                      {
                                        $ktp = $this->encrypt->decode($i['NoKTPEncrypt']);
                                      } else
                                      {
                                        $ktp = $i['no_ktp'];
                                      }                                      
                                    $namaibu = $i['namaIbuEncrypt'];
                                    $NamaIbuDecrypt = $this->encrypt->decode($namaibu);                               
                                    $kk = $i['no_kk'];                                    
                                    $tempat_lahir = $i['tempat_lahir'];
                                    $tgl_lahir = $i['tgl_lahir'];
                                    $gender = $i['jenis_kelamin'];
                                    $alamat = $i['alamat_ktp'];
                                    $notelp = $i['telepon'];
                                    $buku_induk = $i['nmrbkinduk'];
                         ?>
                <tr>
                    <td style="text-align:left;width:38px;"><?php echo $no; ?></td>
                    <td><?php echo $nama; ?></td>
                    <td><?php echo $ktp; ?></td>
                    <td><?php echo $kk; ?></td>
                    <td><?php echo $tempat_lahir; ?>, <?= tanggal_indo($tgl_lahir)?></td>
                    <td><?php echo $gender; ?></td>
                    <td><?php echo $alamat; ?></td>
                    <td><?php echo $notelp; ?></td>
                    <td><?php echo $buku_induk; ?></td>
                    <td style="text-align:center;">                     
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
         <form class="form-horizontal" action="<?php echo base_url('AdminGereja/JemaatMeninggal/KematianJemaat')?>" method="post" enctype="multipart/form-data" role="form">
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
              <input id="KotaKematian" name="KotaKematian" type="text" Placeholder="Kota Kematian" required="required" class="form-control" style="z-index: 2000; width: 400px;" />
              </div>
            </div>

            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tempat Kematian</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="TempatKematian" name="TempatKematian" type="text" Placeholder="Tempat Kematian" required="required" class="form-control" style="z-index: 2000; width: 400px;" />
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
<?php endforeach; ?>
<!--END RIP Status -->



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