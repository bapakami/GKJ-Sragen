  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Kematian Jemaat <?php if($this->session->userdata('group_id')==='1'):?> <?= $NamaGereja?> <?php endif;?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Fasilitas </a></li>
        <li class="active">Laporan Kematian Jemaat </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <!-- /.box-header -->
            <div class="box-body table-responsive">
            <form class="form-horizontal" onsubmit="return validateForm()" action="<?php echo base_url('ManajemenKematian/ReportData')?>" method="post" enctype="multipart/form-data" role="form">
             
            <?php if($this->session->userdata('group_id')==='6'):?>
             <label>Asal Gereja : </label>
             <select class='form-control' id='gereja' name="gereja">
                <option value='0'>--pilih--</option>
                  <?php 
                    foreach ($gereja as $grj) {
                      echo "<option value='$grj[id]'>$grj[namagereja]</option>";
                    }
                  ?>
              </select>
            <?php elseif($this->session->userdata('group_id')==='1'):?>
              <input type="text" value="<?= $NamaGereja?>" class="form-control" readonly="readonly" style="z-index: 2000; width: 400px;" />
            <?php endif;?><br>
            <label>Output</label>
             <select class="form-control" name="hasil_id" style="z-index: 2000; width: 400px;">
               <option value="PDF"> PDF</option>
               <option value="XLS"> XLS </option>
               <!-- <option value="GRAPH"> Grafik </option> -->
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
}

</script>


