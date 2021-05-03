<div class="col-sm-13">
    <div class="panel panel-primary">
        <div class="panel-heading">Detail Data Rekap</div>
        <div class="panel-body">
            <div class="row">
                <!-- download statistik -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-info">
                        <div class="panel-heading"><spin>Download Data Rekap :   </spin><a class="btn btn-sm-40 btn-info">Download</a></div>
                    </div>
                </div>
                <!-- download statistik -->
            </div>
            <div class="row">
                <!-- bar chart    -->
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Jumlah anak asuh
                        </div>
                        <div class="panel-body">
                            <?php

                            foreach ($jumlah as $key => $isi_jumlah) {
                                $thn_jumlah[] = $isi_jumlah->tahun;
                                $jml[] = $isi_jumlah->jumlah_anak;
                            }
                            ?>
                            <canvas id="jumlahChart" width="100" height="70"></canvas>
                            <script>
                                var ctx = document.getElementById('jumlahChart');
                                var jumlahChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: <?php echo json_encode($thn_jumlah) ?>,
                                        datasets: [{
                                            label: 'jumlah anak',
                                            data: <?php echo json_encode($jml) ?>,
                                            backgroundColor: [
                                                'rgba(0, 255, 0, 0.2)',
                                                'rgba(0, 255, 0, 0.2)',
                                                'rgba(0, 255, 0, 0.2)',
                                                'rgba(0, 255, 0, 0.2)',
                                                'rgba(0, 255, 0, 0.2)',
                                                'rgba(0, 255, 0, 0.2)',
                                                'rgba(0, 255, 0, 0.2)',
                                                'rgba(0, 255, 0, 0.2)',
                                                'rgba(0, 255, 0, 0.2)',
                                                'rgba(0, 255, 0, 0.2)',
                                                'rgba(0, 255, 0, 0.2)',
                                                'rgba(0, 255, 0, 0.2)'
                                            ],

                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <!-- /bar chart -->
                <!-- donut chart -->
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            Status anak asuh
                        </div>
                        <div class="panel-body">
                            <?php
                            foreach ($status as $key => $isi_status) {
                                $ytm[] = $isi_status->yatim;
                                $ptu[] = $isi_status->piatu;
                                $ytm_ptu[] = $isi_status->yatim_piatu;
                                $thn_status[] = $isi_status->tahun;
                            }
                            ?>
                            <canvas id="statusChart" width="100" height="70"></canvas>
                            <script>
                                var ctx = document.getElementById('statusChart');
                                var statusChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        datasets: [{
                                            label: 'yatim',
                                            data: <?php echo json_encode($ytm) ?>,
                                            fill: false,
                                            borderColor: 'rgba(255, 0, 0,0.2)',
                                        }, {
                                            label: 'piatu',
                                            data: <?php echo json_encode($ptu) ?>,
                                            type: 'line',
                                            fill: false,
                                            borderColor: 'rgba(0, 255, 0,0.2)',

                                        }, {
                                            label: 'yatim dan piatu',
                                            data: <?php echo json_encode($ytm_ptu) ?>,
                                            type: 'line',
                                            fill: false,
                                            borderColor: 'rgba(0, 0, 255,0.2)',

                                        }],
                                        labels: <?php echo json_encode($thn_status) ?>,
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <!-- /donut chart -->

            </div>

            <!-- ganti baris -->
            <div class="row">
                <!-- area chart -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            Pendidikan anak asuh
                        </div>
                        <div class="panel-body">
                            <?php
                            foreach ($pendidikan as $key => $isi_pendidikan) {
                                $thn_pendidikan[] = $isi_pendidikan->tahun;
                                $sd[] = $isi_pendidikan->sd_sederajat;
                                $smp[] = $isi_pendidikan->smp_sederajat;
                                $sma[] = $isi_pendidikan->sma_sederajat;
                                $tdk_sekolah[] = $isi_pendidikan->tidak_sekolah;
                            }
                            ?>
                            <canvas id="pendidikanChart" width="100" height="30"></canvas>
                            <script>
                                var ctx = document.getElementById('pendidikanChart');
                                var pendidikanChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        datasets: [{
                                            label: 'SD',
                                            data: <?php echo json_encode($sd) ?>,
                                            backgroundColor: 'rgba(255, 0, 0, 0.2)',

                                        }, {
                                            label: 'SMA',
                                            data: <?php echo json_encode($sma) ?>,
                                            type: 'bar',
                                            backgroundColor: 'rgba(0, 255, 255, 0.2)',

                                        }, {
                                            label: 'SMP',
                                            data: <?php echo json_encode($smp) ?>,
                                            type: 'bar',
                                            backgroundColor: 'rgba(0, 0, 255, 0.2)',

                                        }, {
                                            label: 'tidak sekolah',
                                            data: <?php echo json_encode($tdk_sekolah) ?>,
                                            type: 'bar',
                                            backgroundColor: 'rgba(0, 255, 0, 0.2)',

                                        }],
                                        labels: <?php echo json_encode($thn_pendidikan) ?>,
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <!-- /area chart -->
            </div>
            <!-- /ganti baris -->
        </div>
    </div>
</div>