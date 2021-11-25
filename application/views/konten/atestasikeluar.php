  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manajemen Akun (Atestasi Keluar)
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="pendetaa/pendeta"><i class="fa fa-briefcase"></i> Menu Pendeta </a></li>
        <li class="active">Permintaan Atestasi Keluar </li>
      </ol> 
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
<!-- 

            <div class="box-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#tambah_data"><span class="fa fa-plus"></span> Tambah Data</a>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-striped table-bordered table-responsive" style="width:100%;font-size:13px;">
                <thead>
                  <tr>
                    <th style="width:38px;">#</th>
                    
                    <th>Nama Lengkap</th>
                    <th>Gereja Baru</th>
                    <th>Pepantan</th>
                    <th>Keterangan</th>
                    <!-- <th>Asal Gereja</th> -->
                    <th style="text-align:center;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 0;
                  foreach ($data->result_array() as $i) :
                    $no++;
                    $id = $i['id_jemaat'];                 
                                    // $namagereja = $i['namagereja'];
                    ?>
                    <tr>
                      <td style="text-align:left;width:38px;"><?php echo $no; ?></td>
                      <td><?php  echo $i['nama_lengkap'];  ?></td>
                      <td><?php $this->lib->nama_gereja($i['id_gereja_baru']);  ?></td>
                      <td><?php $this->lib->nama_pepantan($i['pepantan']); ?></td>
                      <td><?php echo $i['keterangan']; ?></td>
                      <td style="text-align:center;"> 
                        <span data-toggle="tooltip" data-placement="top" data-original-title="Tinjau">
                          <!-- <a data-toggle="modal" data-target="#detail_data<?php echo $id; ?>">
                            <button type="button" class="btn btn-white btn-xs" title="View Details"><i class="fa fa-eye"> Tinjau</i></button>
                          </a> -->
                        </span> 
                        <span data-toggle="tooltip" data-placement="top" data-original-title="Ambil Tindakan ">
                          <a data-toggle="modal" data-target="#edit_data<?php echo $id; ?>">
                            <button type="button" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-switch"></i> Ambil Tindakan</button>
                          </a>
                        </span> 
                       <!-- <span data-toggle="tooltip" data-placement="top" data-original-title="Hapus">
                          <a data-toggle="modal" data-target="#ModalHapus<?php echo $id; ?>">
                            <button type="button" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash"></i> Hapus</button>
                          </a>
                        </span>   -->

                      </td>
                    </tr>   
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>


          </section>
        </div>
        <!-- jk===================================================================================================================================================================== -->


        <!-- UPDATE -->

        <?php foreach ($data->result_array() as $i) :
          $id = $i['id_jemaat'];         
          $dokumen = $this->db->get_where('tb_dokumen_warga', array('id_warga' => $i['id']))->row_array();       
          $nama_lengkap = $i['nama_lengkap'];
          $id_gereja_baru = $i['id_gereja_baru'];
          $pepantan = $i['pepantan'];                                    
          $keterangan = $i['keterangan'];
          $state = $i['state'];
          ?>



          <div class="modal fade" id="edit_data<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header modal-header-success">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                  <h3>Tinjau berkas Atestasi Keluar</h3> 
                </div>
                <div class="modal-body">
                  <form id="xyz_<?= $id; ?>">
                    <div class="row">
                      <div class="form-group">
                        <div class="col-md-2">Nama</div>
                        <div class="col-md-10">: <?= $i['nama_lengkap']?></div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-2">Gereja Tujuan</div>
                        <div class="col-md-10">: <?php $this->lib->nama_gereja($i['id_gereja_baru']);?></div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-2">Alamat Tinggal</div>
                        <div class="col-md-10">: <?= $i['alamat_tinggal']?></div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-2">Alasan Atestasi</div>
                        <div class="col-md-10">: <?= str_replace('<p>', '', $i['keterangan'])?></div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-2">Email</div>
                          <div class="col-md-10">: <?= $i['alamat_email']?></div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-2">Telepon Rumah</div>
                          <div class="col-md-10">: <?= $i['telepon_rumah']?></div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-2">No handphone</div>
                          <div class="col-md-10">: <?= $i['telepon_wa']?></div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-2">&nbsp;</div>
                          <div class="col-md-5">: 
                            <label style="margin-left: 50px;"><b>Akte Lahir</b></label><br>
                            <input disabled="disabled" type="file" id="akte_lahir" class="dropify" <?php if ($i['akte_lahir'] != '' || $$i['akte_lahir'] != null) { ?> data-default-file="<?= base_url($i['akte_lahir']) ?>" <?php } ?> />
                          </div>
                          <div class="col-md-5">
                            <label style="margin-left: 130px; "><b>Surat Atestasi</b></label><br>
                            <input type="hidden" name="idx" id="idx_<?= $id?>" value="<?= $dokumen['id_warga']?>">
                            <input onchange="simpanFoto('astestasi_<?= $id?>')" type="file" id="astestasi_<?= $id?>" class="dropify" <?php if ($dokumen['astestasi'] != '' || $dokumen['astestasi'] != null) { ?> data-default-file="<?= base_url($dokumen['astestasi']) ?>" <?php } ?> />
                          </div>
                        </div><br>
                        <div class="form-group">
                          <div class="col-md-2">Status Jemaat</div>
                          <div class="col-md-10">
                            <div class="form-group" style="margin-left: 5px;">
                              <input type="radio" value="1" required name="pilih">
                              <label for="terima">Terima</label>
                              <input type="radio" value="2" required name="pilih">
                              <label for="tolak">Tolak</label>
                            </div>
                          </div><br>
                        </div>
                        <div class="form-group">
                          <div class="col-md-2">Alasan Penolakan</div>
                          <div class="col-md-10">
                            <input type="hidden" name="id" value="<?= $i['id_jemaat']?>">
                            <textarea width="400" name="alasan" placeholder="Isikan Alasan Jika Menolak"></textarea>
                          </div>
                        </div><br>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Proses</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <script>
              var id = "<?= $i['id_jemaat'] ?>";

              $('#xyz_'+ id).on('submit', (function(e) {
                e.preventDefault();

                $.ajax({
                  url: '<?= site_url("Atestasi/Atestasikeluar/insertData/") ?>',
                  type: 'POST',
                  data: new FormData(this),
                  dataType: 'json',
                  contentType: false,
                  cache: false,
                  processData: false,
                  success: function(response) {
                    if (response.s == 'sukses') {
                      toastr.success(response.m);
                      setTimeout(function() {
                        location.reload();
                      }, 1500);
                    } else {
                      toastr.error(response.m);
                    }
                  },
                });

              }));

              function simpanFoto(nm) {
                var idx = "<?= $i['id_jemaat'] ?>";
                var fd = new FormData();
                var id = $('#idx_'+idx).val();
                var nmx = nm.split('_');
                var nma = nmx[0];
                console.log(nmx)
                var files = $('#' + nm)[0].files[0];
                fd.append('file', files);
                fd.append('jenis', nma);
                fd.append('id', id);
                console.log($('#' + nm).val())

                $.ajax({
                  url: '<?= site_url("warga/jemaat/asyncr") ?>',
                  type: 'post',
                  data: fd,
                  dataType: "json",
                  contentType: false,
                  processData: false,
                  success: function(response) {
                    if (response.status == 'sukses') {
                      toastr.success(response.message);
                    } else {
                      toastr.error(response.message);
                    }
                  },
                });
              } 
            </script>
          <?php endforeach; ?>

          <script type="text/javascript">

            $(document).ready(function () {

              $('#example1').DataTable( {
                responsive: true
              });

              
              $('#alasan').hide();
              $('#pilih').on('change', function() {    
               if($('#pilih').val() == '2') {
                 $('#alasan').show();
                 $('#alasan').attr('required', 'required');
               } else {
                $('#alasan').hide();
                $('#astestasi').attr('required', 'required');
                $('#alasan').removeAttr('required');
              } 
            });

              $('textarea').wysihtml5({
            "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
            "emphasis": true, //Italics, bold, etc. Default true
            "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
            "html": false, //Button which allows you to edit the generated HTML. Default false
            "link": true, //Button to insert a link. Default true
            "image": true, //Button to insert an image. Default true,
            "color": false //Button to change color of font  
          });

              new $.fn.dataTable.FixedHeader( table );

    //Update Barang
    $('#btn_edit').click(function(){
      alert("ehe");
      return false;
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
  });


            var resultPassword = "";

            $('#password, #confirm_password').on('keyup', function () {
              if ($('#password').val() == $('#confirm_password').val()) {
                $('#message').html('Matching').css('color', 'green');
                $('#btn_tambah').prop('disabled', false);
                resultPassword = "true";
              } else {
                $('#btn_tambah').prop('disabled', true);
                $('#message').html('Not Matching').css('color', 'red');
                resultPassword = "false";
              }

            });
            $('#ubah_password').prop('disabled', true);
            $('#password_edit, #confirm_password_edit').on('keyup', function () {
              if ($('#password_edit').val() == $('#confirm_password_edit').val()) {
                $('#message_edit').html('Matching').css('color', 'green');

                $('#ubah_password').prop('disabled', false);
              } else {
                $('#ubah_password').prop('disabled', true);
                $('#message_edit').html('Not Matching').css('color', 'red');

              }

            });

            function validateForm() {
              if($('#username').val() == ''){
                alert("Username tidak boleh kosong!!");
                return false;
              } else if($('#fullname').val() == ''){
                alert("FullName tidak boleh kosong!!");
                return false;
              } else if(resultPassword == "false"){
                alert("Password tidak Sama!!");
                return false;
              } else if($('#telephone').val() == ''){
                alert("Telephone tidak boleh kosong!!");
                return false;
              } else if($('#email').val() == ''){
                alert("Email tidak boleh kosong!!");
                return false;
              } else if ($("#gereja").find(":selected").text() == '--pilih--'){
                alert("Asal Gereja tidak boleh kosong!!");
                return false;
              }
            }

            $(document).ready(function() {
              $('.dropify').dropify();
            }); 
          </script>


