  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
    <h1>
     Manajemen Jemaat Layanan Nikah
     <small></small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-briefcase"></i> Fasilitas </a></li>
     <li class="active">Manajemen Jemaat Layanan Nikah</li>
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
                  <th>Nama Mempelai Pria</th>
                  <!-- <th>Tgl. Lahir Mempelai Pria</th> -->
                  <th>Nama Mempelai Wanita</th>
                  <th>Tanggal Pendaftaran</th>
                  <!-- <th>Tgl. Lahir Mempelai Wanita</th> -->
                  <!-- <th>Saksi Pernikahan</th> -->
                  <th style="text-align:center;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 0;
                foreach ($data->result_array() as $i) :
                  $no++;
                  $id = $i['id_warga'];                 
                  ?>
                  <tr>
                    <td style="text-align:left;width:38px;"><?php echo $no; ?></td>
                    <td><?php echo $i['nama_suami'];  ?></td>
                    <!-- <td><?php echo $i['tgl_lahir_suami'];  ?></td> -->
                    <td><?php echo $i['nama_istri'];  ?></td>
                    <td><?php echo $i['tgl_pendaftaran'];  ?></td>
                    <!-- <td><?php echo $i['tgl_lahir_istri'];  ?></td> -->
                    <!-- <td><?php echo $i['saksi_pernikahan']; ?></td> -->
                    <td style="text-align:center;"> 
                      <span data-toggle="tooltip" data-placement="top" data-original-title="Percakapan">
                        <button class="btn btn-xs"><span> <?php $this->lib->cekChat($id, 4); ?></button>
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
          $id = $i['id_warga'];                       

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
                <h3>Tinjau berkas Layanan Nikah</h3>
              </div>
              <div class="modal-body">
                <form id="xyz_<?= $id; ?>" class="form-horizontal" >


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
                    <div class="col-md-2">Nama Mempelai Pria</div>
                    <div class="col-md-10">: <?php echo $i['nama_suami']; ?></div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-2">Tgl. Lahir Mempelai Pria</div>
                    <div class="col-md-10">: <?php echo $i['tgl_lahir_suami'];?></div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-2">Nama Mempelai Wanita</div>
                    <div class="col-md-10">: <?php echo $i['nama_istri'];?></div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-2">Tgl. Lahir Mempelai Wanita</div>
                    <div class="col-md-10">: <?php echo $i['tgl_lahir_istri']?></div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-2">Saksi</div>
                    <div class="col-md-10">: <?php echo $i['saksi_pernikahan']?></div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-2">Tanggal Nikah</div>
                    <input type="hidden" name="nama_suami" value="<?= $i['nama_suami']?>">
                    <input type="hidden" name="nama_istri" value="<?= $i['nama_istri']?>">
                    <!-- <input type="hidden" name="tgl_pendaftaran" value="<?= $i['tgl_pendaftaran']?>"> -->
                    <input type="hidden" name="id" value="<?= $i['id_warga']?>"> 
                    <div class="col-md-6"><input type="text" name="tgl_pendaftaran" class="form-control tanggal" required="required" value="<?= isset($n->tgl_lahir_istri)?date('d-m-Y', strtotime($n->tgl_lahir_istri)):''?>"></div>
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

          function startChat(id)
          {
            $('#tampil_form2').load("<?=site_url()?>/pendetaa/chattingan/4/"+id,function(){
              $('#modal_form2').modal('show');
            });
          }
          var id = '<?= $i["id_warga"] ?>';
          $('#xyz_'+id).on('submit', (function(e) {
            e.preventDefault();

            $.ajax({
              url: '<?= site_url("Nikah/Nikah/insertData/") ?>',
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
        </script>
      <?php endforeach; ?>

      <!--tutup Detail DATA -->
      <script type="text/javascript">
        $(document).ready(function() {  
          $('.tanggal').datepicker({
            format: "dd-mm-yyyy",
            autoclose:true
          }); 

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
