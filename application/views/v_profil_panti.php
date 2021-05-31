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
        <td>
            <a href="<?= base_url('profil/edit/' . $value->id_panas) ?>" class="btn btn-sm-40 btn-success">Edit Profil Panti</a>
        </td>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th width="200px">Nama Panti Asuhan</th>
                <th width="30px">:</th>
                <td><?= $value->nama_panas ?></td>
            </tr>
            <tr>
                <th width="200px">Jenis Panti Asuhan</th>
                <th width="30px">:</th>
                <td><?= $value->jenis_panas ?></td>
            </tr>
            <tr>
                <th width="200px">Jumlah anak Asuh</th>
                <th width="30px">:</th>
                <td><?= $value->jumlah_anak ?></td>
            </tr>
            <tr>
                <th width="200px">Daya Tampung</th>
                <th width="30px">:</th>
                <td><?= $value->daya_tampung ?></td>
            </tr>
            <tr>
                <th width="200px">Alamat Panti Asuhan</th>
                <th width="30px">:</th>
                <td><?= $value->alamat ?></td>
            </tr>
            <tr>
                <th width="200px">Nomor Telepon</th>
                <th width="30px">:</th>
                <td><?= $value->nomor_telepon ?></td>
            </tr>
            <tr>
                <th width="200px">Jumlah Pengurus</th>
                <th width="30px">:</th>
                <td><?= $value->jumlah_pengurus ?></td>
            </tr>
            <tr>
                <th width="200px">Nomor Rekening</th>
                <th width="30px">:</th>
                <td><?= $value->nomor_rekening ?></td>
            </tr>
            <tr>
                <th width="200px">Tahun Berdiri</th>
                <th width="30px">:</th>
                <td><?= $value->tahun_berdiri ?></td>
            </tr>
            <tr>
                <th width="200px">Gambar Panti</th>
                <th width="30px">:</th>
                <td><img src="<?= base_url('gambar/' . $value->gambar) ?>" height="80px" width="100px"></td>
            </tr>
            </thead>
        </table>
        <div id="mapid" style="height: 300px;"></div>
<script>
var mymap = L.map('mapid').setView([-6.898428, 109.124534], 14);

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

<?php foreach ($profil as $key => $value) { ?>
    L.marker ( [ <?= $value->latitude ?>, <?= $value ->longitude ?>],{icon:icon_panti} ).addTo(mymap)
    .bindPopup("<b>Nama Panti : <?= $value->nama_panas ?></b><br/>"+
    "Kecamatan : <?= $value->nama_kecamatan ?></br>").openPopup();;
<?php } ?>

</script>
    </div>
</div>