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
<section>
    <button id="actualizar" style="margin-left:2%;" class="btn btn-primary"> Actualizar </button>
    <button id="addCoord" style="margin-left:2%;" class="btn btn-primary"> Añadir Coordenadas </button>
</section>
<section>
    <!-- MODAL ELEGIR UBICACION ACTUALIZAR -->
    <div class="modal" id="modalUpdateUbicacion" >
        <form method="POST" action="" id="formUpdate" role="form">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title-space"></h4>
                </div>

                <div  class="modal-body">
                    @csrf
                    <div class="box-body">
                        <div class="form-group col-md-12">
                            <label>Ubicacion</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                                <select class="form-control select2 ubicacion" id="ubicacion" name="ubicacion" style="width:100%"></select>
                            </div>
                        </div>
                    </div>
                <div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="id">
                    <button type="button" class="btn btn-primary pull-left" id="actualiza_json">Actualizar</button>
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
        </form>
    </div>
    </section>
    <section>
    <!-- MODAL AÑADIR COORDENADAS -->
    <div class="modal" id="modalAddCoords" >
        <form method="POST" action="" id="formSet" role="form">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title-space"></h4>
                </div>

                <div  class="modal-body">
                    @csrf
                    <div class="box-body">
                        <div class="form-group col-md-6">
                            <label>Ubicacion</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                                <select class="form-control select2 ubicacion" id="ubicacion_coord" name="ubicacion_coord" style="width:100%"></select>
                            </div>
                        </div>
                    
                        <div class="form-group col-md-6">
                            <label>Espacio</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                                <select class="form-control select2" id="espacio_coord" name="espacio_coord" style="width:100%"></select>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group col-md-12">
                            <label>Latitud y Longitud</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <input class="form-control " id="lat_lon" name="lat_lon" style="width:40%">
                            </div>
                        </div>
                    </div>
                <div>
                <!-- TABLA DE COORDENADAS -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Listado de Coordenadas</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="tableCoordenadas" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Coordenada X</th>
                                            <th>Coordenada Y</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="espacio_id" id="espacio_id">
                    <button type="button" class="btn btn-primary pull-left" id="set_coord">Añadir coordenada</button>
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!-- /.FIN MODAL -->
</section>
<section>
    <!-- MODAL UPDATE COORDENADAS -->
    <div class="modal" id="modalUpdateCoordenadas" >
        <form method="POST" action="" id="formUpdateCoordenadas" role="form">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title-modify">Modificando coordenada</h4>
                </div>
                <div  class="modal-body">
                    @csrf
                    <div class="box-body">
                        <div class="form-group col-md-12">
                            <label>Latitud y Longitud</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <input class="form-control " id="lat_lon_update" name="lat_lon_update" style="width:100%">
                            </div>
                        </div>
                    </div>
                <div>
                <div class="modal-footer">
                    <input type="hidden" name="espacio_id" id="espacio_id">
                    <button type="button" class="btn btn-primary pull-left" id="update_coord">Modificar coordenada</button>
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!-- /.FIN MODAL -->
</section>
@stop
@push('scripts')


<script>


$(document).on('click', '#actualizar', function(){
    $('#modalUpdateUbicacion').modal('show');
});

$(document).on('click', '#addCoord', function(){
    $('#modalAddCoords').modal('show');
});

$(document).on('click', '#actualiza_json' , function(){
    $.ajax({
        type: 'POST',
        url: 'espacio/generateJson',
        data: $("#formUpdate").serialize(),
        success:function(data)
        {
            console.log(data);
            alertify.success('Ubicacion actualizada');
            $("#articulo").prop('selectedIndex',0);
            
        },
        error:function(data)
        {
            console.log(data);
            alertify.success('ERROR: No se ha podido actualizar la ubicación.');
        }
    })
});

$('.ubicacion').select2({
    minimumResultsForSearch: Infinity,
    placeholder: "- Selecciona una ubicacion -",
    ajax: {
        url: 'ubicacion/getubicacionesuser',
        type: 'GET',
        processResults: function (data) {
            return {
                results: $.map(data, function(obj) {
                    return { id: obj.id, text: obj.name+" ["+obj.address+", "+obj.number+"] " };
                })
            };   
        },
        
    }
}).on('change', function(e){
    $('#espacio_coord').val(null).trigger("change");
});

$('#espacio_coord').select2({
    minimumResultsForSearch: Infinity,
    placeholder: "- Selecciona un espacio -",
    ajax: {
        type: 'GET',
        url: function() {
            return 'espacio/getespacioubicacion/'+$('#ubicacion_coord').val();
        },
        processResults: function (data) {
            return {
                results: $.map(data, function(obj) {
                    return { id: obj.id, text: obj.description+" [Piso:"+obj.floor+", Numero:"+obj.number+"] " };
                })
            };
        },
    }
});

// Cuando el espacio ha sido seleccionado
$('#espacio_coord').on('select2:select', function (e) {
    var dat = e.params.data;
    var space_id = dat['id'];
    $('#tableCoordenadas').DataTable().destroy();
    $('#tableCoordenadas').DataTable({
        
        "ajax": "coordenadas/getdatatable/"+space_id,
        "columns":[
            {data:'id'},
            {data:'CoorX'},
            {data:'CoorY'},
            {data:'action', orderable:false, searchable: false},
        ],
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf'
        ]
    });
    
});

$(document).on('click', '#set_coord', function(){
    $.ajax({
        type: 'POST',
        url: 'coordenadas',
        data: $("#formSet").serialize(),
        success:function(data)
        {
            console.log(data);
            alertify.success('Coordenadas añadidas');
            $('#tableCoordenadas').DataTable().ajax.reload(null, false);
            
        },
        error:function(data)
        {
            console.log(data);
            alertify.success('ERROR: No se ha podido añadir la coordenada.');
        }
    })
});

$(document).on('click','.delete-coordenadas',function(){
    var id = $(this).attr("id");
    alertify.confirm('¿Desea eliminar a esta coordenada?', 'Esta acción no puede deshacerse',
        function(){
            $.ajax({
                url : 'coordenadas/'+id,
                type : 'DELETE',
                data: $("#formSet").serialize(),
                success:function(data)
                {
                    $('#tableCoordenadas').DataTable().ajax.reload(null, false);
                    alertify.success('Coordenada eliminada correctamente');
                }
            })
        },
        function(){
            alertify.error('Acción cancelada')
        }
    );
});

var p;
$(document).on('click','.modify-coordenadas',function(){
    $('.modal-title-modify').text('Modificando esto 2');
    $('#modalUpdateCoordenadas').modal('show');
    p = $(this).attr("id"); 
});

$(document).on('click','#update_coord',function(){
    
    console.log(p);
    $.ajax({
        url : 'coordenadas/'+p,
        type : 'PUT',
        data: $("#formUpdateCoordenadas").serialize(),
        success:function(data)
        {
            console.log(data);
            $('#tableCoordenadas').DataTable().ajax.reload(null, false);
            alertify.success('Coordenada actualizada correctamente');
        }
    })
});

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

// Lectura de mapa desde json
$.getJSON("myjson.json", function(geoJSON) {
    var indoorLayer = new L.Indoor(geoJSON, {
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
    var levelControl = new L.Control.Level({
        level: "1",
        levels: indoorLayer.getLevels()
    });
    // Connect the level control to the indoor layer
    levelControl.addEventListener("levelchange", indoorLayer.setLevel, indoorLayer);
    levelControl.addTo(map);

    
});
        


        
        
  
</script>
@endpush
