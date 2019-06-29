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
              <label>Usia </label> <br>
              <table id="checkbox-table" style="width:100%">
                <tbody></tbody>
              </table>
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
 
  var cb1 = document.getElementById('menikah');
     if(cb1.checked){
      var menikah=$('#menikah').val();
    } else {
      menikah = '';
    }

    var cb2 = document.getElementById('belum_menikah');
     if(cb2.checked){
      var belum_menikah=$('#belum_menikah').val();
    } else {
      belum_menikah = '';
    }

    var cb3 = document.getElementById('janda');
     if(cb3.checked){
      var janda=$('#janda').val();
    } else {
      janda = '';
    }
    
    var cb4 = document.getElementById('duda');
     if(cb4.checked){
      var duda=$('#duda').val();
    } else {
      duda = '';
    }
     
    var cb5 = document.getElementById('single_parent');
     if(cb5.checked){
      var single_parent=$('#single_parent').val();
    } else {
      single_parent = '';
    }   
    
    
     if(menikah == '' && belum_menikah == '' && janda == '' && duda =='' && single_parent ==''){
      alert("Status Perkawinan tidak boleh kosong!!");
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
        fmt = "<td><div class='checkbox'><label><input type='checkbox' name='usia[]' value='{0}'>{1}</label></div></td>"
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
});
</script>


