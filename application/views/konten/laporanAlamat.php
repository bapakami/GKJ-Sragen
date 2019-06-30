  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         <?php if($this->session->userdata('group_id')==='6'):?>
          Laporan Berdasar Tempat Tinggal Jemaat
           <?php elseif($this->session->userdata('group_id')==='1'):?>
        Laporan Berdasar Tempat Tinggal Jemaat <br> <?= $NamaGereja?>
         <?php endif;?>
        
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Fasilitas </a></li>
        <li class="active">Laporan Berdasar Tempat Tinggal </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <!-- /.box-header -->
            <div class="box-body table-responsive">
            <form class="form-horizontal" onsubmit="return validateForm()" action="<?php echo base_url('ManajemenAlamat/report_Data')?>" method="post" enctype="multipart/form-data" role="form">
               <h4>Keterangan : yang diberi tanda * wajib diisi</h4>
             <label>Alamat Jemaat (*) </label>
                <input id="alamat" name="alamat" class="form-control" type="text" style="z-index: 2000; width: 310px;" value="" required="" />
                  <br>
            <?php if($this->session->userdata('group_id')==='6'):?>
             <label>Asal Gereja (*) : </label>
             <select class='form-control' id='gereja' name="gereja">
                <option value='0'>--pilih--</option>
                  <?php 
                    foreach ($gereja as $grj) {
                      echo "<option value='$grj[id]'>$grj[namagereja]</option>";
                    }
                  ?>
              </select>
            <?php elseif($this->session->userdata('group_id')==='1'):?>
              <input type="hidden" name="gereja" value="<?= $this->session->userdata('gereja_id') ?>">
            <?php endif;?>
            <br>
            <label>Output</label>
             <select class="form-control" name="hasil_id">
               <option value="PDF"> PDF</option>
               <option value="XLS"> XLS </option>
               <option value="GRAPH"> Grafik </option>
             </select>
            <br>

              <input class="btn btn-primary"  type="submit" value="Lihat">
            </form>
            </div>
     

    </section>
  </div>

<script type="text/javascript">
$(document).ready(function () {
   $('#example1').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );

});
    
function validateForm() {
  if($("#penghasilan").find(":selected").text() == '-- Select Penghasilan --'){
      alert("Penghasilan tidak boleh kosong!!");
      return false;
  } else if ($("#gereja").find(":selected").text() == '--pilih--'){
      alert("Gereja tidak boleh kosong!!");
      return false;
  }

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


