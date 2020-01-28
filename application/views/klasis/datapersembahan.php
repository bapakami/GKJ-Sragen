  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manajemen Persembahan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Fasilitas </a></li>
        <li class="active">Manajemen Persembahan </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">


            <div class="box-header" style="color: #000000">
            <div class="form-group">
            <form class="form-horizontal" action="<?php echo base_url('Klasis/Datapersembahan/getData')?>" method="post" enctype="multipart/form-data" role="form">               
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="col-md-5">
                       <div class="form-group">                          
                               <select class="form-control" name="pilihgereja">
                                <option value='0'>--Pilih Gereja--</option>
                                        <?php 
                                            foreach ($gereja as $grj) {
                                                echo "<option value='$grj[id]'>$grj[namagereja]</option>";
                                            }
                                        ?>
                              </select>                              
                       </div>
                   </div>
                  <div class="col-md-2"></div>
                  <div class="col-md-5">
                       <div class="form-group">                                                               
                                   <select class="form-control" name="persembahan">
                                       <option>--Pilih Persembahan--</option>
                                       <option value="Mingguan">Mingguan</option>
                                       <option value="Bulanan">Bulanan</option>
                                       <option value="Khusus">Khusus</option>
                                       <option value="Pembangunan">Pembangunan</option>
                                       <option value="Perpuluhan">Perpuluhan</option>
                                       <option value="Syukur">Syukur</option>
                                   </select>                            
                       </div>
                   </div>
                </div>
                <button class="btn btn-info" type="submit">Cari</button>
            </div>
            </form>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive" style="display: <?php if( $idgereja === 0):?> none; <?php endif; ?>">
              <table id="example1" onchange="toggle();" class="table table-striped table-bordered table-responsive" style="width:100%;font-size:13px;">
                <thead>
                <tr>
                    <th style="width:38px;">#</th>
                    <th>Persembahan</th> 
                    <?php if($Mingguan === 'Mingguan'):?>                   
                    <th>Minggu</th>
                    <?php endif;?>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>Jumlah</th>
                    <th>Asal Gereja</th>
                    <th>Sumber</th>                    
                </tr>
                </thead>
                <tbody>
                        <?php
                            $no = 0;
                             foreach ($data->result_array() as $i) :
                                    $no++;
                                    $id = $i['Idx'];
                         ?>
                <tr>
                    <td style="text-align:left;width:38px;"><?php echo $no; ?></td>
                    <td><?php echo $i['Type']; ?></td>
                    <?php if($Mingguan === 'Mingguan'):?> 
                    <td><?php echo $i['Minggu'];?> </td>
                    <?php endif;?>
                    <td><?php echo $i['Bulan']; ?></td>
                    <td><?php echo $i['Tahun']; ?></td>
                    <td><?php echo 'Rp '.number_format($i['Jumlah']); ?></td>
                    <td><?php echo $i['namagereja']; ?></td>
                    <td><?php echo $i['Sumber_persembahan']; ?></td>                    
                </tr>   
    <?php endforeach; ?>
                </tbody>
              </table>
            </div>

            <div style="display: <?php if( $idgereja != 0):?> none;<?php endif; ?>">
            <br><br>
                <h3><p><center>Silahkan Memilih Gereja dan Jenis Persembahan Untuk Menampilkan Data</center></p></h3>
                <br><Br>
            </div>
     

    </section>
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
    

window.test = function(e) {
  if (e.value === 'AN01') {
    console.log(e.value);
  } else if (e.value === 'AN02') {
    console.log(e.value);
  } else if (e.value === 'AN03') {
    console.log(e.value);
  }
}


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