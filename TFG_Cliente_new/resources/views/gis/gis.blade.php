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
    <div class="form-group col-xs-4 pull-right">
        <div class="form-group">
            <div style="padding-right: 10px;">
                <select id="selectUbicacion" class="form-control select2" name="state"></select>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div id="map" style="height:480px;"></div>
</section>
<!-- /.content -->
@stop
@push('scripts')
<script>

// MAPA //
//https://epsg.io/map#srs=4326&x=-3.624518&y=37.197977&z=19&layer=streets

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

var lat = 37.19791;
var lng = -3.62396;
var evento;        
var c = new L.Control.Coordinates();

c.addTo(map);

var delMarker;
var indoorLayer = '';
var levelControl = '';

// EVENTO CLICK EN EL MAPA
map.on('click', function(e) {
    //COORDENADAS
    evento = e;
    c.setCoordinates(e);

    //MARKER
    if(delMarker)
        map.removeLayer(delMarker);
    lat = e.latlng.lat;
    lng = e.latlng.lng;
    delMarker = L.marker([lat, lng],{draggable:true}).addTo(map).on('drag', infoLatLngDraw).on('dragend', infoLatLng);

});
// EVENTO MOUSE DIBUJA EN EL MAPA
function infoLatLngDraw(e) {
    
    evento.latlng.lat = e.target._latlng.lat
    evento.latlng.lng = e.target._latlng.lng
    c.setCoordinates(evento);
}

// EVENTO MOUSE SUELTAS CLICK EN EL MAPA
function infoLatLng(e) {
    
    evento.latlng.lat = e.target._latlng.lat
    evento.latlng.lng = e.target._latlng.lng
    c.setCoordinates(evento);
}

$('#selectUbicacion').select2({
    minimumResultsForSearch: Infinity,
    placeholder: " - Busca y selecciona una ubicación - ",
    ajax: {
        url: '/ubicacion/getubicacionesuser/',
        processResults: function (data) {
            return {
            results: $.map(data, function(obj) {
                return { id: obj.id, text: obj.name };
                })
            };
        }
        }
}).on('change' , function (e) {
    
    $name = $("#selectUbicacion option:selected").text()+".json";
    map.removeLayer(indoorLayer);
    if (levelControl){
        map.removeControl(levelControl);
    }

    $.getJSON($name, function(geoJSON) {
        indoorLayer = new L.Indoor(geoJSON, {
            getLevel: function(feature) {
                if (feature.properties.relations.length === 0)
                    return null;
                return feature.properties.relations[0].reltags.level;
            },
            onEachFeature: function(feature, layer) {
                var name = JSON.stringify(feature.properties.tags.name);
                var postname = JSON.stringify(feature.properties.tags.postname);
                var arrayFornitures = Array.from(feature.properties.tags.inventario);
                var descriptionFornitures = ""
                for (i = 0; i < arrayFornitures.length; i++) {
                    descriptionFornitures += "<br>-" + arrayFornitures[i].name + ", desc: " + arrayFornitures[i].description;
                }
            
                if(postname){
                    var cadenafinal = "Edificio: "+name+"<br>Tipo de hab.:"+postname+"<br>Inventario:"+descriptionFornitures;
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
        indoorLayer.setLevel("1"); // set legend flat in right corner down
        indoorLayer.addTo(map);
        levelControl = new L.Control.Level({
            level: "1",
            levels: indoorLayer.getLevels()
        });
        // Connect the level control to the indoor layer
        levelControl.addEventListener("levelchange", indoorLayer.setLevel, indoorLayer);
        levelControl.addTo(map);

        
    });
});
</script>
@endpush
