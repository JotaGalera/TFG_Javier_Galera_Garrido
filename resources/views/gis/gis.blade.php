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
                    var name = JSON.stringify(feature.properties.tags.name);
                    
                    var postname = JSON.stringify(feature.properties.tags.postname);
                    
                    if(postname){
                        var cadenafinal = name+","+postname;
                    }else{
                        var cadenafinal = name;
                    }

                    layer.bindPopup(cadenafinal);
                },
                style: function(feature) {
                    var fill = '#F6EFBE';
                    if (feature.properties.tags.buildingpart === 'hall') {
                        fill = '#CAC9D9';
                    } else if (feature.properties.tags.buildingpart === 'conjunto_habitaciones') {
                        fill = '#AAA9A9';
                    } else if (feature.properties.tags.buildingpart === 'conserjeria') {
                        fill = '#EBCAEA';
                    } else if (feature.properties.tags.buildingpart === 'aula') {
                        fill = '#CAC9C9';
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
