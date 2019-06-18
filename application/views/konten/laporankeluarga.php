  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php if($this->session->userdata('group_id')==='6'):?>
        Laporan Berdasar Status Keluarga
           <?php elseif($this->session->userdata('group_id')==='1'):?>
       Laporan Berdasar Status Keluarga  <br> <?= $NamaGereja?>
         <?php endif;?>
        
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Fasilitas </a></li>
        <li class="active">Laporan Berdasar Status Keluarga </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <!-- /.box-header -->
            <div class="box-body table-responsive">
            <form class="form-horizontal" onsubmit="return validateForm()" action="<?php echo base_url('Manajemenkeluarga/report_Data')?>" method="post" enctype="multipart/form-data" role="form">
             <label>Status Keluarga </label> <br>
         

          <table>
            
            <tr>
              <td>  
                <div class="checkbox">
                <label><input type="checkbox" name="status[]" id="Kepala_Keluarga" value="Kepala Keluarga">Kepala Keluarga</label>
                </div> 
              </td>

              <td>  
                <div class="checkbox">
                <label><input type="checkbox" name="status[]" id="istri" value="istri">Istri</label>
                </div> 
              </td>
            </tr>

             <tr>
              <td>  
                <div class="checkbox">
                <label><input type="checkbox" name="status[]" id="Anak" value="Anak">Anak</label>
                </div> 
              </td>
              
              <td>  
                <div class="checkbox">
                <label><input type="checkbox" name="status[]" id="Saudara" value="Saudara">Saudara</label>
                </div> 
              </td>
            </tr>

             <tr>
              <td>  
                <div class="checkbox">
                <label><input type="checkbox" name="status[]" id="Menantu" value="Menantu">Menantu</label>
                </div> 
              </td>
              
              <td>  
                <div class="checkbox">
                <label><input type="checkbox" name="status[]" id="cucu" value="cucu">Cucu</label>
                </div> 
              </td>
            </tr>

             <tr>
              <td>  
                <div class="checkbox">
                <label><input type="checkbox" name="status[]" id="Kakek/Nenek" value="Kakek/Nenek">Kakek/Nenek</label>
                </div> 
              </td>
              
              <td>  
                <div class="checkbox">
                <label><input type="checkbox" name="status[]" id="Numpang" value="Numpang">Numpang</label>
                </div> 
              </td>
            </tr>

             <tr>
              <td>  
                <div class="checkbox">
                <label><input type="checkbox" name="status[]" id="Lain-lain" value="Lain-lain">Lain-lain</label>
                </div> 
              </td>
              
              
            </tr>
          </table>
          <br>

          <table>
             <label>Jenis Kelamin</label> <br>
            
             <tr>
              <td>  
                <div class="checkbox">
                <label><input type="checkbox" name="gender[]" id="Laki-laki" value="Laki-laki">Laki-laki&nbsp;&nbsp;&nbsp;&nbsp;</label>
                </div> 
              </td>
              
              <td>  
                <div class="checkbox">
                <label><input type="checkbox" name="gender[]" id="Perempuan" value="Perempuan">Perempuan</label>
                </div> 
              </td>
            </tr>

            
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
            <label>Output</label>
             <select class="form-control" name="hasil_id">
               <option value="PDF"> PDF</option>
               <option value="XLS"> XLS </option>
             </select>
            <br>

              <input class="btn btn-primary"  type="submit" value="Lihat">
            </form>
            </div>
     

    </section>
  </div>

<script type="text/javascript">
function validateForm() {
  if($("#penghasilan").find(":selected").text() == '-- Select Penghasilan --'){
      alert("Penghasilan tidak boleh kosong!!");
      return false;
  } else if ($("#gereja").find(":selected").text() == '--pilih--'){
      alert("Gereja tidak boleh kosong!!");
      return false;
  }
  
  var cb1 = document.getElementById('Kepala_Keluarga');
     if(cb1.checked){
      var Kepala_Keluarga=$('#Kepala_Keluarga').val();
    } else {
      Kepala_Keluarga = '';
    }

    var cb2 = document.getElementById('istri');
     if(cb2.checked){
      var istri=$('#istri').val();
    } else {
      istri = '';
    }

    var cb3 = document.getElementById('Anak');
     if(cb3.checked){
      var Anak=$('#Anak').val();
    } else {
      Anak = '';
    }
    
     var cb4 = document.getElementById('Saudara');
     if(cb4.checked){
      var Saudara=$('#Saudara').val();
    } else {
      Saudara = '';
    }

     var cb5 = document.getElementById('Menantu');
     if(cb5.checked){
      var Menantu=$('#Menantu').val();
    } else {
      Menantu = '';
    }

     var cb6 = document.getElementById('cucu');
     if(cb6.checked){
      var cucu=$('#cucu').val();
    } else {
      cucu = '';
    }

     var cb7 = document.getElementById('Kakek_Nenek');
     if(cb7.checked){
      var Kakek_Nenek=$('#Kakek_Nenek').val();
    } else {
      Kakek_Nenek = '';
    }

     var cb8 = document.getElementById('Numpang');
     if(cb8.checked){
      var Numpang=$('#Numpang').val();
    } else {
      Numpang = '';
    }
    
     var cb9 = document.getElementById('Lain_lain');
     if(cb9.checked){
      var Lain_lain=$('#Lain_lain').val();
    } else {
      Lain_lain = '';
    }

     

     if(Kepala_Keluarga == '' 
      && Lain_lain == '' 
      && Kakek_Nenek == '' 
      && cucu == ''
      && Saudara == ''
      && Anak == ''
      && istri == ''
      && Kepala_Keluarga == ''
      ){
      alert("Status Keluarga tidak boleh kosong!!");
      return false;
     }
}

</script>


