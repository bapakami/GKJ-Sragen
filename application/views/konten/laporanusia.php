  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php if($this->session->userdata('group_id')==='6'):?>
            Laporan Berdasarkan Usia Jemaat Gerejawi 
           <?php elseif($this->session->userdata('group_id')==='1'):?>
              Laporan Berdasarkan Usia Jemaat Gerejawi <br> <?= $NamaGereja?>
         <?php endif;?>
       
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Fasilitas </a></li>
        <li class="active">Laporan Berdasarkan Usia</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <!-- /.box-header -->
            <div class="box-body table-responsive">
           <form class="form-horizontal" onsubmit="return validateForm()" action="<?php echo base_url('Manajemenusia/report_Data')?>" method="post" enctype="multipart/form-data" role="form">
              <label>Range Lahir </label> <br>
<!--               <table id="checkbox-table" style="width:100%">
                <tbody></tbody>
              </table> -->
              <div class="row">
                <div class="col-sm-4">
                  <input type="text" name="startusia" id="startusia" placeholder="from" class="form-control datepicker" required="required">
                </div>                
                <div class="col-sm-4">
                  <input type="text" name="endusia" id="endusia" placeholder="To" class="form-control datepicker" required="required">
                </div>
              </div>
                 <br>
                 <table>
                 <label>Status Pernikahan</label> <br>

                   <tr>
                   <td>  
                     <div class="checkbox">
                     <label><input type="checkbox" id="menikah" name="status[]" value="Menikah">Menikah</label>
                     </div> 
                   </td>

                   <td>  
                     <div class="checkbox">
                     <label><input type="checkbox" id="belum_menikah" name="status[]" value="Belum Menikah">Belum Menikah</label>
                     </div> 
                   </td>
                 </tr>

                  <tr>
                   <td>  
                     <div class="checkbox">
                     <label><input type="checkbox" id="janda" name="status[]" value="Janda">Janda</label>
                     </div> 
                   </td>
                   
                   <td>  
                     <div class="checkbox">
                     <label><input type="checkbox" id="duda" name="status[]" value="Duda">Duda</label>
                     </div> 
                   </td>
                 </tr>

                 <tr>
                   <td>  
                     <div class="checkbox">
                     <label><input type="checkbox" id="single_parent" name="status[]" value="Single Parent">Single Parent</label>
                     </div> 
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
 var usiastart = $('#startusia').length;
 var usiaend = $('#endusia').length;
  if (!usiastart || !usiaend) {
      alert("Usia tidak boleh kosong!!");
      return false;
  }

  var status = $('input[name="status[]"]:checked').length;
  if (!status) {
      alert("Kategori status tidak boleh kosong!!");
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
    url: base_url + "Manajemenusia/dropdown",
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
        fmt = "<td><div class='checkbox'><label><input type='checkbox' name='usia[]' value='{0}'>{0}</label></div></td>"
        elem.append(fmt.format(val.usia, val.deskripsi))
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
<script type="text/javascript">
  $(document).ready(function () {
          $('.datepicker').datepicker({
    format: "yyyy-mm-dd",
          autoclose: true,
      });
  });
</script>


