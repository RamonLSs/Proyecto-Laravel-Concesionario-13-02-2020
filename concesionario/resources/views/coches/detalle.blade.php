@extends('plantillas.plantilla')
@section('titulo')
    Detalle Coche
@endsection
@section('cabecera')
    Detalles Coche Matricula <i><b>{{($coch->matricula)}}</b></i>

@endsection
@section('contenido')
    <span class="clearfix"></span>
    <div class="card text-white bg-info mt-5 mx-auto" style="max-width: 48rem;">
        <div class="card-header text-center"><b>{{($coch->matricula)}}</b></div>
        <div class="card-body" style="font-size: 1.1em">
            <h5 class="card-title text-center">{{($coch->marca->nombre)}}</h5>
            <p class="card-text">
            <div class="float-right"><img src="{{asset($coch->foto)}}" width="160px" heght="160px" class="rounded-circle"></div>
            <p><b>Modelo:</b> {{$coch->modelo}}</p>
            <p><b>Color:</b> {{$coch->color}}</p>
            <p><b>Tipo:</b> {{$coch->tipo}}</p>
            <p><b>Precio (€):</> {{$coch->pvp}}</p>
            <p><b>Kilometros:</b> {{$coch->klms}}</p>
            </p>
            <a href="{{route('coches.index')}}" class="float-right btn btn-success">Volver</a>
        </div>
    </div>



@endsection
