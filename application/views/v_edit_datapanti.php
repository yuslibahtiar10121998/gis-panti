<div class="col-sm-7">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Edit Data Panti Asuhan
        </div>
        <div class="panel-body">

            <div id="mapid" style="height: 500px;"></div>

        </div>
    </div>
</div>

<div class="col-sm-5">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Edit Data Panti Asuhan
        </div>
        <div class="panel-body">
            <?php
            //validasi gagal upload gambar
            if (isset($error_upload)) {
                echo ('<div class="alert alert-danger alert-dismissable">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' . $error_upload . '</div>');
            }

            //code validasi data tidak boleh kosong
            echo validation_errors('<div class="alert alert-danger alert-dismissable">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>');

            //notifikasi data berhasil disimpan
            if ($this->session->flashdata('pesan')) {
                echo  '<div class="alert alert-success alert-dismissable">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                echo $this->session->flashdata('pesan');
                echo '</div>';
            }

            echo form_open_multipart('panti/edit/' . $panti->id_panas);
            ?>

            <div class="form-group">
                <label>Nama Panti Asuhan</label>
                <input name="nama_panas" placeholder="Nama Panti Asuhan" value="<?= $panti->nama_panas ?>" class="form-control" />
            </div>

            <div class="form-group">
                <label>Kecamatan</label>
                <select name="kecamatan_id" class="form-control">
                    <option value=""> Pilih Kecamatan</option>
                    <?php foreach ($list_kecamatan as $kecamatan) : ?>
                        <option value="<?= $kecamatan['id_kecamatan'] ?>"> <?= $kecamatan["nama_kecamatan"] ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- <div class="form-group">
                <label>Jenis Panti Asuhan</label>
                <select name="jenis_panas" class="form-control">
                    <option value="<?= $panti->jenis_panas ?>"><?= $panti->jenis_panas ?></option>
                    <option value="PSAA"> PSAA </option>
                    <option value="LKSA"> LKSA </option>
                </select>
            </div> -->

            <div class="form-group">
                <label>Jumlah Anak Asuh</label>
                <input name="jumlah_anak" placeholder="Jumlah Anak Asuh" value="<?= $panti->jumlah_anak ?>" class="form-control" />
            </div>

            <div class="form-group">
                <label>Daya Tampung Anak</label>
                <input name="daya_tampung" placeholder="Daya Tampung Anak" value="<?= $panti->daya_tampung ?>" class="form-control" />
            </div>

            <div class="form-group">
                <label>Alamat Panti Asuhan</label>
                <input name="alamat" placeholder="Alamat Panti Asuhan" value="<?= $panti->alamat ?>" class="form-control" />
            </div>

            <div class="form-group">
                <label>Nomor Rekening</label>
                <input name="nomor_rekening" placeholder="Nomor Rekening" value="<?= $panti->nomor_rekening ?>" class="form-control" />
            </div>

            <div class="form-group">
                <label>Nomor Telepon Panti Asuhan</label>
                <input name="nomor_telepon" placeholder="Nomor Telepon Panti Asuhan" value="<?= $panti->nomor_telepon ?>" class="form-control" />
            </div>

            <div class="form-group">
                <label>Jumlah Pengurus</label>
                <input name="jumlah_pengurus" placeholder="Jumlah Pengurus" value="<?= $panti->jumlah_pengurus ?>" class="form-control" />
            </div>

            <div class="form-group">
                <label>Tahun Berdiri</label>
                <input name="tahun_berdiri" placeholder="Tahun Berdiri" value="<?= $panti->tahun_berdiri ?>" class="form-control" />
            </div>

            <div class="form-group">
                <label>Latitude</label>
                <input id="Latitude" name="latitude" placeholder="Latitude" value="<?= $panti->latitude ?>" class="form-control"  />
            </div>

            <div class="form-group">
                <label>Longitude</label>
                <input id="Longitude" name="longitude" placeholder="Longitude" value="<?= $panti->longitude ?>" class="form-control"  />
            </div>

            <img src="<? base_url('gambar/' . $sekolah->gambar) ?>" height="100px" width="100px">

            <div class="form-group">
                <label>Ganti Gambar</label>
                <input type="file" name="gambar" class="form-control">
            </div>

            <div class="form-group">
                <label></label>
                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                <a href="<?= base_url('panti/batal/') ?>" type="reset" class="btn btn-sm btn-warning">Batal</a>
            </div>

        </div>

        <?php echo form_close(); ?>
    </div>
</div>
</div>

<script>
    var curLocation = [0, 0];
    if (curLocation[0] == 0 && curLocation[1] == 0) {
        curLocation = [<?= $panti->latitude ?>, <?= $panti->longitude ?>];
    }

    var mymap = L.map('mapid').setView([<?= $panti->latitude ?>, <?= $panti->longitude ?>], 15);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> Pengguna, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">Yusli Bahtiar</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11'
    }).addTo(mymap);

    mymap.attributionControl.setPrefix(false);
    var marker = new L.marker(curLocation, {
        draggable: 'true'
    });

    marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update();
        $("#Latitude").val(position.lat);
        $("#Longitude").val(position.lng).keyup();
    });

    $("#Latitude, #Longitude").change(function() {
        var position = [parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
        marker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update();
        mymap.panTo(position);
    });
    mymap.addLayer(marker);
</script>