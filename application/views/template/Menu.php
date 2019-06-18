
<div class="wrapper">

<header class="main-header">
    <a href="" class="logo">
      <span class="logo-mini">GKJ</span>
      <span class="logo-lg"><b>GKJ&nbsp;</b>Gunung Kidul</span>
    </a>

    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                 
              <img src="<?php echo base_url();?>assets/img/user-default.png" class="user-image" alt="">
              <span class="hidden-xs"></span>
              &emsp;<i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header" style="height: 115px;">
                <img src="<?php echo base_url();?>assets/img/user-default.png" class="img-circle" alt="">

                <p>
                    
                    <small><b>Administrator </b></small>
                    <small><?= $this->session->userdata('fullname')?></small>
                </p>
              </li>

              <li class="user-footer" style="background-color: #00bcd4;">
                <!-- <div class="pull-left">
                  <a href="" class="btn btn-default btn-flat"><i class="fa fa-user"> Edit Profil</i></a>
                </div> -->
                <div class="pull-right"><br><br>
                  <a href="<?php echo base_url();?>Login/logout" class="btn btn-default"><i class="fa fa-sign-out"> Sign Out</i></a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
</header>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>assets/img/logoGKJ.png" class="lazyload img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $this->session->userdata('fullname')?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <?php if($this->session->userdata('group_id')==='6'):?>
            <a href="<?php echo base_url();?>Beranda/admin_aja">
          <?php elseif($this->session->userdata('group_id')==='1'):?>
            <a href="<?php echo base_url();?>AdminGereja/Beranda">
          <?php endif;?>
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <?php if($this->session->userdata('group_id')==='6'):?>
            <span>Fasilitas</span>
            <?php elseif($this->session->userdata('group_id')==='1'):?>
              <span>Manajemen</span>
            <?php endif;?>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if($this->session->userdata('group_id')==='6'):?>
              <li><a href="<?php echo base_url();?>Manajemenakun"><i class="fa fa-user-o"></i>Manajemen Akun</a></li>
              <li><a href="<?php echo base_url();?>Manajemendatagereja"><i class="fa fa-home"></i> Manajemen Gereja</a></li>
              <li><a href="<?php echo base_url();?>ManajemenBerita/"><i class="fa fa-list"></i> Manajemen Berita</a></li>
              <li><a href="<?php echo base_url();?>Klasis/ManajemenJemaat/"><i class="fa fa-users"></i> Manajemen Jemaat</a></li>             
              <li><a href="<?php echo base_url();?>Klasis/Datapersembahan/"><i class="fa fa-money"></i> Manajemen Persembahan </a></li>

              <?php elseif($this->session->userdata('group_id')==='1'):?>
              <li><a href="<?php echo base_url();?>AdminGereja/DataPepantans"><i class="fa fa-book"></i> Data Pepanthan</a></li>
              <li class="treeview"><a href="#"><i class="fa fa-user-o"></i><span>Akun</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>AdminGereja/Manajemenakun"><i class="fa fa-circle-o text-yellow"></i> Gereja Induk</a></li>
              </ul>
              </li>
              
             
             <li class="treeview">
                 <a href="#"><i class="fa fa-money"></i> <span>Data Jemaat</span>
                   <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                   </span>
                 </a>
                 <ul class="treeview-menu">
                   <li><a href="<?php echo base_url();?>AdminGereja/Jemaat"><i class="fa fa-circle-o text-aqua"></i>Jemaat Berstatus Hidup</a></li>
                   <li><a href="<?php echo base_url();?>AdminGereja/JemaatMeninggal"><i class="fa fa-circle-o text-aqua"></i>Jemaat Berstatus <br>Meninggal</a></li>
                  
                 </ul>
             </li> <!-- <li><a href="<?php echo base_url();?>AdminGereja/Jemaat"><i class="fa fa-users"></i> Data Jemaat</a></li> -->
             
              <li class="treeview">
                  <a href="#"><i class="fa fa-money"></i> <span>Persembahan</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo base_url();?>AdminGereja/Kelola_Mingguan"><i class="fa fa-circle-o text-aqua"></i> Kelola Mingguan</a></li>
                    <li><a href="<?php echo base_url();?>AdminGereja/Kelola_Bulanan"><i class="fa fa-circle-o text-aqua"></i> Kelola Bulanan</a></li>
                    <li><a href="<?php echo base_url();?>AdminGereja/Kelola_Syukur"><i class="fa fa-circle-o text-aqua"></i> Syukur</a></li>
                    <li><a href="<?php echo base_url();?>AdminGereja/Kelola_Perpuluhan"><i class="fa fa-circle-o text-aqua"></i> Perpuluhan</a></li>
                    <li><a href="<?php echo base_url();?>AdminGereja/Kelola_Khusus"><i class="fa fa-circle-o text-aqua"></i> Khusus</a></li>
                    <li><a href="<?php echo base_url();?>AdminGereja/Kelola_Pembangunan"><i class="fa fa-circle-o text-aqua"></i> Pembangunan</a></li>
                  </ul>
              </li>
              <?php endif;?>
          </ul>
        </li>

        <?php if($this->session->userdata('group_id')==='6'):?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="<?php echo base_url();?>Pendidikanterakhir"><i class="fa fa-circle-o text-yellow"></i> Pendidikan Terakhir</a></li>
          <li><a href="<?php echo base_url();?>Penghasilanperbulan"><i class="fa fa-circle-o text-yellow"></i> Penghasilan Per Bulan</a></li>
          <li><a href="<?php echo base_url();?>Pekerjaanpokok/"><i class="fa fa-circle-o text-yellow"></i> Pekerjaan Pokok</a></li>
          <!-- <li><a href="<?php echo base_url();?>Pekerjaansampingan"><i class="fa fa-briefcase"></i> Pekerjaan Sampingan</a></li> -->
          <li><a href="<?php echo base_url();?>Perangereja"><i class="fa fa-circle-o text-yellow"></i> Peran Dalam Gereja</a></li>
          <li><a href="<?php echo base_url();?>Minatpelayananumum/"><i class="fa fa-circle-o text-yellow"></i> Minat Pelayanan Umum</a></li>
          <li><a href="<?php echo base_url();?>Minatpelayanangereja/"><i class="fa fa-circle-o text-yellow"></i> Minat Pelayanan Gereja</a></li>
          <li><a href="<?php echo base_url();?>Pengalamanmelayanimasyarakat/"><i class="fa fa-circle-o text-yellow"></i> Pengalaman Melayani <br> Masyarakat</a></li>
          <li><a href="<?php echo base_url();?>DataUsia/"><i class="fa fa-circle-o text-yellow"></i> Usia Jemaat</a></li>
          </ul>
        </li>
        <?php endif;?>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li ><a href="<?php echo base_url();?>Manajemenpenghasilan"><i class="fa fa-circle-o text-red"></i> Berdasar Penghasilan</a></li>
           <li ><a href="<?php echo base_url();?>Manajemenpekerjaan"><i class="fa fa-circle-o text-red"></i> Berdasar Pekerjaan</a></li>
           <li ><a href="<?php echo base_url();?>Manajemenpendidikan"><i class="fa fa-circle-o text-red"></i> Berdasar Pendidikan Akhir</a></li>
           <li ><a href="<?php echo base_url();?>Manajemenusia"><i class="fa fa-circle-o text-red"></i> Berdasar Usia</a></li>
           <li ><a href="<?php echo base_url();?>Manajemenalamat"><i class="fa fa-circle-o text-red"></i> Berdasar Tempat Tinggal</a></li>
           <li ><a href="<?php echo base_url();?>manajemengender"><i class="fa fa-circle-o text-red"></i> Berdasar Jenis Kelamin dan <br> Golongan Darah</a></li>
           <li ><a href="<?php echo base_url();?>Manajemenperkawinan"><i class="fa fa-circle-o text-red"></i> Berdasar Status Perkawinan</a></li>
           <li ><a href="<?php echo base_url();?>ManajemenStatusGerejawi"><i class="fa fa-circle-o text-red"></i> Berdasar Status Gerejawi</a></li>
           <li ><a href="<?php echo base_url();?>ManajemenpekerjaanPenghasilan"><i class="fa fa-circle-o text-red"></i> Berdasar Penghasilan, <br>Pekerjaan, dan Pendidikan</a></li>
           <li ><a href="<?php echo base_url();?>Manajemenkeluarga"><i class="fa fa-circle-o text-red"></i> Berdasar Status Keluarga</a></li>
           <li ><a href="<?php echo base_url();?>ManajemenPelayanan"><i class="fa fa-circle-o text-red"></i> Berdasar Pelayanan</a></li>
           <li ><a href="<?php echo base_url();?>Manajemenaktifan"><i class="fa fa-circle-o text-red"></i> Berdasar Keaktifan</a></li>
           <li ><a href="<?php echo base_url();?>ManajemenKematian"><i class="fa fa-circle-o text-red"></i> Laporan Daftar warga <br>meninggal</a></li>
          </ul>
        </li>
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>