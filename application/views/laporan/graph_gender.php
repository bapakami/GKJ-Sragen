<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      	<h1>
 			Grafik Gender
        <small></small>
      	</h1>
      	<ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-briefcase"></i> Fasilitas </a></li>
        	<li class="active">Grafik Gender </li>
      	</ol>
    </section>

    <!-- Main content -->
    <section class="content">
      	<div class="row">
        	<div class="col-xs-12">
          		<div class="box">
		            <div class="box-body table-responsive">
		            	<div id="chartContainer" style="height: 300px; width: 100%;"></div>
		            </div>
            	</div>
            </div>
    </section>
</div>

<script>
	var columnGender = <?= json_encode($columnGender) ?>;
	var gereja = <?= json_encode($gereja) ?>;
	var columnDarah = <?= json_encode($columnDarah) ?>;
</script>

<script>
window.onload = function() {
	var dataGraph = [];
	var id = $('#gereja').val();
	$.ajax({
		type: "GET",
		url: base_url + "Graph/Gender/data",
		data: {
			"columnGender": columnGender,
			"columnDarah": columnDarah,
			"gereja": gereja
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
					text: "Grafik Gender Jemaat Gereja " + res.name
				},
				subtitles:[
				{
					text: "Gol Darah : " +res.listDarah	
				}
				],
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