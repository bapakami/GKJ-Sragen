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
		            <!-- /.box-header -->
		            <div class="box-body table-responsive">
		            	<div id="chartContainer" style="height: 300px; width: 100%;"></div>
		            </div>
            	</div>
            </div>
    </section>
</div>


<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Desktop Search Engine Market Share - 2016"
	},
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##0.00\"%\"",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: 79.45, label: "Google"},
			{y: 7.31, label: "Bing"},
			{y: 7.06, label: "Baidu"},
			{y: 4.91, label: "Yahoo"},
			{y: 1.26, label: "Others"}
		]
	}]
});
chart.render();

}
</script>