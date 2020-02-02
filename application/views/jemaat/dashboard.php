<?php
$foto = $jemaat['foto'];
if ($foto == '' || $foto == null) {
    if ($jemaat['jenis_kelamin'] == 'Perempuan') {
        $fotox = base_url() . 'assets/img/avatar2.png';
    } else {
        $fotox = base_url() . 'assets/img/avatar5.png';
    }
} else {
    $fotox = base_url($jemaat['foto']);
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small></small>
        </h1>
        <ol class="breadcrumb">

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-4">
                <ul class="timeline">
                    <li class="time-label">
                        <span class="bg-red">Aktifitas</span>
                    </li>
                    <?php if($timeline->num_rows() >=1){ foreach($timeline->result_array() as $br => $bb) :?>
                        <li>
                            <i class="fa fa-user bg-aqua"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> <?= date('h:i', strtotime($bb['tanggal']))?></span>
                                <h3 class="timeline-header no-border"><?= $bb['jenis_log']?></h3>
                            </div>
                        </li>
                    <?php endforeach; } else {?>
                     <li>
                        <i class="fa fa-user bg-aqua"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> Now</span>
                            <h3 class="timeline-header">Timeline</h3>
                            <div class="timeline-body">Anda Dapat menemukan aktivitas terdahulu anda disini </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="col-xs-8">
            <div class="box">
                <div class="box-body table-responsive">
                    <div class="right_col" role="main">
                        <div id="kontenxx">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<script>
    $(document).ready(function() {
        $('#kontenxx').load('<?= site_url("warga/jemaat/editProfil")?>');
    });
</script>
