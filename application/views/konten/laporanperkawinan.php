  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
           <?php if($this->session->userdata('group_id')==='6'):?>
             Laporan Berdasarkan Status Perkawinan Jemaat
           <?php elseif($this->session->userdata('group_id')==='1'):?>
             Laporan Berdasarkan Status Perkawinan Jemaat <br> <?= $NamaGereja?>
         <?php endif;?>
       
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Fasilitas </a></li>
        <li class="active">Laporan Berdasarkan Status Perkawinan </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <!-- /.box-header -->
            <div class="box-body table-responsive">
            <form class="form-horizontal" action="<?php echo base_url('Manajemenperkawinan/report_Data')?>" method="post" enctype="multipart/form-data" role="form">
             <h5>Laporan ini adalah laporan data jemaat berdasarkan status nikah jemaat.
               Dimana data jemaat dapat ditampilkan berdasarkan Asal Gereja</h5> <br>
                <label>Status Perkawinan </label>
                         <table>
                           
                           <tr>
                             <td>  
                               <div class="checkbox">
                               <label><input type="checkbox" id="menikah" name="perkawinan[]" value="Menikah">Menikah</label>
                               </div> 
                             </td>

                             <td>  
                               <div class="checkbox">
                               <label><input type="checkbox" id="belum_menikah" name="perkawinan[]" value="Belum Menikah">Belum Menikah</label>
                               </div> 
                             </td>
                           </tr>

                            <tr>
                             <td>  
                               <div class="checkbox">
                               <label><input type="checkbox" id="janda" name="perkawinan[]" value="Janda">Janda</label>
                               </div> 
                             </td>
                             
                             <td>  
                               <div class="checkbox">
                               <label><input type="checkbox" id="duda" name="perkawinan[]" value="Duda">Duda</label>
                               </div> 
                             </td>
                           </tr>

                           <tr>
                             <td>  
                               <div class="checkbox">
                               <label><input type="checkbox" id="single_parent" name="perkawinan[]" value="Single Parent">Single Parent</label>
                               </div> 
                             </td>
                           </tr>
                            
                           
                         </table>

                          
                         <br>
                         
            <?php if($this->session->userdata('group_id')==='6'):?>
             <label>Asal Gereja : </label>
             <select class='form-control' id='gereja' name="gereja">
                <option value=''>--pilih--</option>
                  <?php 
                    foreach ($gereja as $grj) {
                      echo "<option value='$grj[id]'>$grj[namagereja]</option>";
                    }
                  ?>
              </select>
            <?php elseif($this->session->userdata('group_id')==='1'):?>
              <input type="hidden" id="gereja" name="gereja" value="<?= $this->session->userdata('gereja_id') ?>">
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
function validateForm() {
  var status = $('input[name="perkawinan[]"]:checked').length;
  if (!status) {
      alert("Anda belum memilih list perkawinan");
      return false;
  }

  var gereja = $('#gereja').val()
  if (gereja == "") {
      alert("Gereja tidak boleh kosong!!");
      return false;
  }

  return true;
}

$(document).ready(function () {
  $("form").submit(function(e) { 
    if(! validateForm()) {
      e.preventDefault();
      return;
    }
    this.submit();
  }); 
});
</script>


