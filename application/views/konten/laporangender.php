  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         <?php if($this->session->userdata('group_id')==='6'):?>
           Laporan Berdasarkan Golongan darah dan Gender Jemaat
           <?php elseif($this->session->userdata('group_id')==='1'):?>
        Laporan Berdasarkan Golongan darah dan Gender Jemaat <br>  <?= $NamaGereja?>
         <?php endif;?>
        
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Fasilitas </a></li>
        <li class="active">Laporan Berdasarkan Golongan darah dan Gender </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <!-- /.box-header -->
            <div class="box-body table-responsive">
            <form class="form-horizontal" onsubmit="return validateForm()" action="<?php echo base_url('Manajemengender/report_Data')?>" method="post" enctype="multipart/form-data" role="form">
               <h4>Keterangan : yang diberi tanda * wajib diisi</h4>
            <label>Jenis Kelamin (*)</label> <br>
              <table>
                
                <tr>
                  <td>  
                    <div class="checkbox">
                    <label><input type="checkbox" id="laki_laki" name="gender[]" value="Laki-laki">Laki-laki</label>
                    </div> 
                  </td>
                  <td width="55"></td>
                  <td>  
                    <div class="checkbox">
                    <label><input type="checkbox" id="perempuan" name="gender[]" value="Perempuan">Perempuan</label>
                    </div> 
                  </td>
                </tr>

              </table>

              <br>

              <table>

              <br>
           
              <label>Golongan darah (*) : </label>
                 <tr>
                  <td>  
                    <div class="checkbox">
                    <label><input type="checkbox" id="A" name="darah[]" value="A">A</label>
                    </div> 
                  </td>
                  <td width="55"></td>
                  <td>  
                    <div class="checkbox">
                    <label><input type="checkbox" id="B" name="darah[]" value="B">B</label>

                  </td>
                    </div> 
                  </td>
                </tr>

                 <tr>
                  <td>  
                    <div class="checkbox">
                    <label><input type="checkbox" id="AB" name="darah[]" value="AB" >AB</label>
                    </div> 
                  </td>
                  <td width="55"></td>
                  <td>  
                    <div class="checkbox">
                    <label><input type="checkbox" id="O" name="darah[]" value="O">O</label>
                    </div> 
                  </td>
                </tr>

            </table>

               
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
  
  var cb1 = document.getElementById('laki_laki');
     if(cb1.checked){
      var laki_laki=$('#laki_laki').val();
    } else {
      laki_laki = '';
    }

    var cb2 = document.getElementById('perempuan');
     if(cb2.checked){
      var perempuan=$('#perempuan').val();
    } else {
      perempuan = '';
    }

    var cb3 = document.getElementById('A');
     if(cb3.checked){
      var A=$('#A').val();
    } else {
      A = '';
    }
    
    var cb4 = document.getElementById('B');
     if(cb4.checked){
      var B=$('#B').val();
    } else {
      B = '';
    }
     
    var cb5 = document.getElementById('AB');
     if(cb5.checked){
      var AB=$('#AB').val();
    } else {
      AB = '';
    } 
    
    var cb6 = document.getElementById('O');
     if(cb6.checked){
      var O=$('#O').val();
    } else {
      O = '';
    } 
    
     if(laki_laki == '' && perempuan == '' && A == '' && B =='' && AB =='' && O == ''){
      alert("Gender dan Gol.Darah tidak boleh kosong!!");
      return false;
     }

     if($("#penghasilan").find(":selected").text() == '-- Select Penghasilan --'){
         alert("Penghasilan tidak boleh kosong!!");
         return false;
     } else if ($("#gereja").find(":selected").text() == '--pilih--'){
         alert("Gereja tidak boleh kosong!!");
         return false;
     }

}

</script>


