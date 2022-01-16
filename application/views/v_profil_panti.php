<div class="col-sm-12">
    <?php
    if ($this->session->flashdata('pesan')) {
        echo  '<div class="alert alert-warning alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
        echo $this->session->flashdata('pesan');
        echo '</div>';
    }
    ?>
    <div class="table-responsive">
        <?php foreach ($profil as $key => $value) ?>
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-body">
        <td>
            <a href="<?= base_url('profil/edit/' . $value->id_panas) ?>" class="btn btn-sm-40 btn-success">Edit Profil Panti</a>
        </td>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Panti</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?= $value->nama_panas ?>" class="form-control" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jumlah Anak</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?= $value->jumlah_anak ?>" class="form-control" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Daya Tampung</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?= $value->daya_tampung ?>" class="form-control" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?= $value->alamat ?>" class="form-control" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?= $value->nomor_telepon ?>" class="form-control" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jumlah Pengurus</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?= $value->jumlah_pengurus ?>" class="form-control" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nomor Rekening</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?= $value->nomor_rekening ?>" class="form-control" readonly />
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

                    <img src="<?= base_url('gambar/' . $value->gambar) ?>" height="450" width="440">

                </div>
            </div>
        </div>
        </div>
<script>
        var mymap = L.map('mapid').setView([<?= $value->latitude ?>, <?= $value->longitude ?>], 19);

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
        L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
                icon: icon_panti
            }).addTo(mymap)
            .bindPopup(
                "<b>Nama Panti : <?= $value->nama_panas ?></b><br/>" +
                "Alamat        : <?= $value->alamat ?></br>").openPopup();;
    </script>
    </div>
</div>
        </div>
    </div>
</div>