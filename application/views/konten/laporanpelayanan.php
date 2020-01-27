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
            <form class="form-horizontal" action="<?php echo base_url('Manajemenpelayanan/report_Data')?>" method="post" enctype="multipart/form-data" role="form">
            <h5>tanda * harus diisi (boleh lebih dari satu) </h5>
          <label>Minat Pelayanan*</label>
          <table id="checkbox-table" style="width:100%">
            <tbody></tbody>
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
  var status = $('input[name="minat[]"]:checked').length;
  if (!status) {
      alert("Status Pelayanan tidak boleh kosong!!");
      return false;
  }

  var gereja = $('#gereja').val()
  if (gereja == "") {
      alert("Gereja tidak boleh kosong!!");
      return false;
  }
  
  return true;
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
  $("form").submit(function(e) { 
    if(! validateForm()) {
      e.preventDefault();
      return;
    }
    this.submit();
  }); 
});
</script>


