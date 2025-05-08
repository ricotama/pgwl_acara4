@extends('layout.template')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">

    <style>
        #map {
            width: 100%;
            height: calc(100vh - 56px);
        }
    </style>
    </head>

    <body>

    @section('content')
        <div id="map"></div>

        <!-- Modal Create Point -->
        <div class="modal fade" id="createpointModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create Point</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('points.store') }}" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Fill point name" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="geom_points" class="form-label">Geometry</label>
                                <textarea class="form-control" id="geom_points" name="geom_points" rows="3"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Photo</label>
                                <input type="file" class="form-control" id="image_point" name="image"
                                onchange="document.getElementById('preview-image-point').src = window.URL.
                                createObjectURL(this.files[0])">
                                <img src="" alt="" id="preview-image-point" class="img-thumbnail" width="400">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal Create Polyline -->
        <div class="modal fade" id="createpolylineModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create Polyline</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('polylines.store') }}" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Fill point name" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="geom_polylines" class="form-label">Geometry</label>
                                <textarea class="form-control" id="geom_polylines" name="geom_polylines" rows="3"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Photo</label>
                                <input type="file" class="form-control" id="image_polyline" name="image"
                                onchange="document.getElementById('preview-image-polyline').src = window.URL.createObjectURL(this.files[0])">
                                <img src="" alt="" id="preview-image-polyline" class="img-thumbnail" width="400">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Create Polygon -->
        <div class="modal fade" id="createpolygonModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create Polygon</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('polygons.store') }}" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Fill point name" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="geom_polygons" class="form-label">Geometry</label>
                                <textarea class="form-control" id="geom_polygons" name="geom_polygons" rows="3"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Photo</label>
                                <input type="file" class="form-control" id="image_polygone" name="image"
                                onchange="document.getElementById('preview-image-polygone').src = window.URL.createObjectURL(this.files[0])">
                                <img src="" alt="" id="preview-image-polygone" class="img-thumbnail" width="400">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    @endsection

    @section('scripts')
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        <script src="https://unpkg.com/@terraformer/wkt"></script>


        <script>
            var map = L.map('map').setView([51.505, -0.09], 13);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);



            /* Digitize Function */
            var drawnItems = new L.FeatureGroup();
            map.addLayer(drawnItems);

            var drawControl = new L.Control.Draw({
                draw: {
                    position: 'topleft',
                    polyline: true,
                    polygon: true,
                    rectangle: true,
                    circle: true,
                    marker: true,
                    circlemarker: false
                },
                edit: false
            });

            map.addControl(drawControl);

            map.on('draw:created', function(e) {
                var type = e.layerType,
                    layer = e.layer;

                console.log(type);

                var drawnJSONObject = layer.toGeoJSON();
                var objectGeometry = Terraformer.geojsonToWKT(drawnJSONObject.geometry);

                console.log(drawnJSONObject);
                // console.log(objectGeometry);

                if (type === 'polyline') {
                    console.log("Create " + type);

                    $('#geom_polylines').val(objectGeometry);

                    //nanti memunculkan modal create polyline
                    $('#createpolylineModal').modal('show');

                } else if (type === 'polygon' || type === 'rectangle') {
                    console.log("Create " + type);
                    $('#geom_polygons').val(objectGeometry);
                    //nanti memunculkan modal create polygon
                    $('#createpolygonModal').modal('show');



                } else if (type === 'marker') {
                    console.log("Create " + type);

                    $('#geom_points').val(objectGeometry);

                    //memunculkan modal create marker
                    $('#createpointModal').modal('show');
                } else {
                    console.log('__undefined__');
                }

                drawnItems.addLayer(layer);
            });

            //GeoJSON Points


            var point = L.geoJson(null, {
                onEachFeature: function(feature, layer) {
                    var routedelete = "{{route('points.destroy', 'id')}}";
                    routedelete = routedelete.replace('id', feature.properties.id);

                    var popupContent = "Nama: " + feature.properties.name + "<br>" +
                        "Deskripsi: " + feature.properties.description + "<br>" +
                        "Dibuat: " + feature.properties.created_at + "<br>" +
                        "<img src='{{ asset('storage/images') }}/" + feature.properties.image +"' width='300'alt=''>" + "<br>" +
                        "<form method='POST' action='" + routedelete + "'>" +
                        '@csrf' + '@method("DELETE")' +
                        "<button type='submit' class='btn btn-sm btn-danger' onclick='return confirm(\"Yakin akan dihapus?\")'>" +
                        "<i class='fa-solid fa-trash-can'></i></button>" +
                        "</form>";

                    layer.on({
                        click: function(e) {
                            point.bindPopup(popupContent);
                        },
                        mouseover: function(e) {
                            point.bindTooltip(feature.properties.name);
                        },
                    });
                },
            });
            $.getJSON("{{ route('api.points') }}", function(data) {
                point.addData(data);
                map.addLayer(point);
            });

            // GeoJSON Polylines
            var polyline = L.geoJson(null, {
                /* Style polyline */
                style: function(feature) {
                    return {
                        color: "#3388ff",
                        weight: 3,
                        opacity: 1,
                    };
                },
                onEachFeature: function(feature, layer) {

                    var routedelete = "{{route('polylines.destroy', 'id')}}";
                    routedelete = routedelete.replace('id', feature.properties.id);

                    var popupContent = "Nama: " + feature.properties.name + "<br>" +
                        "Description: " + feature.properties.description + "<br>" +
                        "Dibuat: " + feature.properties.created_at + "<br>" +
                        "Panjang (m): " + feature.properties.length_m + "<br>" +
                        "Panjang (km): " + feature.properties.length_km + "<br>" +
                        "<img src='{{asset('storage/images/') }}/" + feature.properties.image + "' width='250' alt=''>" + "<br>" +
                        "<form method='POST' action='" + routedelete + "'>" +
                        '@csrf' + '@method("DELETE")' +
                        "<button type='submit' class='btn btn-sm btn-danger' onclick='return confirm(\"Yakin akan dihapus?\")'>" +
                        "<i class='fa-solid fa-trash-can'></i></button>" +
                        "</form>";
                    layer.on({
                        click: function(e) {
                            polyline.bindPopup(popupContent);
                        },
                        mouseover: function(e) {
                            polyline.bindTooltip(feature.properties.name, {
                                sticky: true,
                            });
                        },
                    });
                },
            });
            $.getJSON("{{ route('api.polylines') }}", function(data) {
                polyline.addData(data);
                map.addLayer(polyline);
            });

            // GeoJSON Polygons
            var polygon = L.geoJson(null, {
                /* Style polygon */
                style: function(feature) {
                    return {
                        color: "#3388ff",
                        fillColor: "#3388ff",
                        weight: 2,
                        opacity: 1,
                        fillOpacity: 0.2,
                    };
                },
                onEachFeature: function(feature, layer) {

                    var routedelete = "{{route('polygons.destroy', 'id')}}";
                    routedelete = routedelete.replace('id', feature.properties.id);

                    var popupContent = "Nama : " + feature.properties.name + "<br>" +
                        "Deskripsi: " + feature.properties.description + "<br>" +
                        "Luas : " + feature.properties.area_hectare.toFixed(3) + " Ha" + "<br>" +
                        "<img src='{{asset('storage/images/') }}/" + feature.properties.image + "' width='250' alt=''>" + "<br>" +
                        "<form method='POST' action='" + routedelete + "'>" +
                        '@csrf' + '@method("DELETE")' +
                        "<button type='submit' class='btn btn-sm btn-danger' onclick='return confirm(\"Yakin akan dihapus?\")'>" +
                        "<i class='fa-solid fa-trash-can'></i></button>" +
                        "</form>";
                    layer.on({
                        click: function(e) {
                            polygon.bindPopup(popupContent);
                        },
                        mouseover: function(e) {
                            polygon.bindTooltip(feature.properties.name, {
                                sticky: true,
                            });
                        },
                    });
                },
            });
            $.getJSON("{{ route('api.polygons') }}", function(data) {
                polygon.addData(data);
                map.addLayer(polygon);
            });
        </script>
    @endsection
</body>

</html>
