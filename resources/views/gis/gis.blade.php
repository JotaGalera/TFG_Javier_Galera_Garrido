@extends('admin.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        GIS
        <small>Ubicaciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">GIS</li>
    </ol>
</section>
<!-- Main content -->
<section class="content container-fluid">


  <div id="map" style="height:480px;"></div>



</section>
<!-- /.content -->
@stop
@push('scripts')


<script>

//https://mygeodata.cloud/result
//mapboxgl.accessToken = 'pk.eyJ1IjoiamdhbGVyYSIsImEiOiJjanZmM29mOWIyMDNyNDBtbWxpdnJ3dnpoIn0.dk1mjSxkXbRQFw6fgtIfqQ';
//center: new L.LatLng(37.19791, -3.62396),
/*[
     -3,6238546,37,1976406
],
[
    -3,6237932,37,1976385
],
[
    -3,623432637,1976180
],
[
    -3,6234071,37,1979029
],
[
    -3,6235241,37,1980195
],
[
    -3,6235103,37,1981553
],
[
    -3,6243314,37,1982085
],
[
  -3,6245153,37,1980319
],
[
  -3,6245205,37,1979719
],
[
  -3,6238292,37,1979338
],
[
  -3,6238546,37,1976406
]*/
var osmUrl = '//{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            osm = new L.TileLayer(osmUrl, {
                maxZoom: 22,
                attribution: "Map data &copy; OpenStreetMap contributors"
            });
        var map = new L.Map('map', {
            layers: [osm],
            center: new L.LatLng(37.19791, -3.62396),
            zoom: 19
        });
        // This example uses a GeoJSON FeatureCollection saved to a file
        // (data.json), see the other example (live/index.html) for details on
        // fetching data using the OverpassAPI (this is also how the data in
        // data.json was generated)
        $.getJSON("data.json", function(geoJSON) {
            var indoorLayer = new L.Indoor(geoJSON, {
                getLevel: function(feature) {
                    if (feature.properties.relations.length === 0)
                        return null;
                    return feature.properties.relations[0].reltags.level;
                },
                onEachFeature: function(feature, layer) {
                    console.log(feature);
                    layer.bindPopup(JSON.stringify(feature.properties.id, null, 4));
                },
                style: function(feature) {
                    var fill = 'white';
                    if (feature.properties.tags.buildingpart === 'corridor') {
                        fill = '#169EC6';
                    } else if (feature.properties.tags.buildingpart === 'verticalpassage') {
                        fill = '#0A485B';
                    }
                    return {
                        fillColor: fill,
                        weight: 1,
                        color: '#666',
                        fillOpacity: 1
                    };
                }
            });
            indoorLayer.setLevel("0");
            indoorLayer.addTo(map);
            var levelControl = new L.Control.Level({
                level: "0",
                levels: indoorLayer.getLevels()
            });
            // Connect the level control to the indoor layer
            levelControl.addEventListener("levelchange", indoorLayer.setLevel, indoorLayer);
            levelControl.addTo(map);
        });

        legend.addTo(map);

</script>
@endpush
