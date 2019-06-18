<div class="content-wrapper">
        <!--personal-info-->
         


        <!-- Main content -->
       <section class="content">
         <!-- <div class="row"> -->
           
               <div class="box" style="padding: 8px;">
                   <h3>Data Tugas Anggota Magang </h3>
               </div>
               <div class="box text-right" style="padding: 10px; margin-bottom: 0px;">
                     
                      <!--  <?php echo anchor(site_url('world/excel'), 'Excel', 'class="btn btn-primary"'); ?>
                       <a class="btn btn-primary" href="#tambah_data" data-toggle="modal"><i class="fa fa-fw fa-plus"></i> Tambah</a> -->
                       
               </div>
               <div class="box">
                   <div class="box-body">
                       <table class="table table-bordered table-striped" id="mytable">
                           <thead>
                               <tr>
                                   <th>Tanggal</th>
                                    <th>Mingguan</th>
                                    <th>Lain-lain</th>
                                    <th>Total</th>
                                    <th>Gereja</th>
                                    <th style="text-align: right;">Aksi</th>
                               </tr>
                           </thead>
                       </table>
                   </div>
               </div>
           

         <!-- </div> -->
        </section>        

</div><!-- /.content-wrapper -->


<script type="text/javascript">
  $(document).ready(function(){
    tampil_data_barang(); //pemanggilan fungsi tampil barang.
    
    $('#mydata').dataTable();
     
    //fungsi tampil barang
    function tampil_data_barang(){
        $.ajax({
            type  : 'ajax',
            url   : '<?php echo base_url()?>Datapersembahan/data_persembahan',
            async : false,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                var x ;        
                var y;         
                var z;  
                for(i=0; i<data.length; i++){
                    x = parseInt(data[i].total);
                    y = parseInt(data[i].mingguan);
                    z = x + y;
                    html += '<tr>'+
                          '<td>'+data[i].tgl+'</td>'+
                            '<td>'+data[i].mingguan+'</td>'+
                            '<td>'+data[i].total+'</td>'+
                            '<td>'+z+'</td>'+
                            '<td>'+data[i].nama_gereja+'</td>'+
                            '<td>'+
                            '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="'+data[i].id_persembahan+'">Edit</a>'+' '+
                                    '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].id_persembahan+'">Hapus</a>'+
                                '</td>'+
                            '</tr>';
                }
                $('#show_data').html(html);
            }

        });
    }

    //GET UPDATE
    $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('index.php/barang/get_barang')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  $.each(data,function(barang_kode, barang_nama, barang_harga){
                      $('#ModalaEdit').modal('show');
                  $('[name="kobar_edit"]').val(data.barang_kode);
                  $('[name="nabar_edit"]').val(data.barang_nama);
                  $('[name="harga_edit"]').val(data.barang_harga);
                });
                }
            });
            return false;
        });


    //GET HAPUS
    $('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
        });

    //Simpan Barang
    $('#btn_simpan').on('click',function(){
            var kobar=$('#kode_barang').val();
            var nabar=$('#nama_barang').val();
            var harga=$('#harga').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/barang/simpan_barang')?>",
                dataType : "JSON",
                data : {kobar:kobar , nabar:nabar, harga:harga},
                success: function(data){
                    $('[name="kobar"]').val("");
                    $('[name="nabar"]').val("");
                    $('[name="harga"]').val("");
                    $('#ModalaAdd').modal('hide');
                    tampil_data_barang();
                }
            });
            return false;
        });

        //Update Barang
    $('#btn_update').on('click',function(){
            var kobar=$('#kode_barang2').val();
            var nabar=$('#nama_barang2').val();
            var harga=$('#harga2').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/barang/update_barang')?>",
                dataType : "JSON",
                data : {kobar:kobar , nabar:nabar, harga:harga},
                success: function(data){
                    $('[name="kobar_edit"]').val("");
                    $('[name="nabar_edit"]').val("");
                    $('[name="harga_edit"]').val("");
                    $('#ModalaEdit').modal('hide');
                    tampil_data_barang();
                }
            });
            return false;
        });

        //Hapus Barang
        $('#btn_hapus').on('click',function(){
            var kode=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/barang/hapus_barang')?>",
            dataType : "JSON",
                    data : {kode: kode},
                    success: function(data){
                            $('#ModalHapus').modal('hide');
                            tampil_data_barang();
                    }
                });
                return false;
            });

  });

</script>