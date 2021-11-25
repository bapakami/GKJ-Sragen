<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Menu Dokumen Jemaat
			<small></small>
		</h1>
		<ol class="breadcrumb">

		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">

					<div class="box-body table-responsive">
						<div class="right_col" role="main">
							<div class="row" id="formDatax">
								<div class="col-md-12">
									<center>
										<h3>Dokumen Jemaat</h3>
									</center>
									<hr />
								</div>
								<div class="col-md-12">
									<table class="table table-hover table-bordered" id="datatable">
										<thead>
											<th>#</th>
											<th>Nama</th>
											<th>KTP</th>
											<th>KARTU KELUARGA</th>
											<th>SURAT PEGANTAR</th>
											<th>SURAT BAPTIS ANAK</th>
											<th>SURAT BAPTIS DEWASA</th>
											<th>SURAT SIDI</th>
											<th>SURAT NIKAH</th>
											<th>FOTO NIKAH (berpasangan)</th>
											<th>SURAT KEMATIAN</th>
											<th>SURAT CERAI</th>
											<th>AKTE LAHIR</th>
											<th>ATESTASI</th>
										</thead>
									</table>
									<tbody></tbody>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<!-- <?php print_r($this->session->userdata()); ?> -->
<script>
	$(document).ready(function() {
		table = $('#datatable').DataTable({
			'searching': true,
			'paging': true,
			'lengthChange': true,
			'ordering': true,
			'info': true,
			"processing": true,
			"serverSide": true,
			"order": [],            
			"scrollX": true,
			"autoWidth": true,
			"ajax": {
				"url": "<?php echo site_url('pendetaa/listData/') ?>",
				"type": "POST"
			},

			"aoColumnDefs": [
			{"aTargets": [0], "bSortable": false},
			{"aTargets": [2], "bSortable": false},
			{"aTargets": [3], "bSortable": false},
			{"aTargets": [4], "bSortable": false},
			{"aTargets": [5], "bSortable": false},
			{"aTargets": [6], "bSortable": false},
			{"aTargets": [7], "bSortable": false},
			{"aTargets": [8], "bSortable": false},
			{"aTargets": [9], "bSortable": false},
			{"aTargets": [10], "bSortable": false},
			{"aTargets": [11], "bSortable": false},
			{"aTargets": [12], "bSortable": false},
			{"aTargets": [13], "bSortable": false},
                        //  {"targets": [8], "visible": false, "searchable": false}
                        ],
                        "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                        	$('td:eq(0)', nRow).css({'width': '10px', 'text-align': 'center'});
                // $('td:eq(7)', nRow).css({'text-align': 'center'});
            }

        });
	});


</script>
