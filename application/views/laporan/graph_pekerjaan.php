<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      	<h1>
 			Grafik Pekerjaan
        <small></small>
      	</h1>
      	<ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-briefcase"></i> Fasilitas </a></li>
        	<li class="active">Grafik Pekerjaan </li>
      	</ol>
    </section>

    <!-- Main content -->
    <section class="content">
      	<div class="row">
        	<div class="col-xs-12">
          		<div class="box">
				<?php if($this->session->userdata('group_id')==='6'):?>
				<label>Asal Gereja : </label>
				<select class='form-control' id='gereja' name="gereja">
					<option value=''>--pilih--</option>
					<?php 
						foreach ($gereja as $grj) {
						echo "<option value='$grj[id]'>$grj[namagereja]</option>";
						}
					?>
				</select>
				<?php elseif($this->session->userdata('group_id')==='1'):?>
					<input type="hidden" id="gereja" name="gereja" value="<?= $this->session->userdata('gereja_id') ?>">
				<?php endif;?>
		            <!-- /.box-header -->
		            <div class="box-body table-responsive">
		            	<div id="chartContainer" style="height: 300px; width: 100%;"></div>
		            </div>
            	</div>
            </div>
    </section>
</div>

<script>
	var column = <?= json_encode($column) ?>;
</script>

<script>
window.onload = function() {
	var dataGraph = [];
	var id = $('#gereja').val();
	$.ajax({
		type: "GET",
		url: base_url + "Graph/Pekerjaan/data/" + id,
		data: {
			"column": column
		},
		dataType: "json",
		success: function(res){
			dataGraph = res.data;
			total = 0;

			$.each(dataGraph, function () {
				this.number = parseInt(this.y, 10)
				total = total + this.number;
			})


			dataGraph.map(function(ok){
				ok.y = (ok.number * 100 / total).toFixed(2);
			})

			console.log(total, dataGraph);
			chart = new CanvasJS.Chart("chartContainer", {
				animationEnabled: true,
				title: {
					text: "Grafik Pekerjaan Jemaat Gereja " + res.name
				},
				data: [{
					type: "pie",
					startAngle: 240,
					yValueFormatString: "##0.00\"%\"",
					indexLabel: "{label}:{number} ({y})",
					dataPoints: dataGraph
				}]
			});
			chart.render();
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) { 
			console.log("Status: " + textStatus); console.log("Error: " + errorThrown); 
		}
	});
}
</script>