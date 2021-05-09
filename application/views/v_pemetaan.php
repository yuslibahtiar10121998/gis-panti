<div id="mapid" style="height: 500px;"></div>

<script>

var mymap = L.map('mapid').setView([-6.898428, 109.124534], 12);

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

<?php foreach ($panti as $key => $value) { ?>
    L.marker ( [ <?= $value->latitude ?>, <?= $value ->longitude ?>],{icon:icon_panti} ).addTo(mymap)
    .bindPopup("<b>Nama Panti : <?= $value->nama_panas ?></b><br/>"+
    "Kecamatan : <?= $value->nama_kecamatan ?></br>"+
    "No.Telp : <?= $value->nomor_telepon ?></br>");
<?php } ?>

</script>