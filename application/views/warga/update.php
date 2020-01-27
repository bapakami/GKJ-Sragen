   <form onsubmit="return validateForm()" action="<?php echo base_url('warga/C_Warga/edit/')?>" method="post" enctype="multipart/form-data" role="form">
       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Lengkapi Data</h5>
            <div class="card-body">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6 ">
                            <label for="validationCustom01">Nama Depan</label>
                            <input type="text" class="form-control" id="validationCustom01" name="namadepan" value="<?php echo $data->nama_depan ?>" placeholder="Nama Depan" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                            <label for="validationCustom02">Nama Belakang</label>
                            <input type="text" class="form-control" id="validationCustom02" value="<?php echo $data->nama_belakang ?>"name="namabelakang" placeholder="Nama Belakang"required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-4 ">
                            <label for="validationCustom02">Tempat Lahir</label>
                            <input type="text" class="form-control" id="validationCustom02" name="tempatlahir" value="<?php echo $data->tempat_lahir ?>"placeholder="Tempat Lahir"required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">
                            <label for="validationCustom02">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="validationCustom02" name="tanggallahir" value="<?php echo $data->tanggal_lahir ?>"required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                            <label for="">Pass Foto</label>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="customFile" name="passfoto" value="<?php echo $data->passfoto ?>">
                                <label class="custom-file-label" for="customFile">Pass Foto</label>
                            </div>
                        </div>


                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                           <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat"><?php echo $data->alamat ?>"</textarea>
                        </div>
                    </div>

                    <div><?php echo $this->session->flashdata('msg');?></div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="<?php echo base_url('warga/c_warga/dasboard') ?>" class="btn btn-danger">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</form>