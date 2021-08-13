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
                                <th width="200px">Kecamatan</th>
                                <th width="30px">:</th>
                                <td><?= $panti->nama_kecamatan ?></td>
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
                            <tr>
                                <th width="200px">Tahun Berdiri</th>
                                <th width="30px">:</th>
                                <td><?= $panti->tahun_berdiri ?></td>
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
</div>