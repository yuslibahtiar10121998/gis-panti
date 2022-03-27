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

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Panti</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?= $panti->nama_panas ?>" class="form-control" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jumlah Anak</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?= $panti->jumlah_anak ?>" class="form-control" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Daya Tampung</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?= $panti->daya_tampung ?>" class="form-control" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat Panti</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?= $panti->alamat ?>" class="form-control" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kecamatan</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?= $panti->nama_kecamatan ?>" class="form-control" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nomor Rekening</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?= $panti->nomor_rekening ?>" class="form-control" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nomor Telapon</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?= $panti->nomor_telepon ?>" class="form-control" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jumlah Pengurus</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?= $panti->jumlah_pengurus ?>" class="form-control" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tahun Berdiri</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?= $panti->tahun_berdiri ?>" class="form-control" readonly />
                        </div>
                    </div>
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