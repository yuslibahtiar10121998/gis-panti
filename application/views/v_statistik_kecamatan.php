<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class=" panel-heading">Grafik Statistik</div>
                <div class="panel-body">
                    <?php if ($jenis_data == "status") : ?>
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    Grafik Status Anak
                                </div>
                                <div class="panel-body">
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
                                                labels: ['Yatim', 'Piatu', 'Yatim-piatu']
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
                                                        'rgb(54, 162, 235)',
                                                        'rgb(255, 99, 132)',
                                                    ]
                                                }],
                                                labels: ['Perempuan', 'Laki-laki']
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
                                                labels: ['SD', 'SMP', 'SMA', 'Tidak Sekolah']

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
        <?php $jns_data = ['pendidikan' => ['sd','smp','sma','tidak_sekolah'],'jk' => ['Perempuan','Laki-laki'],'status' => ['Yatim','Yatim-Piatu','Piatu']];
        $jml_row = count(@$jns_data[$jenis_data])?>
        <table class="table table-responsive table-striped" id="data">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Anak</th>
                    <th>Pendidikan</th>                    
                    <th>Jenis Kelamin</th>                    
                    <th>Status</th>                    
                    <th>Asal Panti</th>                    
                    <th>Asal Tempat Lahir</th>
                    <th>Tanggal Lahir</th>                    
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach($data_anak as $da):?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$da['nama_lengkap']?></td>
                    <td><?=strtoupper($da['pendidikan'])?></td>
                    <td><?=$da['nama_kelamin']?></td>
                    <td><?=$da['status']?></td>
                    <td><?=$da['nama_panas']?></td>
                    <td><?=$da['asal_tempat_lahir']?></td>
                    <td><?=$da['tanggal_lahir']?></td>
                </tr>
                <?php $i++; endforeach;?>
            </tbody>
        </table>
        <!-- <table class="table table-responsive table-bordered" id="datatables">
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
            </tbody>-->
        <!-- </table> -->
    </div>
    
            </div>
        </div>
    </div>
</div>
                    </div>
