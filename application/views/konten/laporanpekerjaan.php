  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php if($this->session->userdata('group_id')==='6'):?>
         Laporan Berdasarkan Pekerjaan Gerejawi Jemaat
           <?php elseif($this->session->userdata('group_id')==='1'):?>
      Laporan Berdasarkan Pekerjaan Gerejawi Jemaat <br>  <?= $NamaGereja?>
         <?php endif;?>
        
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Fasilitas </a></li>
        <li class="active">Laporan Berdasarkan Pekerjaan </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <!-- /.box-header -->
            <div class="box-body table-responsive">
            <form name="myForm" class="form-horizontal" action="<?php echo base_url('Manajemenpekerjaan/report_Data')?>" method="post" enctype="multipart/form-data" role="form">
            <label><b>Pekerjaan Jemaat</b> </label> <br>       
            <table id="checkbox-table" style="width:100%">
              <tbody></tbody>
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
  var cb1 = document.getElementById('belum_bekerja');
     if(cb1.checked){
      var belum_bekerja=$('#belum_bekerja').val();
    } else {
      belum_bekerja = '';
    }

    var cb2 = document.getElementById('tidak_bekerja');
     if(cb2.checked){
      var tidak_bekerja=$('#tidak_bekerja').val();
    } else {
      tidak_bekerja = '';
    }

    var cb3 = document.getElementById('PNS');
     if(cb3.checked){
      var PNS=$('#PNS').val();
    } else {
      PNS = '';
    }
    
    var cb4 = document.getElementById('TNI_Polri');
     if(cb4.checked){
      var TNI_Polri=$('#TNI_Polri').val();
    } else {
      TNI_Polri = '';
    }
     
    var cb5 = document.getElementById('DPR');
     if(cb5.checked){
      var DPR=$('#DPR').val();
    } else {
      DPR = '';
    } 
    
    var cb6 = document.getElementById('Wiraswasta');
     if(cb6.checked){
      var Wiraswasta=$('#Wiraswasta').val();
    } else {
      Wiraswasta = '';
    } 

    var cb7 = document.getElementById('Swasta');
     if(cb7.checked){
      var Swasta=$('#Swasta').val();
    } else {
      Swasta = '';
    }
    
    var cb8 = document.getElementById('Pensiunan');
     if(cb8.checked){
      var Pensiunan=$('#Pensiunan').val();
    } else {
      Pensiunan = '';
    }
    
    var cb9 = document.getElementById('Petani');
     if(cb9.checked){
      var Petani=$('#Petani').val();
    } else {
      Petani = '';
    } 
    
    var cb10 = document.getElementById('Nelayan');
     if(cb10.checked){
      var Nelayan=$('#Nelayan').val();
    } else {
      Nelayan = '';
    }  
    
    var cb11 = document.getElementById('mengurus_rumah_tangga');
     if(cb11.checked){
      var mengurus_rumah_tangga=$('#mengurus_rumah_tangga').val();
    } else {
      mengurus_rumah_tangga = '';
    }  
    
    var cb12 = document.getElementById('Pedagang');
     if(cb12.checked){
      var Pedagang=$('#Pedagang').val();
    } else {
      Pedagang = '';
    } 
    
    var cb13 = document.getElementById('perangkat_desa');
     if(cb13.checked){
      var perangkat_desa=$('#perangkat_desa').val();
    } else {
      perangkat_desa = '';
    }  

    var cb14 = document.getElementById('Pelajar_Mahasiswa');
     if(cb14.checked){
      var Pelajar_Mahasiswa=$('#Pelajar_Mahasiswa').val();
    } else {
      Pelajar_Mahasiswa = '';
    }
    
    var cb15 = document.getElementById('Lain_Lain');
     if(cb15.checked){
      var Lain_Lain=$('#Lain_Lain').val();
    } else {
      Lain_Lain = '';
    }
    
     if(belum_bekerja == '' && tidak_bekerja == '' && PNS == '' && TNI_Polri =='' && DPR =='' && Wiraswasta == '' && Swasta == '' && Pensiunan == '' && Petani == '' && Nelayan =='' && mengurus_rumah_tangga == '' && Pedagang=='' && perangkat_desa =='' && Pelajar_Mahasiswa=='' && Lain_Lain ==''){
      alert("Pekerjaan Jemaat tidak boleh kosong!!");
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
    url: base_url + "Manajemenpekerjaan/dropdown",
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
        fmt = "<td><div class='checkbox'><label><input type='checkbox' name='pekerjaan[]' value='{0}'>{0}</label></div></td>"
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


