  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         <?php if($this->session->userdata('group_id')==='6'):?>
           Laporan Berdasarkan Status Gerejawi Jemaat 
           <?php elseif($this->session->userdata('group_id')==='1'):?>
        Laporan Berdasarkan Status Gerejawi Jemaat <br> <?= $NamaGereja?>
         <?php endif;?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Fasilitas </a></li>
        <li class="active">Laporan Berdasarkan Status Gerejawi </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <!-- /.box-header -->
            <div class="box-body table-responsive">
            <form class="form-horizontal" action="<?php echo base_url('ManajemenStatusGerejawi/report_Data')?>" method="post" enctype="multipart/form-data" role="form">
              <h4>Keterangan = yang bertanda * wajib diisi. </h4> <br>
              <label>Status Gerejawi* (Pilih salah satu)</label>
               <table>
                           <tr>
                            <td>  
                              <div class="checkbox">
                              <label><input type="checkbox" name="status[]" value="Belum Baptis dan Sidhi">Belum Baptis dan Sidhi </label>
                              </div> 
                            </td>
                            
                            <td>  
                              <div class="checkbox">
                              <label><input type="checkbox" name="status[]" value="Hanya Sidhi">Hanya Sidhi</label>
                              </div> 
                            </td>
                          </tr>

                           <tr>
                            <td>  
                              <div class="checkbox">
                              <label><input type="checkbox" name="status[]" value="Hanya Baptis">Hanya Baptis</label>
                              </div> 
                            </td>
                             <td>  
                              <div class="checkbox">
                              <label><input type="checkbox" name="status[]" value="Baptis dan Sidhi">Baptisdan Sidhi</label>
                              </div> 
                            </td>
                          </tr>
              </table>

                         
                        <br>
              <label>Status Warga (*)</label>
               <table>
                           <tr>
                            <td>  
                              <div class="checkbox">
                              <label><input type="checkbox" id="Warga" name="statuswarga[]" value="Warga">Warga</label>
                              </div> 
                            </td>
                            
                            <td>  
                              <div class="checkbox">
                              <label><input type="checkbox" id="Tamu" name="statuswarga[]" value="Tamu">Tamu</label>
                              </div> 
                            </td>
                          </tr>

                           <tr>
                            <td>  
                              <div class="checkbox">
                              <label><input type="checkbox" id="Warga_Belajar" name="statuswarga[]" value="Warga Belajar">Warga Belajar</label>
                              </div> 
                            </td>
                            
                            

                          
                        </table>

                         
                        <br>
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
              <input type="hidden" name="gereja" value="<?= $this->session->userdata('gereja_id') ?>">
            <?php endif;?>

            <br>
            <label>Output (untuk Data Daftar Jemaat, Pilih PDF/XLS): </label>
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
 var status = $('input[name="status[]"]:checked').length;
  if (!status) {
      alert("Anda belum memilih list status");
      return false;
  }

  var statuswarga = $('input[name="statuswarga[]"]:checked').length;
  if (!statuswarga) {
      alert("Anda belum memilih list statuswarga");
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


