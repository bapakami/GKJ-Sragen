  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Penghasilan Jemaat <?php if($this->session->userdata('group_id')==='1'):?><?= $NamaGereja?><?php endif;?>
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
            <form name="myForm" class="form-horizontal" action="<?php echo base_url('Manajemenpenghasilan/insertData')?>" method="post" enctype="multipart/form-data" role="form">
              <h4>Data Jemaat Berdasar Penghasilan</h4>
             <label>Penghasilan</label>
              <select class="form-control" name="penghasilan" id="penghasilan"> 
               <option value='0'>-- Select Penghasilan --</option>
             </select>
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
              <input type="hidden" id="gereja" name="gereja" value="<?= $this->session->userdata('gereja_id') ?>">
            <?php endif;?><br>
            <label>Output</label>
             <select class="form-control" name="hasil_id">
               <option value="PDF"> PDF</option>
               href="<?= site_url('AdminGereja/Jemaat/export') ?>"
               <option value="XLS"> XLS </option>
               <option value="GRAPH"> Grafik </option>
             </select>
            <br>

              <input class="btn btn-primary" type="submit" value="Lihat">
            </form>
            </div>
     

    </section>
  </div>

<script type="text/javascript">
function validateForm() {
   var status = $('#penghasilan').val()
   if (status == 0) {
       alert("Anda belum memilih list penghasilan");
       return false;
   }

   var gereja = $('#gereja').val()
   if (gereja == 0) {
       alert("Gereja tidak boleh kosong!!");
       return false;
   }

   return true;
}

function initDropdown() {
  $.ajax({
    type: "GET",
    url: base_url + "Manajemenpenghasilan/dropdown",
    dataType: "json",
    success: function(res){
      var data = res.data
      for(var i = 0; i < data.length; i++){
        console.log(data[i])
        $('[name="penghasilan"]').append(
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


