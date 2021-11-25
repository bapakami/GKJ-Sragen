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
            <form class="form-horizontal" action="<?php echo base_url('Manajemengender/report_Data')?>" method="post" enctype="multipart/form-data" role="form">
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
            <label>Output (Pilih PDF untuk hasil lebih lengkap)</label>
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
  var gender = $('input[name="gender[]"]:checked').length;
  if (!gender) {
      alert("Anda belum memilih list gender");
      return false;
  }

  var darah = $('input[name="darah[]"]:checked').length;
  if (!darah) {
      alert("Anda belum memilih list golongan darah");
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


