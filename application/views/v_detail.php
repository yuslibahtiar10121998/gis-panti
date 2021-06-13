<div class="container">

    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Lokasi Panti Asuhan</div>
                <div class="panel-body">

                    <div id="mapid" style="height: 450px;"></div>

                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Gambar Panti Asuhan</div>
                <div class="panel-body">

                    <img src="<?= base_url('gambar/' . $panti->gambar) ?>" height="450" width="500">

                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Data Panti Asuhan</div>
                <div class="panel-body">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="200px">Nama Panti Asuhan</th>
                                <th width="30px">:</th>
                                <td><?= $panti->nama_panas ?></td>
                            </tr>
                            <!-- <tr>
                                <th width="200px">Jenis Panti Asuhan</th>
                                <th width="30px">:</th>
                                <td><?= $panti->jenis_panas ?></td>
                            </tr> -->
                            <tr>
                                <th width="200px">Jumlah anak Asuh</th>
                                <th width="30px">:</th>
                                <td><?= $panti->jumlah_anak ?></td>
                            </tr>
                            <tr>
                                <th width="200px">Daya Tampung</th>
                                <th width="30px">:</th>
                                <td><?= $panti->daya_tampung ?></td>
                            </tr>
                            <tr>
                                <th width="200px">Alamat Panti Asuhan</th>
                                <th width="30px">:</th>
                                <td><?= $panti->alamat ?></td>
                            </tr>
                            <tr>
                                <th width="200px">Nomor Rekening</th>
                                <th width="30px">:</th>
                                <td><?= $panti->nomor_rekening ?></td>
                            </tr>
                            <tr>
                                <th width="200px">Nomor Telepon</th>
                                <th width="30px">:</th>
                                <td><?= $panti->nomor_telepon ?></td>
                            </tr>
                            <tr>
                                <th width="200px">Jumlah Pengurus</th>
                                <th width="30px">:</th>
                                <td><?= $panti->jumlah_pengurus ?></td>
                            </tr>

                        </thead>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <script>
        var mymap = L.map('mapid').setView([<?= $panti->latitude ?>, <?= $panti->longitude ?>], 19);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org">OpenStreetMap</a> Pengguna, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">Yusli Bahtiar</a>,' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
        }).addTo(mymap);

        var icon_panti = L.icon({
            iconUrl: '<?= base_url('icon/panti.png') ?>',
            iconSize: [30, 45],
        });
        L.marker([<?= $panti->latitude ?>, <?= $panti->longitude ?>], {
                icon: icon_panti
            }).addTo(mymap)
            .bindPopup(
                "<b>Nama Panti : <?= $panti->nama_panas ?></b><br/>" +
                "No.Telp : <?= $panti->nomor_telepon ?></br>").openPopup();;
    </script>


    <div class="col-sm-13">
        <div class="panel panel-primary">
            <div class="panel-heading">Statistik Anak Asuh panti di Tegal</div>
            <div class="panel-body">


                <div class="row">
                    <!-- download statistik -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">Download Statistik</div>
                            <div class="panel-body">
                            <div class="form-group">
                            
                <label> Pilih Panti Asuhan : 
                <select class="form-control">
                    <option>contoh panti satu</option>
                </select>
                </label>
                
            </div>
                                <th><a href="<?= base_url('') ?>" class="btn btn-sm-40 btn-info">Download</a></th>
                            </div>
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
</div>
</div>



</div>