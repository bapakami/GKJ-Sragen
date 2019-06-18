  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manajemen Persembahan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Fasilitas </a></li>
        <li class="active">Manajemen Persembahan </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <br>
            <span>* Keterangan : Jumlah adalah total dari Syukur, Perpuluhan, Khusus Mirunggan, Pembangunan, Minggguan, dan Bulanan.</span>


            <!-- <div class="box-header" style="color: #000000">
            <div class="form-group">
            <form class="form-horizontal" action="<?php echo base_url('Klasis/ManajemenJemaat/getData')?>" method="post" enctype="multipart/form-data" role="form">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilih Gereja</label>
                <div class="col-md-4 col-sm-9 col-xs-12">
                  <select name="pilihgereja">
                    <option value='0'>--pilih Gereja--</option>
                            <?php 
                                foreach ($gereja as $grj) {
                                    echo "<option value='$grj[id]'>$grj[namagereja]</option>";
                                }
                            ?>
                  </select>
                  <button class="btn btn-info" type="submit">Cari</button>
                </div>
            </div>
            </form>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" onchange="toggle();" class="table table-striped table-bordered table-responsive" style="width:100%;font-size:13px;">
                <thead>
                <tr>
                    <th style="width:38px;">#</th>
                    <th>Tanggal Persembahan</th>
                    <th>Nama Gereja</th>
                    <th>Nama Pepantan</th>
                    <th>Jumlah*</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                            $no = 0;
                             foreach ($data->result_array() as $i) :
                                    $no++;
                                    $id = $i['id'];
                                    $jumlah = $i['syukur']+$i['perpuluhan']+$i['khusus_mirunggan']+$i['pembangunan']+$i['mingguan']+$i['bulanan'];
                         ?>
                <tr>
                    <td style="text-align:left;width:38px;"><?php echo $no; ?></td>
                    <td><?php echo date('j F Y', strtotime($i['tgl_persembahan'])); ?></td>
                    <td><?php echo $i['namagereja']; ?></td>
                    <td><?php echo $i['namapepantan']; ?></td>
                    <td><?php echo $jumlah; ?></td>
                    <td style="text-align:center;"> 
                        <span data-toggle="tooltip" data-placement="top" data-original-title="Lihat Detail Jemaat">
                          <a data-toggle="modal" data-target="#detail_data<?php echo $i['id']; ?>">
                            <button type="button" class="btn btn-white btn-xs" title="View Details"><i class="fa fa-eye"> Detail</i></button>
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

<?php foreach ($data->result_array() as $i) :
    $jumlah = $i['syukur']+$i['perpuluhan']+$i['khusus_mirunggan']+$i['pembangunan']+$i['mingguan']+$i['bulanan'];
