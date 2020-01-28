<style type="text/css">
     table{
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
      }

      td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }
</style>
<div class="container">
  <section id="main-content">
    <section class="wrapper">
        <h1>Laporan Penghasilan Jemaat</h1>
        <h4>Penghasilan : </h4>
    <div class="box">
      <div class="box-body">
          <div id="reload">
            <table id="mydata" class="table table-striped" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <!-- <th>Gambar</th> -->
                    <th>Nama Lengkap</th>
                    <th>Gender</th>
                    <th>Pendidikan Akhir</th>
                    <th>Pekerjaan</th>
                    <th>Alamat Tinggal</th>
                    <th>Asal Gereja</th>
                  </tr>
                </thead>
                <tbody id="show_data">
                </tbody>
            </table>
          </div>
      </div>
    </div>
    </section>
  </section>
</div>


<script type="text/javascript">
   $(document).ready(function(){
        tampil_data_barang();   //pemanggilan fungsi tampil barang.
         
        $('#mydata').dataTable();
          
        //fungsi tampil barang
        function tampil_data_barang(){ 

            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url('Iuran/pengecualian_iuran_edit/')?>',
                async : false,
                dataType : 'json',
                success : function(data){
                  console.log(data);
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].id+'</td>'+
                                '<td>'+data[i].nama_siswa+'</td>'+
                                '<td>'+
                                    '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="'+data[i].id+'">Edit</a>'+' '+
                                    '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].id+'">Hapus</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }
 
            });
        }
 
        
 
    });
</script>