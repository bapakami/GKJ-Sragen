  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php if($this->session->userdata('group_id')==='6'):?>
            Laporan Berdasarkan Pekerjaan Gerejawi Jemaat 
           <?php elseif($this->session->userdata('group_id')==='1'):?>
        Laporan Berdasarkan Pekerjaan Gerejawi Jemaat <br> <?= $NamaGereja?>
         <?php endif;?>
       
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Fasilitas </a></li>
        <li class="active">Laporan Berdasarkan Pekerjaan Gerejawi </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <!-- /.box-header -->
            <div class="box-body table-responsive">
            <form class="form-horizontal"  onsubmit="return validateForm()" action="<?php echo base_url('Manajemenaktifan/report_Data')?>" method="post" enctype="multipart/form-data" role="form">
             <label>Pekerjaan Jemaat </label> <br>
          <label> Centang semua  || Hilangkan semua Centang</label>

          <table>
            
            <tr>
              <td>  
                <div class="checkbox">
                <label><input type="checkbox" id="majelis" name="majelis" onclick="calc();" checked >Majelis</label>
                </div> 
              </td>
              <td width="55"></td>
              <td>  
                <div class="checkbox">
                <label><input type="checkbox" id="jemaat" name="jemaat" checked onclick="calc1();">Jemaat</label>
                </div> 
              </td>
              <td width="55"></td>
              <td>  
                <div class="checkbox">
                <label><input type="checkbox" id="pengurus_komisi" name="pengurus_komisi" checked onclick="calc2();">Pengurus Komisi</label>
                </div> 
              </td>
              <td width="55"></td>
              <td>  
                <div class="checkbox">
                <label><input type="checkbox" id="pengurus_wilayah" name="pengurus_wilayah" checked onclick="calc3();">Pengurus Wilayah</label>
                </div> 
              </td>
            </tr>

            

            <tr>
          <td>

          <label>Lama jabatan</label>
           <select class="form-control" id="lama_jabatan_majelis" name="lama_jabatan_majelis" style="z-index: 2000; width: 150px;"> 
           
            <option value="BETWEEN 1 AND 24"> 1-24 bulan</option>
            <option value="BETWEEN 25 AND 48"> 25 -48 bulan</option>
            <option value="BETWEEN 49 AND 72"> 49 - 72 bulan</option>
            <option value="BETWEEN 73 AND 96">73 - 96 bulan</option>
            <option value="BETWEEN 73 AND 96">97- 120 bulan</option>
            
            
          </select>
           </td>
           <td width="55"></td>

          <td>
          <label>Keikutsertaan dalam Panitia</label>
           <select class="form-control" id="keikutsertaan_majelis" name="keikutsertaan_majelis" style="z-index: 2000; width: 150px;"> 
            <option value="1-5 kali"> 1-5 bulan</option>
            <option value="6-20 kali"> 6-20 bulan</option>
            <option value="> 10 kali"> > 10 bulan </option>
          </select>
           </td>
           <td width="55"></td>
            <td>
          <label>  Lama Jabatan</label>
           <select class="form-control" id="lama_jabatan_komisi" name="lama_jabatan_komisi" style="z-index: 2000; width: 150px;"> 
            <option value="BETWEEN 1 AND 24"> 1-24 bulan</option>
            <option value="BETWEEN 25 AND 48"> 25 -48 bulan</option>
            <option value="BETWEEN 49 AND 72"> 49 - 72 bulan</option>
            <option value="BETWEEN 73 AND 96">73 - 96 bulan</option>
            <option value="BETWEEN 73 AND 96">97- 120 bulan</option>
          </select>
           </td>
          <td width="55"></td>
           <td>
          <label>  Keikutsertaan dalam panitia</label>
           <select class="form-control" id="keikutsertaan_komisi" name="keikutsertaan_komisi" style="z-index: 2000; width: 150px;"> 
            <option value="1-5 kali"> 1-5 bulan</option>
            <option value="6-20 kali"> 6-20 bulan</option>
            <option value="> 10 kali"> > 10 bulan</option>
          </select>
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
            <?php endif;?><br>
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
function calc()
{
  if (document.getElementById('majelis').checked) 
  {
      $('#lama_jabatan_majelis').prop('disabled', false);
  } else {
     $('#lama_jabatan_majelis').prop('disabled', true);
  }
}

function calc1()
{
  if (document.getElementById('jemaat').checked) 
  {
      $('#keikutsertaan_majelis').prop('disabled', false);
  } else {
     $('#keikutsertaan_majelis').prop('disabled', true);
  }
}  

function calc2()
{
  if (document.getElementById('pengurus_komisi').checked) 
  {
      $('#lama_jabatan_komisi').prop('disabled', false);
  } else {
     $('#lama_jabatan_komisi').prop('disabled', true);
  }
}  

 function calc3()
{
  if (document.getElementById('pengurus_wilayah').checked) 
  {
      $('#keikutsertaan_komisi').prop('disabled', false);
  } else {
     $('#keikutsertaan_komisi').prop('disabled', true);
  }
}  
    
  
  function validateForm() {
  var cb1 = document.getElementById('majelis');
     if(cb1.checked){
      var majelis=$('#majelis').val();
    } else {
      majelis = '';
    }

    var cb2 = document.getElementById('jemaat');
     if(cb2.checked){
      var jemaat=$('#jemaat').val();
    } else {
      jemaat = '';
    }

    var cb3 = document.getElementById('pengurus_komisi');
     if(cb3.checked){
      var pengurus_komisi=$('#pengurus_komisi').val();
    } else {
      pengurus_komisi = '';
    }
    
    var cb4 = document.getElementById('pengurus_wilayah');
     if(cb4.checked){
      var pengurus_wilayah=$('#pengurus_wilayah').val();
    } else {
      pengurus_wilayah = '';
    }
     
    
     if(majelis == '' && jemaat == '' && pengurus_komisi == '' && pengurus_wilayah ==''){
      alert("checkbox tidak boleh kosong!!");
      return false;
     }

     if($("#penghasilan").find(":selected").text() == '-- Select Penghasilan --'){
         alert("Penghasilan tidak boleh kosong!!");
         return false;
     } else if ($("#gereja").find(":selected").text() == '--pilih--'){
         alert("Gereja tidak boleh kosong!!");
         return false;
     }

     // function validateForm() {
     //     if($("#penghasilan").find(":selected").text() == '-- Select Penghasilan --'){
     //         alert("Penghasilan tidak boleh kosong!!");
     //         return false;
     //     } else if ($("#gereja").find(":selected").text() == '--pilih--'){
     //         alert("Gereja tidak boleh kosong!!");
     //         return false;
     //     }
     // }
}

</script>


