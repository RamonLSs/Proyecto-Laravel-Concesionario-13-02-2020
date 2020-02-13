@extends('plantillas.plantilla')
@section('titulo')
    Detalle Marca
@endsection
@section('cabecera')
    Detalles Marca <i><b>{{($marca->nombre)}}</b></i>

@endsection
@section('contenido')
    <span class="clearfix"></span>
    <div class="card text-white bg-info mt-5 mx-auto" style="max-width: 48rem;">
        <div class="card-header text-center"><b>{{($marca->nombre)}}</b></div>
        <div class="card-body" style="font-size: 1.1em">
            <h5 class="card-title text-center">{{($marca->nombre)}}</h5>
            <p class="card-text">
            <div class="float-right"><img src="{{asset($marca->logo)}}" width="160px" heght="160px" class="rounded-circle"></div>
            <p><b>Nombre:</b> {{$marca->nombre}}</p>
            <p><b>Pais:</b> {{$marca->pais}}</p>
            </p>
            <a href="{{route('marcas.index')}}" class="float-right btn btn-success">Volver</a>
        </div>
    </div>



@endsection
