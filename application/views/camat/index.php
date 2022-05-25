<div class="content" data-color="#d6fad6" data-background-color="white" data-image="<?= base_url(); ?>assets/img/sidebar-2.jpg">
    <div class="container-fluid">

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-danger card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">info_outline</i>
                                </div>
                                <p class="card-category">Antrian Surat yang belum dicek</p>
                                <h3 class="card-title"><?= $antrian_non; ?></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-danger">warning</i>
                                    Antrian yang belum di tangani
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">content_copy</i>
                                </div>
                                <p class="card-category">Antrian Surat yang ada</p>
                                <h3 class="card-title"><?= $antrian; ?>
                                </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">local_offer</i> Antrian yang sedang diproses
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="fa fa-check-square"></i>
                                </div>
                                <p class="card-category">Antrian Surat yang selesai</p>
                                <h3 class="card-title"><?= $antrian_done; ?></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">date_range</i> Antrian yang telah selesai
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <p class="card-category">Penduduk yang memakai sistem</p>
                                <h3 class="card-title"><?= $warga; ?></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">update</i> Just Updated
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="card card-chart">
                            <div class="card-header card-header-secondary">
                                <canvas class="ct-chart" id="myChart"> </canvas>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Grafik pengajuan surat</h4>
                                <p class="card-category">Berdasarkan kelurahan</p>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">access_time</i>update terakhirs <?= $last['tgl']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="card card-chart">
                            <div class="card-header card-header-secondary">
                                <canvas class="ct-chart" id="myChart1"> </canvas>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Grafik pengajuan surat</h4>
                                <p class="card-category">Berdasarkan Surat Yang Diajukan</p>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">access_time</i>update terakhirs <?= $last['tgl']; ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md">
                        <div class="card">
                            <div class="card-header">
                                <h3>Daftar Kode Surat</h3>
                            </div>
                            <div class="card-body">
                                <ul>
                                    <small>

                                        <li>
                                            SKM = SURAT KETERANGAN MISKIN
                                        </li>
                                        <li>SKTM = SURAT KETERANGAN TIDAK MAMPU
                                        </li>
                                        <li>
                                            SKBPR = SURAT KETERANGAN BELUM PUNYA RUMAH
                                        </li>
                                        <li>

                                            SKU = SURAT KETERANGAN USAHA
                                        </li>
                                        <li>
                                            SKDP = SURAT KETERANGAN DOMISILI PERUSAHAAN
                                        </li>
                                        <li>

                                            SKN = SURAT KETERANGAN UNTUK MENIKAH
                                        </li>
                                        <li>

                                            SKD = SURAT KETERANGAN DOMISILI
                                        </li>
                                        <li>

                                            SKP = SURAT KETERANGAN PENGHASILAN
                                        </li>
                                        <li>

                                            SKOS = SURAT KETERANGAN ORANG YANG SAMA
                                        </li>
                                        <li>

                                            SPC = SURAT PENGANTAR CERAI
                                        </li>
                                        <li>

                                            SPSKCK = SURAT PENGANTAR SKCK
                                        </li>
                                        <li>
                                            SPIK = SURAT PENGANTAR IZIN KERAMAIAN</li>
                                    </small>

                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="row">

</div> -->
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript">
    var xValue = [<?php foreach ($chart as $d) {
                        echo "'" . $d->nm_kelurahan . "',";
                    } ?>];
    var yValue = [<?php foreach ($chart as $d) {
                        echo $d->pengajuan . ",";
                    } ?>];
    var barColors = ['#EA4743', '#FE9F1A', '#0EB78A', '#11B7CC'];

    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: xValue,
            datasets: [{
                label: 'Kelurahan',
                backgroundColor: barColors,
                data: yValue,
            }]
        },
    });


    var aValue = [<?php foreach ($pie as $a) {
                        echo "'" . $a->name . "',";
                    } ?>];
    var bValue = [<?php foreach ($pie as $a) {
                        echo $a->value . ",";
                    } ?>];
    var barColors = ['#EA4743', '#FE9F1A', '#0EB78A', '#11B7CC', '#59C837', '#373737', '#19568E', '#D1EBFF', '#EA4743', '#FE9F1A', '#FF7043', '#966F3F'];

    var ctx = document.getElementById('myChart1').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: aValue,
            datasets: [{
                label: aValue,
                backgroundColor: barColors,
                data: bValue,
            }]
        },
    });
</script>