<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300i,700" rel="stylesheet">
<body style="margin: 0 !important; padding: 0 !important; font-family: 'Open Sans Condensed', sans-serif;">

    <div style="background-image: url(/img/actuacion_parte_fondo.png); background-repeat: no-repeat; background-size: 595px; height: 830px; width: 810px;">
        <div style="position: absolute; left: 90; top: 98; text-align: left; width: 200px;">
            <p style="font-weight: 300; font-size: 14px; line-height: 0.1">{{ $objACT->fecha }}</p>
        </div>
        <div style="position: absolute; left: 450; top: 69; text-align: left; width: 200px;">
            <p style="font-weight: 300; font-size: 14px; line-height: 0.1">{{ substr($objACT->hora_ini,0,5) }}</p>
        </div>
        <div style="position: absolute; left: 450; top: 98; text-align: left; width: 200px;">
            <p style="font-weight: 300; font-size: 14px; line-height: 0.1">{{ substr($objACT->hora_fin,0,5) }}</p>
        </div>
        <div style="position: absolute; left: 368; top: 150; text-align: right; width: 200px;">
            <p style="font-weight: 700; font-size: 12px; line-height: 0.1">{{ strtoupper($objACT->Sistema->ClienteUbicacion->Cliente->razon_social) }}</p>
            <p style="font-weight: 700; font-size: 10px; line-height: 0.1">Identificador: {{ $objACT->id }}</p>
            <p style="font-weight: 300; font-size: 10px; line-height: 0.1">{{ $objACT->Sistema->ClienteUbicacion->nombre }}</p>
            <p style="font-weight: 300; font-size: 10px; line-height: 0.1">{{ $objACT->Sistema->ClienteUbicacion->direccion }}</p>
            <p style="font-weight: 300; font-size: 10px; line-height: 0.1">{{ $objACT->Sistema->Proyecto->nombre }}</p>
            <p style="font-weight: 300; font-size: 10px; line-height: 0.1">{{ $objACT->Sistema->SistemaTipo->nombre." - ".$objACT->Sistema->descripcion }}</p>
            <p style="font-weight: 300; font-size: 10px; line-height: 0.1">{{ $objACT->Sistema->ClienteUbicacion->Cliente->cif }}</p>

        </div>
        <div style="position: absolute; left: 36; top: 290; text-align: left; width: 540px;">
            <p style="font-weight: 300; font-size: 10px; line-height: 1.5">{!! $objACT->descripcion !!}</p>
        </div>
        <div style="position: absolute; left: 36; top: 650; text-align: left; width: 540px;">
            <p style="font-weight: 300; font-size: 10px; line-height: 1.5">{!! $objACT->observaciones !!}</p>
        </div>
        <div style="position: absolute; left: 36; top: 740; text-align: left; width: 360px;">
            <p style="font-weight: 300; font-size: 10px; line-height: 1.5">
                @foreach ($objUSER as $user)
                    | {{ $user->User->name }} | 
                @endforeach
            </p>
        </div> 
        <div style="position: absolute; left: 315; top: 740; text-align: center; width: 360px;">
            <p style="font-weight: 300; font-size: 10px; line-height: 1.5">
                {{ $objACT->firmada_por }}<br />
                @foreach ($objACT->ActuacionDocumento as $documento)
                    @if($documento->tipo == 1)
                        <img src="/storage/actuacion_documento/{{ $documento->ruta_recurso }}" style="height: 43px; " />
                    @endif 
                @endforeach
            </p>
        </div>                
    </div>
</body>
