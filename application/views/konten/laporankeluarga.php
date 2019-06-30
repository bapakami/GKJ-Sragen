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
              <label>Status Keluarga </label>
              <table id="checkbox-table" style="width:100%">
                <tbody></tbody>
              </table>
              <br>
              <label>Jenis Kelamin</label> 
              <table style="width:100%">
                  <tbody>
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
                  </tbody>
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

  var status = $('input[name="status[]"]:checked').length;
  if (!status) {
      alert("Status Keluarga tidak boleh kosong!!");
      return false;
  }
  
  var gender = $('input[name="gender[]"]:checked').length;
  if (!gender) {
      alert("Jenis Kelamin tidak boleh kosong!!");
      return false;
  }

  return true;
}


function initDropdown() {
  const col = 2
  $.ajax({
    type: "GET",
    url: base_url + "Manajemenkeluarga/dropdown",
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
        fmt = "<td><div class='checkbox'><label><input type='checkbox' name='status[]' value='{0}'>{0}</label></div></td>"
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


