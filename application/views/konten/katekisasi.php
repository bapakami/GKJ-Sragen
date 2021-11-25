  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
    <h1>
     Manajemen Jemaat Katekisasi
     <small></small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-briefcase"></i> Fasilitas </a></li>
     <li class="active">Manajemen Jemaat Katekisasi</li>
   </ol>
 </section>

 <!-- Main content -->
 <section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-body table-responsive">
          <table id="example1" class="table table-striped table-bordered table-responsive" style="width:100%;font-size:13px;">
            <thead>
              <tr>
                <th style="width:38px;">#

                  <th>Nama Lengkap</th>
                  <th>Jenis Kelamin</th>
                  <th>Nama Ayah</th> 
                  <th>Nama Ibu</th>
                  <th style="text-align:center;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 0;
                foreach ($data->result_array() as $i) :
                  $no++;
                  $id = $i['id_jemaat'];                 
                  ?>
                  <tr>
                    <td style="text-align:left;width:38px;"><?php echo $no; ?></td>
                    <td><?php echo $i['nama_lengkap'];  ?></td>
                    <td><?php echo $i['jenis_kelamin'];  ?></td>
                    <td><?php echo $i['nama_ayah']; ?></td>
                    <td><?php echo $i['nama_ibu']; ?></td>
                    <td style="text-align:center;"> 
                      <span data-toggle="tooltip" data-placement="top" data-original-title="Percakapan">
                        <button class="btn btn-xs"><span> <?php $this->lib->cekChat($id, 1); ?></button>
                        </span> 
                        <span data-toggle="tooltip" data-placement="top" data-original-title="Ambil Tindakan ">
                          <a data-toggle="modal" data-target="#edit_data<?php echo $id; ?>">
                            <button type="button" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-switch"></i> Ambil Tindakan</button>
                          </a>
                        </span> 

                      </td>
                    </tr>   
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>


          </section>
        </div>

        <!--Detail DATA -->

        <?php foreach ($data->result_array() as $i) :
          $id = $i['id_jemaat'];
          $idx = $i['id_jemaat'];                       
          $no = 0;
          $foto = $i['foto'];
          if ($foto == '' || $foto == null) {
            if ($i['jenis_kelamin'] == 'Perempuan') {
              $fotox = base_url() . 'assets/img/avatar2.png';
            } else {
              $fotox = base_url() . 'assets/img/avatar5.png';
            }
          } else {
            $fotox = base_url($i['foto']);
          }
          ?>
          <div class="modal fade" id="edit_data<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">              
             <div class="modal-content">
              <div class="modal-header modal-header-success">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3>Tinjau berkas Katekisasi</h3>
              </div>
              <div class="modal-body">
                <form id="xyz_<?= $i['id_jemaat'] ?>" class="form-horizontal" >
                  <label><b>Berkas Jemaat</b></label><br>
                  <hr>
                  <div class="form-group">
                    <div class="col-md-3">
                      <label><b>Akte Lahir</b></label><br>
                      <img src="<?= $fotox; ?>" alt="foto" width="150">
                    </div>
                  </div>
                  <br>


                  <label><b>Data Lengkap Jemaat</b></label><br>
                  <hr>
                  <div class="form-group">
                    <div class="col-md-2">Nama Lengkap</div>
                    <div class="col-md-10">: <?php echo $i['nama_lengkap']; ?></div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-2">Jenis Kelamin</div>
                    <div class="col-md-10">: <?php echo $i['jenis_kelamin'];?></div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-2">Nama Ayah</div>
                    <div class="col-md-10">: <?php echo $i['nama_ayah'];?></div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-2">Nama Ibu</div>
                    <div class="col-md-10">: <?php echo $i['nama_ibu']?></div>
                  </div>                
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
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Proses</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
        <div id="modal_form2" class="modal" data-width="800" data-height="400">
          <div style="width: 100%;" id="tampil_form2"></div>
        </div>

        <script> 
          var id = "<?= $i['id_jemaat'] ?>";
          $('#xyz_'+id).on('submit', (function(e) {
            e.preventDefault();

            $.ajax({
              url: '<?= site_url("Katekisasi/Katekisasi/insertData/") ?>',
              type: 'POST',
              data: new FormData(this),
              dataType: "json",
              contentType: false,
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

        </script>
      <?php endforeach; ?>
      <!--tutup Detail DATA -->


      <script>   
      /*$('.chattingan').on('click', function() {
        var id = $(this).attr('id');
        cekChat(id);
      });*/

      function startChat(id)
      {
        $('#tampil_form2').load("<?=site_url()?>/pendetaa/chattingan/1/"+id,function(){
          $('#modal_form2').modal('show');
        });
      }

      $('#xyz').on('submit', (function(e) {
        e.preventDefault();

        $.ajax({
          url: '<?= site_url("Katekisasi/Katekisasi/insertData/") ?>',
          type: 'POST',
          data: new FormData(this),
          dataType: "json",
          contentType: false,
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

      $(document).ready(function() {   

        $('#example1').DataTable( {
          responsive: true
        });

        $('textarea').wysihtml5({
          "font-styles": true, 
          "emphasis": true, 
          "lists": true, 
          "html": false, 
          "link": true, 
          "image": true, 
          "color": false 
        });

      });

    </script>
