<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BKKP Salatiga</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url().'assets/img/ico/favicon.png'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-theme.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/font-awesome.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/responsive.dataTables.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/AdminLTE.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/skins/_all-skins.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/styles.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'; ?>"/>

</head>

<body class="hold-transition skin-blue sidebar-mini wysihtml5-supported">
<div class="wrapper">

<header class="main-header">
    <a href="" class="logo">
      <span class="logo-mini">BKKP</span>
      <span class="logo-lg"><b>BKKP-</b>Salatiga</span>
    </a>

    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
			</a>
			

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
						     
              <img src="" class="user-image" alt="">
							<span class="hidden-xs"></span>
							&emsp;<i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="" class="img-circle" alt="">

                <p>
										<small></small>
                    <small><b>Administrator</b></small>
                 		<small><i>Last login :  </i></small>
                </p>
              </li>

              <li class="user-footer">
								<div class="pull-left">
                  <a href="" class="btn btn-default btn-flat"><i class="fa fa-user"> Edit Profil</i></a>
                </div>
                <div class="pull-right">
                  <a href="" class="btn btn-default btn-flat"><i class="fa fa-sign-out"> Sign Out</i></a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
		</nav>
</header>

<aside class="main-sidebar" >

    <section class="sidebar">
        <div class="user-panel">
        <div class="pull-left image">
			
          <img src="" class="lazyload img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
					<p></p>
					<a href=""><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
    <ul class="sidebar-menu" >
        <li>
          <a href="">
            <i class="fa fa-home"></i> <span>Beranda</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-briefcase"></i>
            <span>Master Data Barang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-briefcase"></i> Data Barang</a></li>
						<li><a href=""><i class="fa fa-plus"></i> Tambah Barang Masuk</a></li>
            <li><a href=""><i class="fa fa-list"></i> Kategori Barang</a></li>
          </ul>
        </li>

      	<li>
          <a href="">
            <i class="fa fa-truck"></i> <span> Permintaan Pesanan</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

				<li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i>
            <span>Master Data Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-spinner"></i> Data Barang Diproses</a></li>
            <li><a href=""><i class="fa fa-check"></i>  Data Barang Selesai</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Master Data Client</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
			<ul class="treeview-menu">
            	<li><a href=""><i class="fa fa-users"></i> Data Client</a></li>
            	<li><a href=""><i class="fa fa-building-o"></i>  Data Instansi</a></li>
          </ul>
        </li>
        
         <li>
          <a href="">
            <i class="fa fa-sign-out"></i> <span>Keluar</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        
       
      </ul>

    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manajemen Akun
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Fasilitas </a></li>
        <li class="active">Manajemen Akun </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">


            <div class="box-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-striped table-bordered table-responsive" style="width:100%;font-size:13px;">
                <thead>
                <tr>
                    <th style="width:38px;">#</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>No. Telp</th>
                    <th>Asal Gereja</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                            $no = 0;
                             foreach ($data->result_array() as $i) :
                                    $no++;
                                    $id = $i['id'];
                                    $username = $i['username'];
                                    $fullname = $i['fullname'];
                                    $email = $i['email'];                                    
                                    $telpno = $i['telpno'];
                                    $namagereja = $i['namagereja'];
                         ?>
                <tr>
                    <td style="text-align:left;width:38px;"><?php echo $no; ?></td>
                    <td><?php echo $username; ?></td>
                    <td><?php echo $fullname; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $telpno; ?></td>
                    <td><?php echo $namagereja; ?></td>
                    <td style="text-align:center;"> 
                        <span data-toggle="tooltip" data-placement="top" data-original-title="Lihat Detail Barang">
                          <a href="<?php echo base_url().'administrator/barang/detail/'.$id; ?>">
                            <button type="button" class="btn btn-white btn-xs" title="View Details"><i class="fa fa-eye"> Detail</i></button>
                          </a>
                        </span> 
                        <span data-toggle="tooltip" data-placement="top" data-original-title="Edit Barang">
                          <a data-toggle="modal" data-target="#ModalEdit<?php echo $id; ?>">
                            <button type="button" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-pencil"></i> Edit</button>
                          </a>
                        </span> 
                       <span data-toggle="tooltip" data-placement="top" data-original-title="Hapus Barang">
                          <a data-toggle="modal" data-target="#ModalHapus<?php echo $id; ?>">
                            <button type="button" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash"></i> Hapus</button>
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

  <!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b> user online</b> 
    </div>
    <strong> Copyright &copy; <a href=""> BKKP Kota Salatiga</strong></a>. All rights reserved.
</footer>
  </div>
	
<aside class="control-sidebar control-sidebar-dark">
    <div class="tab-content">
      <div class="tab-pane" id="control-sidebar-home-tab">
	  </div>	
	</div>
</aside>		

	
<script src="<?php echo base_url().'assets/js/jquery-3.3.1.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/popper.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/lazysizes.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/app.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/demo.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'; ?>"></script>

<script>
$(document).ready(function() {
   $('#example1').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );
</script>

</body>
</html>
