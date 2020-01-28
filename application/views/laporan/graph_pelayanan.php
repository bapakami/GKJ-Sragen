<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      	<h1>
 			Grafik Pelayanan
        <small></small>
      	</h1>
      	<ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-briefcase"></i> Fasilitas </a></li>
        	<li class="active">Grafik Pelayanan </li>
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
	var column = <?= json_encode($column) ?>;
	var gereja = <?= json_encode($gereja) ?>;
</script>

<script>
window.onload = function() {
	var dataGraph = [];
	var id = $('#gereja').val();
	$.ajax({
		type: "GET",
		url: base_url + "Graph/Pelayanan/data",
		data: {
			"column": column,
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
					text: "Grafik Pelayanan Jemaat Gereja " + res.name
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