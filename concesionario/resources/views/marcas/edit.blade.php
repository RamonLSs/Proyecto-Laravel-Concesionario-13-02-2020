@extends('plantillas.plantilla')
@section('titulo')Editar Marca
@endsection
@section('cabecera')
Modificar Marca
@endsection
@section('contenido')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $miError)
            <li>{{$miError}}</li>
            @endforeach
        </ul>
    </div>
@endif
<form name="c" method='POST' action="{{route('marcas.update', $marca)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-row">
      <div class="col">
      <input type="text" class="form-control" value='{{$marca->nombre}}' name='nombre' required>
      </div>
      <div class="col">
        <input type="text" class="form-control" value='{{$marca->pais}}' name='pais' required>
      </div>
    </div>

      <div class="form-row mt-3">
        <div class="col">
        <img src="{{asset($marca->logo)}}" width="40vw" height="40vh" class="rounded-circle mr-3">
            <b>Logo</b>&nbsp;<input type='file' name='foto' accept="image/*">
        </div>
      </div>
      <div class="form-row mt-3">
        <div class="col">
            <input type='submit' value='Modificar' class='btn btn-success mr-3'>

            <a href={{route('marcas.index')}} class='btn btn-info'>Volver</a>
        </div>
    </div>

  </form>
@endsection
