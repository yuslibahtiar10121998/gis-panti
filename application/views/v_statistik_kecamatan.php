<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
<<<<<<< HEAD
                <div class=" panel-heading">Grafik Statistik</div>
=======
                <div class="panel-heading">Grafik Statistik</div>
>>>>>>> 6192d9faae175b63e41fa2d94ef267e8feb232e4
                <div class="panel-body">

                    <!-- <div class="row"> -->
                    <!-- status chart -->
                    <!-- <div class="col-sm-8 col-sm-offset-2"> -->
                    <?php if ($jenis_data == "status") : ?>
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    Grafik Status Anak
                                </div>
                                <div class="panel-body">
                                    <?php
                                    // foreach ($statistik as $key => $isi_status) {
                                    //     $ytm[] = $isi_status['yatim'];
                                    //     $ptu[] = $isi_status['piatu'];
                                    //     $ytm_ptu[] = $isi_status['yatim_piatu'];
                                    //     $thn_status[] = $isi_status['tahun'];
                                    // }
                                    ?>
                                    <canvas id="statusChart"></canvas>
                                    <script>
                                        var ctx = document.getElementById('statusChart');
                                        var statusChart = new Chart(ctx, {
                                            type: 'pie',
                                            data: {
                                                datasets: [{
                                                    data: [<?= $statistik['yatim'] ?>, <?= $statistik['piatu'] ?>, <?= $statistik['yatim_piatu'] ?>],
                                                    fill: false,
                                                    backgroundColor: [
                                                        'rgb(255, 99, 132)',
                                                        'rgb(54, 162, 235)',
                                                        'rgb(255, 205, 86)',
                                                    ]
                                                }],
                                                labels: ['yatim', 'piatu', 'yatim_piatu']
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
                        <!-- /status chart -->
                    <?php elseif ($jenis_data == "jk") : ?>
                        <!-- kelamin chart -->
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    Grafik jenis kelamin Anak
                                </div>
                                <div class="panel-body">
                                    <?php
                                    // foreach ($statistik as $key => $jeniskelamin) {
                                    //     $lki[] = $jeniskelamin['laki_laki'];
                                    //     $prm[] = $jeniskelamin['perempuan'];
                                    //     $thn_klmn[] = $jeniskelamin['tahun'];
                                    // }

                                    ?>
                                    <canvas id="jeniskelaminChart"></canvas>
                                    <script>
                                        var ctx = document.getElementById('jeniskelaminChart');
                                        var statusChart = new Chart(ctx, {
                                            type: 'pie',
                                            data: {
                                                datasets: [{
                                                    data: [<?= $statistik['laki_laki'] ?>, <?= $statistik['perempuan'] ?>],
                                                    fill: false,
                                                    backgroundColor: [
                                                        'rgb(255, 99, 132)',
                                                        'rgb(54, 162, 235)',
                                                    ]
                                                }],
                                                labels: ['laki-laki', 'perempuan']
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
                        <!-- /kelamin chart -->
                    <?php elseif ($jenis_data == "pendidikan") : ?>
                        <!-- pendidikan chart -->
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    Grafik Pendidikan Anak
                                </div>
                                <div class="panel-body">
                                    <?php

                                    // // intine sesuai kro ngsior kie isine
                                    // foreach ($statistik as $key => $pendidikan) {
                                    //     // kie SD brti
                                    //     $sd[] = $pendidikan['sd'];
                                    //     $sma[] = $pendidikan['sma'];
                                    //     $smp[] = $pendidikan['smp'];
                                    //     $tdk_sklh[] = $pendidikan['tidak_sekolah'];
                                    //     // kie tahun pendidikan
                                    //     $thn_pddkn[] = $pendidikan['tahun'];
                                    // }

                                    ?>
                                    <canvas id="pendidikanChart"></canvas>
                                    <script>
                                        var ctx = document.getElementById('pendidikanChart');
                                        var statusChart = new Chart(ctx, {
                                            type: 'pie',
                                            data: {
                                                datasets: [{
                                                    data: [<?= $statistik['sd'] ?>, <?= $statistik['smp'] ?>, <?= $statistik['sma'] ?>, <?= $statistik['tidak_sekolah'] ?>],
                                                    fill: false,
                                                    backgroundColor: [
                                                        'rgb(255, 99, 132)',
                                                        'rgb(54, 162, 235)',
                                                        'rgb(255, 205, 86)',
                                                        'rgb(150, 200, 15)',
                                                    ]
                                                }],
                                                labels: ['sd', 'smp', 'sma', 'tidak_sekolah']

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
                        <!-- /kelamin chart -->
                    <?php endif; ?>

                </div>
                
            </div>
        </div>
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Tabel Statistik</div>
                    <div class="panel-body">
                    <div class="table-responsive">
        <table class="table table-responsive table-bordered" id="datatables">
        <?php $jns_data = ['pendidikan' => ['sd','smp','sma','tidak_sekolah'],'jk' => ['perempuan','laki_laki'],'status' => ['yatim','yatim_piatu','piatu']];
        $jml_row = count(@$jns_data[$jenis_data])?>
        <table class="table table-responsive table-bordered" id="datatables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Wilayah</th>
                    <?php if(@$jns_data[$jenis_data] != null) : ?>
                        <?php foreach ($jns_data[$jenis_data] as $value) : ?>
                            <th><?= ucfirst(str_replace('_',' ',$value))?></th>
                            <?php endforeach;?>
                        <?php endif;?>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><?=  ucfirst($this->db->get_where('tbl_kecamatan', ['id_kecamatan' => $statistik['kecamatan_id'] ])->row_array()['nama_kecamatan']);?></td>
                    <?php for ($i=0; $i < $jml_row; $i++) : ?>
                        <td><?= $statistik[$jns_data[$jenis_data][$i]]?></td>
                        <?php endfor;?>
                </tr>
            </tbody>
        </table>
    </div>
            </div>
        </div>
    </div>
</div>