<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Lokasi Panti Asuhan Di Tegal</div>
                <div class="panel-body">

                    <div id="mapid" style="height: 500px;z-index: 1;"></div>

                </div>
            </div>
        </div>

    
    <script>
        let features;

        var data = [
            <?php foreach ($panti as $key => $value) { ?> {
                    "lokasi": [<?= $value->latitude ?>, <?= $value->longitude ?>],
                    "alamat": "<?= $value->alamat ?>",
                    "nama_panas": "<?= $value->nama_panas ?>",
                    "nama_kecamatan": "<?= $value->nama_kecamatan ?>",
                    "id_panas": "<?= $value->id_panas ?>",
                    "gambar": "<?= $value->gambar ?>"
                },
            <?php } ?>
        ];
        var mymap = L.map('mapid', {
            zoom: 11,
            center: L.latLng(-6.984450511999229, 109.14754099919053)
        });

        <?php if (!empty($list_kecamatan)) : ?>
            let tmp_features = [];
            let list_kecamatan = <?= json_encode($list_kecamatan) ?>;
            list_kecamatan.forEach(function(data_filter) {
                features.forEach(function(data_features) {
                    if (data_features.properties.id_kecamatan == data_filter.kecamatan_id) {
                        tmp_features.push(data_features);
                    };
                });
            })
            features = tmp_features;
        <?php else : ?>
            features = [];
        <?php endif; ?>

        L.geoJSON(features, {
            onEachFeature: function(feature, layer) {
                <?php if (!empty($list_kecamatan)) : ?>
                    layer.bindPopup(`<h5>${feature.properties.name}</h5><br><a href="<?= base_url('statistik/index') ?>/${feature.properties.id_kecamatan}/<?= @$jenis_data ?>/<?= @$tahun ?>" data-id_kecamatan='${feature.properties.id_kecamatan}' class='btn btn-default'>Lihat Statistik</a>`);
                <?php endif; ?>   
            }
        }).addTo(mymap);

        mymap.addLayer(L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org">OpenStreetMap</a> Pengguna, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">Yusli Bahtiar</a>,' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11'
        }));

        // menambah titik koordinat
        var markersLayer = new L.LayerGroup();

        mymap.addLayer(markersLayer);

        var controlSearch = new L.Control.Search({
            position: 'topright',
            layer: markersLayer,
            initial: false,
            zoom: 19,
            marker: false
        });

        mymap.addControl(new L.Control.Search({
            layer: markersLayer,
            initial: false,
            collapsed: true,
        }));

        for (i in data) {
            //isi pencarian yang muncul
            var nama_kecamatan = data[i].nama_kecamatan;
            var nama_panas = data[i].nama_panas;
            //auto posision lokasi ketika di klik
            var lokasi = data[i].lokasi;
            var idpanas = data[i].id_panas;
            var gambar = data[i].gambar;
            var marker = L.marker(L.latLng(lokasi), {
                title: [(nama_kecamatan) , (nama_panas)]
            });
            marker.bindPopup("<img src='<?= base_url('gambar/') ?>" + gambar + "' width='100%' height='100%'>" + nama_panas +
                "<br><a href='<?= base_url('webgis/detail/') ?>" + idpanas + "' class='btn btn-sm btn-default'>Detail</a></br>");
            markersLayer.addLayer(marker);
        }

        // Modal statistik
        // $('#modal-statistik').on('show.bs.modal', function(e) {
        //     let data = $(e.relatedTarget).data();
        //     console.log('oka');
        //     console.log(data.id_kecamatan);
        // })
    </script>
</div>
</div>