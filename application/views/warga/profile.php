<style type="text/css">
  .noselect {
    -webkit-touch-callout: none; /* iOS Safari */
    -webkit-user-select: none; /* Safari */
    -khtml-user-select: none; /* Konqueror HTML */
    -moz-user-select: none; /* Firefox */
    -ms-user-select: none; /* Internet Explorer/Edge */
            user-select: none; /* Non-prefixed version, currently
            supported by Chrome and Opera */
          }
        </style>
        <form onsubmit="return validateForm()" action="<?php echo base_url('warga/C_Warga/lengkapidata')?>" method="post" enctype="multipart/form-data" role="form">
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card">
            <h5 class="card-header">User Profile</h5>
            <div class="card-body">
              <form class="needs-validation" novalidate>
                <div class="row">


                  <div class="row">
                    <div class="col-xl-10 offset-xl-1">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="hero-text">
                            <h2><?php echo $data->nama_depan." ".$data->nama_belakang ?></h2>
                            <hr></hr>
                            <p style="color: white" class="noselect">I’m a digital designer in love with photography, painting and discovering new worlds and cultures. </p>
                          </div>
                          <div class="hero-info">
                            <h2>Informasi User</h2>
                            <ul>
                              <li><span>NIK : </span><?php echo $dt->nik ?></li>
                              <li><span>Email : </span><?php echo $dt->email ?></li>
                              <li><span>Tempat Lahir : </span><?php echo $data->tempat_lahir ?></li>
                              <li><span>Tanggal Lahir : </span><?php echo $data->tanggal_lahir ?></li>
                              <li><span>Alamat : </span><?php echo $data->alamat ?></li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <img src="<?php echo base_url('assets/upload/image/'.$data->passfoto) ?>" class="img img-responsive" width="250">
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                   <div class="form-group">

                   </div>
                 </div>

                 <div><?php echo $this->session->flashdata('msg');?></div>
                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                  <a href="<?php echo base_url('warga/C_warga/viewEdit') ?>" class="btn btn-brand">Edit</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </form>