?>
<!--DETAIL DATA -->
<div class="modal fade" id="detail_data<?php echo $i['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-header-success">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          <h3>Detail Data Persembahan</h3>
        </div>
        <form class="form-horizontal" onsubmit="return validateForm()" action="<?php echo base_url('Datapersembahan')?>" method="post" enctype="multipart/form-data" role="form">
        <input type="hidden" name="iddetail" value="<?= $i['id'] ?>">
        <div class="modal-body">
          <div class="col-md-12">
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Persembahan</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="tgl_persembahan_detail" name="tgl_persembahan_detail" value="<?= date('j F Y', strtotime($i['tgl_persembahan']))?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Gereja</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="namagereja_detail" name="namagereja_detail" value="<?= $i['namagereja']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Mingguan</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="mingguan_detail" name="mingguan_detail" value="<?= $i['mingguan']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Bulanan</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="bulanan_detail" name="bulanan_detail" value="<?= $i['bulanan']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Perjamuan</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="perjamuan_detail" name="perjamuan_detail" value="<?= $i['perjamuan']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Baptis Sidi</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="baptis_sidi_detail" name="baptis_sidi_detail" value="<?= $i['baptis_sidi']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ibadah Pernikahan</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="ibadah_pernikahan_detail" name="ibadah_pernikahan_detail" value="<?= $i['ibadah_pernikahan']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Hari Raya</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="hari_raya_detail" name="hari_raya_detail" value="<?= $i['hari_raya']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tahunan</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="tahunan_detail" name="tahunan_detail" value="<?= $i['tahunan']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Khusus Mirunggan</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="khusus_mirunggan_detail" name="khusus_mirunggan_detail" value="<?= $i['khusus_mirunggan']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Bidston</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="bidston_detail" name="bidston_detail" value="<?= $i['bidston']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ibadah HUT Gereja</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="ibadah_hut_gereja_detail" name="ibadah_hut_gereja_detail" value="<?= $i['ibadah_hut_gereja']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ibadah Hari Besar</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="ibadah_hari_besar_detail" name="ibadah_hari_besar_detail" value="<?= $i['ibadah_hari_besar']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ibadah Awal Musim</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="ibadah_awal_musim_detail" name="ibadah_awal_musim_detail" value="<?= $i['ibadah_awal_musim']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Mpdk Mphb Mpan</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="mpdk_mphb_mpan_detail" name="mpdk_mphb_mpan_detail" value="<?= $i['mpdk_mphb_mpan']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Rapat Majelis</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="rapat_majelis_detail" name="rapat_majelis_detail" value="<?= $i['rapat_majelis']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Lain-Lain</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="lain_lain_detail" name="lain_lain_detail" value="<?= $i['lain_lain']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Persembahan Pendidikan</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="persembahan_pendidikan_detail" name="persembahan_pendidikan_detail" value="<?= $i['persembahan_pendidikan']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Pers Pemangggilan Pendidikan</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="pers_pemanggilan_pendidikan_detail" name="pers_pemanggilan_pendidikan_detail" value="<?= $i['pers_pemanggilan_pendidikan']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Doa Alkitab</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="doa_alkitab_detail" name="doa_alkitab_detail" value="<?= $i['doa_alkitab']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">HUT Sinode</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="hut_sinode_detail" name="hut_sinode_detail" value="<?= $i['hut_sinode']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Bencana Kemanusiaan</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="bencana_kemanusiaan_detail" name="bencana_kemanusiaan_detail" value="<?= $i['bencana_kemanusiaan']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Bantuan Pihak Lain</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="bantuan_pihak_lain_detail" name="bantuan_pihak_lain_detail" value="<?= $i['bantuan_pihak_lain']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Bp Menggoro</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="bp_menggoro_detail" name="bp_menggoro_detail" value="<?= $i['bp_menggoro']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kadarman</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="kadarman_detail" name="kadarman_detail" value="<?= $i['kadarman']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Dana Abadi</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="dana_abadi_detail" name="dana_abadi_detail" value="<?= $i['dana_abadi']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tahun Baru</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="tahun_baru_detail" name="tahun_baru_detail" value="<?= $i['tahun_baru']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Adiyuswa</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="adiyuswa_detail" name="adiyuswa_detail" value="<?= $i['adiyuswa']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Bulan Oikumene</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="bulan_oikumene_detail" name="bulan_oikumene_detail" value="<?= $i['bulan_oikumene']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Paguyuban Malem 11an</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="paguyuban_malem_11an_detail" name="paguyuban_malem_11an_detail" value="<?= $i['paguyuban_malem_11an']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Pembangunan</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="pembangunan_detail" name="pembangunan_detail" value="<?= $i['pembangunan']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Iuran Danasosial Warga</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="iuran_danasosial_warga_detail" name="iuran_danasosial_warga_detail" value="<?= $i['iuran_danasosial_warga']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pepantan</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="namapepantan_detail" name="namapepantan_detail" value="<?= $i['namapepantan']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Perpuluhan</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="perpuluhan_detail" name="perpuluhan_detail" value="<?= $i['perpuluhan']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Syukur</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="syukur_detail" name="syukur_detail" value="<?= $i['syukur']?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah (Syukur, Perpuluhan, Khusus Mirunggan, Pembangunan, Minggguan, dan Bulanan)</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="jumlah_detail" name="jumlah_detail" value="<?= $jumlah; ?>" class="form-control" type="text" Placeholder="" style="z-index: 2000; width: 400px;" readonly/>
              </div>
            </div>
            <br>

            </div>
            <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </form>
    </div>
   </div>
</div>
<!--tutup DETAIL DATA -->
<?php endforeach; ?>

<script type="text/javascript">
$(document).ready(function () {
   $('#example1').DataTable( {
        responsive: true
    } );
 
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
    
</script>