<div class="container">

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Pemetaan Lokasi Panti Asuhan Di Tegal</div>
            <div class="panel-body">

            <div id="mapid" style="height: 500px;"></div>

            </div>
        </div>
    </div>
</div>
<script>
var data = [
    <?php foreach ($panti as $key => $value) { ?>
	{"lokasi":[<?= $value->latitude ?>, <?= $value ->longitude ?>],
    "alamat":"<?= $value->alamat ?>",
    "nama_panas":"<?= $value->nama_panas ?>",
    "id_panas":"<?= $value->id_panas ?>",
    "gambar":"<?= $value->gambar ?>"
    },
    <?php } ?>
	];
var mymap = L.map('mapid', {zoom: 12, center: L.latLng(-6.898428, 109.124534) });

mymap.addLayer( L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org">OpenStreetMap</a> Pengguna, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">Yusli Bahtiar</a>,' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11'}));

// menambah titik koordinat
    var markersLayer = new L.LayerGroup();	
	
	mymap.addLayer(markersLayer);

	var controlSearch = new L.Control.Search({
		position:'topright',		
		layer: markersLayer,
		initial: false,
		zoom: 19,
		marker: false
	});

mymap.addControl(new L.Control.Search({
    layer : markersLayer,
    initial : false,
    collapsed : true,
}));

for(i in data){
    //isi pencarian yang muncul
    var alamat = data[i].alamat;
    var nama_panas = data[i].nama_panas;
    //auto posision lokasi ketika di klik
	var lokasi = data[i].lokasi;	
	var idpanas = data[i].id_panas;	
	var gambar = data[i].gambar;	
    var marker = L.marker ( L.latLng(lokasi),{title: [nama_panas , alamat] } );
    marker.bindPopup("<img src='<?= base_url('gambar/')?>"+gambar+"' width='100%' height='100%'>"+'Nama Panti : '+ nama_panas + "<br>Alamat : "+alamat+
    "<br><a href='<?= base_url('webgis/detail/')?>"+ idpanas+"' class='btn btn-sm btn-default'>Detail</a></br>");
    markersLayer.addLayer(marker);
}
</script>

</div>