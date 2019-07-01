  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         <?php if($this->session->userdata('group_id')==='6'):?>
        Laporan Berdasarkan Pendidikan Terakhir Jemaat 
           <?php elseif($this->session->userdata('group_id')==='1'):?>
   Laporan Berdasarkan Pendidikan Terakhir Jemaat <br>  <?= $NamaGereja?>
         <?php endif;?> 
       
        
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Fasilitas </a></li>
        <li class="active">Laporan Berdasarkan Pendidikan </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <!-- /.box-header -->
            <div class="box-body table-responsive">
            <form name="myForm" class="form-horizontal" action="<?php echo base_url('Manajemenpendidikan/report_Data')?>" onsubmit="return validateForm()" method="post" enctype="multipart/form-data" role="form">
               <h4>Keterangan : yang diberi tanda * wajib diisi</h4>
            <label>Pilihlah tingkat pendidikan berikut (*)</label> <br>
            <table id="checkbox-table" style="width:100%"> 
              <tbody></tbody>
                <!-- <tr>
                  <td>  
                    <div class="checkbox">
                      <label><input type="checkbox" id="tidak_sekolah" name="pendidikan[]" value="Tidak sekolah">Tidak Sekolah</label>
                    </div> 
                    <div class="checkbox">
                      <label><input type="checkbox" id="SD" name="pendidikan[]" value="SD">SD</label>
                    </div> 
                    <div class="checkbox">
                      <label><input type="checkbox" id="SMP" name="pendidikan[]" value="SMP">SMP</label>
                    </div> 
                    <div class="checkbox">
                      <label><input type="checkbox" id="SMA" name="pendidikan[]" value="SMA">SMA</label>
                    </div>
                  </td>
                  <td width="105">
                    
                  </td>
                  <td>
                    <div class="checkbox">
                      <label><input type="checkbox" id="D1" name="pendidikan[]" value="D1">D1</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" id="D2" name="pendidikan[]" value="D2">D2</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" id="D3" name="pendidikan[]" value="D3">D3</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" id="D4" name="pendidikan[]" value="D4">D4</label>
                    </div>
                  </td>
                  <td width="105">
                    
                  </td>
                  <td>  
                    <div class="checkbox">
                      <label><input type="checkbox" id="Sarjana" name="pendidikan[]" value="Sarjana">Sarjana</label>
                    </div> 
                    <div class="checkbox">
                      <label><input type="checkbox" id="S2" name="pendidikan[]" value="S2">S2</label>
                    </div> 
                    <div class="checkbox">
                      <label><input type="checkbox" id="S3" name="pendidikan[]" value="S3">S3</label>
                    </div> 
                    <div class="checkbox">
                      <label><input type="checkbox" id="Lain_lain" name="pendidikan[]" value="Lain-lain">Lain-lain</label>
                    </div> 
                  </td>
                </tr> -->
            </table>
            <br>
            <?php if($this->session->userdata('group_id')==='6'):?>
             <label>Pilih gereja berikut ini (*): </label>
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
function validateForm() {
  var gereja = $('#gereja').val()
  if (gereja == "") {
      alert("Gereja tidak boleh kosong!!");
      return false;
  }

  var status = $('input[name="pendidikan[]"]:checked').length;
  if (!status) {
      alert("Pendidikan tidak boleh kosong!!");
      return false;
  }
}

function initDropdown() {
  const col = 2
  $.ajax({
    type: "GET",
    url: base_url + "Manajemenpendidikan/dropdown",
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
        fmt = "<td><div class='checkbox'><label><input type='checkbox' name='pendidikan[]' value='{0}'>{0}</label></div></td>"
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


