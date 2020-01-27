  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php if($this->session->userdata('group_id')==='6'):?>
        Laporan Khusus Jemaat
           <?php elseif($this->session->userdata('group_id')==='1'):?>
      Laporan Khusus Jemaat <br>  <?= $NamaGereja?>
         <?php endif;?>
       
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Fasilitas </a></li>
        <li class="active">Laporan Penghasilan Jemaat </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive">
            <form class="form-horizontal" onsubmit="return validateForm()" action="<?php echo base_url('Manajemenpekerjaanpenghasilan/report_Data')?>" method="post" enctype="multipart/form-data" role="form">
              <h5>Menampilkan data pendidikan jemaat berdasarkan penghasilan dan pekerjaan yang dimiliki</h5>
            <label>Penghasilan</label>
           <br>
          <select class='form-control' id='penghasilan' name="Penghasilan_id" style="z-index:2000; width:310px;">
          </select> 
          </td>
          <td>
          <label>Pekerjaan</label>
          <select class="form-control"  id='Pekerjaan' name="Pekerjaan_id" style="z-index: 2000; width: 310px;"> 
          </select>
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
            <?php endif;?> <br>
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
  var gereja = $('#gereja').val()
  if (gereja == "") {
      alert("Gereja tidak boleh kosong!!");
      return false;
  }

  return true;
}

function initDropdownPenghasilan() {
  $.ajax({
    type: "GET",
    url: base_url + "Manajemenpenghasilan/dropdown",
    dataType: "json",
    success: function(res){
      var data = res.data
      for(var i = 0; i < data.length; i++){
        console.log(data[i])
        $('#penghasilan').append(
          '<option value="{0}"> {0} </option>'.format(data[i])
        )
      }
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) { 
      console.log("Status: " + textStatus); console.log("Error: " + errorThrown); 
    }
  })
}
function initDropdownPekerjaan() {
  $.ajax({
    type: "GET",
    url: base_url + "Manajemenpekerjaan/dropdown",
    dataType: "json",
    success: function(res){
      var data = res.data
      for(var i = 0; i < data.length; i++){
        console.log(data[i])
        $('#Pekerjaan').append(
          '<option value="{0}"> {0} </option>'.format(data[i])
        )
      }
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) { 
      console.log("Status: " + textStatus); console.log("Error: " + errorThrown); 
    }
  })
}

$(document).ready(function () {
  initDropdownPenghasilan()
  initDropdownPekerjaan()
   $("form").submit(function(e) { 
    if(! validateForm()) {
      e.preventDefault();
      return;
    }
    this.submit();
  }); 
});
</script>


