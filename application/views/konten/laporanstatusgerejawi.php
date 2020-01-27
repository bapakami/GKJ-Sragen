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
            <form class="form-horizontal" onsubmit="return validateForm()" action="<?php echo base_url('ManajemenStatusGerejawi/report_Data')?>" method="post" enctype="multipart/form-data" role="form">
              <h4>Keterangan = yang bertanda * wajib diisi. </h4> <br>

                        <br>
              <label>Status Gerejawi* (*)</label>
               <table>
                           <tr>
                            <td>  
                              <div class="checkbox">
                              <label><input type="checkbox" name="BelumBaptisSidhi" value="Belum Baptis Anak dan Sidhi">Belum Baptis Anak dan Sidhi</label>
                              </div> 
                            </td>
                            
                            <td>  
                              <div class="checkbox">
                              <label><input type="checkbox" name="HanyaSidhi" value="Hanya Sidhi">Hanya Sidhi</label>
                              </div> 
                            </td>
                          </tr>

                           <tr>
                            <td>  
                              <div class="checkbox">
                              <label><input type="checkbox" name="HanyaBaptis" value="Hanya Baptis">Hanya Baptis Anak</label>
                              </div> 
                            </td>
                             <td>  
                              <div class="checkbox">
                              <label><input type="checkbox" name="BaptisdanSidhi" value="Baptis Anak dan Sidhi">Baptis Anak dan Sidhi</label>
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
                              <label><input type="checkbox" id="Warga" name="statusWarga[]" value="Warga">Warga</label>
                              </div> 
                            </td>
                            
                            <td>  
                              <div class="checkbox">
                              <label><input type="checkbox" id="Tamu" name="statusWarga[]" value="Tamu">Tamu</label>
                              </div> 
                            </td>
                          </tr>

                           <tr>
                            <td>  
                              <div class="checkbox">
                              <label><input type="checkbox" id="Warga_Belajar" name="statusWarga[]" value="Warga Belajar">Warga Belajar</label>
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
 var status = $('input[name="statusWarga[]"]:checked').length;
  if (!status) {
      alert("Anda belum memilih list statusWarga");
      return false;
  }

  var gereja = $('#gereja').val()
  if (gereja == "") {
      alert("Gereja tidak boleh kosong!!");
      return false;
  }
  return true;
}
    
</script>


