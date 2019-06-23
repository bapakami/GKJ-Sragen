  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php if($this->session->userdata('group_id')==='6'):?>
       Laporan Berdasarkan Minat Pelayanan Jemaat
           <?php elseif($this->session->userdata('group_id')==='1'):?>
    Laporan Berdasarkan Minat Pelayanan Jemaat <br>  <?= $NamaGereja?>
         <?php endif;?>
       
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Fasilitas </a></li>
        <li class="active">Laporan Berdasarkan Minat Pelayanan </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <!-- /.box-header -->
            <div class="box-body table-responsive">
            <form class="form-horizontal" onsubmit="return validateForm()" action="<?php echo base_url('Manajemenpelayanan/report_Data')?>" method="post" enctype="multipart/form-data" role="form">
            <h5>tanda * harus diisi (boleh lebih dari satu) </h5> <br> 

         
          <label>Minat Pelayanan*</label>
          <table>
            
            <tr>
              <td>  
                <div class="checkbox">
                <label><input type="checkbox" name="minat[]" id="Paduan_Suara" value="Paduan suara">Paduan Suara</label>
                </div> 
              </td>

              <td>  
                <div class="checkbox">
                <label><input type="checkbox" name="minat[]" id="Pengurus_Komisi" value="Pengurus komisi">Pengurus Komisi</label>
                </div> 
              </td>
            </tr>

             <tr>
              <td>  
                <div class="checkbox">
                <label><input type="checkbox" name="minat[]" id="Pengiring_Ibadah" value=" Pengiring ibadah">Pengiring ibadah</label>
                </div> 
              </td>
              
              <td>  
                <div class="checkbox">
                <label><input type="checkbox" name="minat[]" id="Menjadi_Majelis" value="Menjadi majelis">Menjadi majelis</label>
                </div> 
              </td>
            </tr>

             <tr>
              <td>  
                <div class="checkbox">
                <label><input type="checkbox" name="minat[]" id="Memimpin_PA" value="Memimpin PA">Memimpin PA</label>
                </div> 
              </td>
              
              <td>  
                <div class="checkbox">
                <label><input type="checkbox" name="minat[]" id="bahan_pa" value="Membuat bahan PA">Membuat bahan PA</label>
                </div> 
              </td>
            </tr>

             <tr>
              <td>  
                <div class="checkbox">
                <label><input type="checkbox" name="minat[]" id="guru_minggu" value="Guru sekolah minggu">Guru sekolah minggu</label>
                </div> 
              </td>
              
              <td>  
                <div class="checkbox">
                <label><input type="checkbox" name="minat[]" id="pendamping_pemuda" value="Mendampingi anak/remaja/pemuda">Mendampingi Anak/Remaja/Pemuda</label>
                </div> 
              </td>
            </tr>

             <tr>
              <td>  
                <div class="checkbox">
                <label><input type="checkbox" name="minat[]" id="Panitia_Pembangunan" value="Panitia pembangunan">Panitia Pembangunan</label>
                </div> 
              </td>
              
              <td>  
                <div class="checkbox">
                <label><input type="checkbox" name="minat[]" id="Multimedia" value="Multimedia">Multimedia</label>
                </div> 
              </td>
            </tr>

             <tr>
              <td>  
                <div class="checkbox">
                <label><input type="checkbox" name="minat[] " id="Administrasi" value="Administrasi gereja">Administrasi Gereja</label>
                </div> 
              </td>
              
              <td>  
                <div class="checkbox">
                <label><input type="checkbox" name="minat[]" id="Lain_lain" value="Lain_lain">Lain-lain</label>
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
            <?php endif;?><br>
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
  
  var cb1 = document.getElementById('Paduan_Suara');
     if(cb1.checked){
      var Paduan_Suara=$('#Paduan_Suara').val();
    } else {
      Paduan_Suara = '';
    }

    var cb2 = document.getElementById('Lain_lain');
     if(cb2.checked){
      var Lain_lain=$('#Lain_lain').val();
    } else {
      Lain_lain = '';
    }

    var cb3 = document.getElementById('Administrasi');
     if(cb3.checked){
      var Administrasi=$('#Administrasi').val();
    } else {
      Administrasi = '';
    }
    
     var cb4 = document.getElementById('Multimedia');
     if(cb4.checked){
      var Multimedia=$('#Multimedia').val();
    } else {
      Multimedia = '';
    }

     var cb5 = document.getElementById('Panitia_Pembangunan');
     if(cb5.checked){
      var Panitia_Pembangunan=$('#Panitia_Pembangunan').val();
    } else {
      Panitia_Pembangunan = '';
    }

     var cb6 = document.getElementById('pendamping_pemuda');
     if(cb6.checked){
      var pendamping_pemuda=$('#pendamping_pemuda').val();
    } else {
      pendamping_pemuda = '';
    }

     var cb7 = document.getElementById('guru_minggu');
     if(cb7.checked){
      var guru_minggu=$('#guru_minggu').val();
    } else {
      guru_minggu = '';
    }

     var cb8 = document.getElementById('bahan_pa');
     if(cb8.checked){
      var bahan_pa=$('#bahan_pa').val();
    } else {
      bahan_pa = '';
    }
    
     var cb9 = document.getElementById('Memimpin_PA');
     if(cb9.checked){
      var Memimpin_PA=$('#Memimpin_PA').val();
    } else {
      Memimpin_PA = '';
    }


    var cb9 = document.getElementById('Menjadi_Majelis');
     if(cb9.checked){
      var Menjadi_Majelis=$('#Menjadi_Majelis').val();
    } else {
      Menjadi_Majelis = '';
    }

    var cb9 = document.getElementById('Pengiring_Ibadah');
     if(cb9.checked){
      var Pengiring_Ibadah=$('#Pengiring_Ibadah').val();
    } else {
      Pengiring_Ibadah = '';
    }


    var cb9 = document.getElementById('Pengurus_Komisi');
     if(cb9.checked){
      var Pengurus_Komisi=$('#Pengurus_Komisi').val();
    } else {
      Pengurus_Komisi = '';
    }

     

     if(Pengurus_Komisi == '' 
      && Pengiring_Ibadah == '' 
      && Menjadi_Majelis == '' 
      && Memimpin_PA == ''
      && bahan_pa == ''
      && guru_minggu == ''
      && pendamping_pemuda == ''
      && Panitia_Pembangunan == ''
      && Multimedia == ''
      && Administrasi == ''
      && Lain_lain == ''
      && Paduan_Suara == ''

      ){
      alert("Status Pelayanan tidak boleh kosong!!");
      return false;
     }
}


function initDropdown() {
  const col = 2
  $.ajax({
    type: "GET",
    url: base_url + "ManajemenPelayanan/dropdown",
    dataType: "json",
    success: function(res){
      console.log(res)
      var data = res.data
      var tbl = $('#checkbox-table tbody')
      $.each(data, function(i, val) {
        if(i%col==0) {
          tbl.append("<tr></tr>")
        }
        var elem = tbl.find("tr").last();
        fmt = "<td><div class='checkbox'><label><input type='checkbox' name='minat[]' value='{0}'>{0}</label></div></td>"
        elem.append(fmt.format(val))
        console.log(val)
      })
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) { 
      console.log("Status: " + textStatus); console.log("Error: " + errorThrown); 
    }
  })
}
$(document).ready(function () {
  initDropdown()
});
</script>


