   <form onsubmit="return validateForm()" action="<?php echo base_url('warga/C_dokumen/action')?>" method="post" enctype="multipart/form-data" role="form">
       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Lengkapi Data</h5>
            <div class="card-body">
                <form class="needs-validation" novalidate>
                    <div class="row">
                      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                        <label for="">KTP</label>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="passfoto1" required>
                            <label class="custom-file-label" for="customFile">Kartu Tanda Penduduk</label>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                        <label for="">KK</label>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="passfoto2" required>
                            <label class="custom-file-label" for="customFile">Kartu Keluarga</label>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                        <label for="">Surat Pengatar</label>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="passfoto3" required>
                            <label class="custom-file-label" for="customFile">Surat Pengatar</label>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                        <label for="">Surat Baptis Anak</label>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="passfoto4" required>
                            <label class="custom-file-label" for="customFile">Surat Baptis Anak</label>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                        <label for="">Surat Baptis Dewasa</label>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="passfoto5" required>
                            <label class="custom-file-label" for="customFile">Surat Baptis Dewasa</label>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                        <label for="">Surat Sidhi</label>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="passfoto6" required>
                            <label class="custom-file-label" for="customFile">Surat Sidhi</label>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                        <label for="">Surat Nikah</label>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="passfoto7" required>
                            <label class="custom-file-label" for="customFile">Surat Nikah</label>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                        <label for="">Surat Cerai</label>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="passfoto8" required>
                            <label class="custom-file-label" for="customFile">Surat Cerai</label>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                        <label for="">Surat Kematian</label>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="passfoto9" required>
                            <label class="custom-file-label" for="customFile">Surat Kematian</label>
                        </div>
                    </div>


                </div>

                <div><?php echo $this->session->flashdata('msg');?></div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</form>