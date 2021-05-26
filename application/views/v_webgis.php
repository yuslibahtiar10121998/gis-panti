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
            <?php foreach ($panti as $key => $value) { ?> {
                    "lokasi": [<?= $value->latitude ?>, <?= $value->longitude ?>],
                    "alamat": "<?= $value->alamat ?>",
                    "nama_panas": "<?= $value->nama_panas ?>",
                    "id_panas": "<?= $value->id_panas ?>",
                    "gambar": "<?= $value->gambar ?>"
                },
            <?php } ?>
        ];
        var mymap = L.map('mapid', {
            zoom: 12,
            center: L.latLng(-6.898428, 109.124534)
        });

        let features = [{
            "type": "Feature",
            "properties": {
                "name": "Margadana",
                "party": "margadana"
            },
            "geometry": {
                "type": "Polygon",
                "coordinates": [
                    []
                ]
            }
        }, ]

        L.geoJSON(features, {
            style: function(feature) {
                switch (feature.properties.party) {
                    case "margadana":
                        return {
                            color: "#FF0000"
                        };
                    case "tegal_timur":
                        return {
                            color: "#FF8000"
                        };
                    case "tegal_barat":
                        return {
                            color: "#FFFF00"
                        };
                    case "tegal_selatan":
                        return {
                            color: "#80FF00"
                        };
                    case "adiwerna":
                        return {
                            color: "#00FF00"
                        };
                    case "balapulang":
                        return {
                            color: "#00FF80"
                        };
                    case "bojong":
                        return {
                            color: "#00FFFF"
                        };
                    case "bumijawa":
                        return {
                            color: "#0080FF"
                        };
                    case "dukuhturi":
                        return {
                            color: "#0000FF"
                        };
                    case "dukuhwaru":
                        return {
                            color: "#7F00FF"
                        };
                    case "jatinegara":
                        return {
                            color: "#FF00FF"
                        };
                    case "kedungbanteng":
                        return {
                            color: "#FF007F"
                        };
                    case "kramat":
                        return {
                            color: "#808080"
                        };
                    case "lebaksiu":
                        return {
                            color: "#FF9999"
                        };
                    case "margasari":
                        return {
                            color: "#FFCC99"
                        };
                    case "pagerbarang":
                        return {
                            color: "#FFFF99"
                        };
                    case "pangkah":
                        return {
                            color: "#CCFF99"
                        };
                    case "slawi":
                        return {
                            color: "#99FF99"
                        };
                    case "suradadi":
                        return {
                            color: "#99FFCC"
                        };
                    case "talang":
                        return {
                            color: "#99FFFF"
                        };
                    case "tarub":
                        return {
                            color: "#99CCFF"
                        };
                    case "warureja":
                        return {
                            color: "#9999FF"
                        };

                }
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
            var alamat = data[i].alamat;
            var nama_panas = data[i].nama_panas;
            //auto posision lokasi ketika di klik
            var lokasi = data[i].lokasi;
            var idpanas = data[i].id_panas;
            var gambar = data[i].gambar;
            var marker = L.marker(L.latLng(lokasi), {
                title: [nama_panas, alamat]
            });
            marker.bindPopup("<img src='<?= base_url('gambar/') ?>" + gambar + "' width='100%' height='100%'>" + 'Nama Panti : ' + nama_panas + "<br>Alamat : " + alamat +
                "<br><a href='<?= base_url('webgis/detail/') ?>" + idpanas + "' class='btn btn-sm btn-default'>Detail</a></br>");
            markersLayer.addLayer(marker);
        }
    </script>

</div>