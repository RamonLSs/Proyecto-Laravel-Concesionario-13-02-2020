@extends('plantillas.plantilla')
@section('titulo')
Crear Coche
@endsection
@section('cabecera')
Crear Coche
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
<form name="c" method='POST' action="{{route('coches.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
      <div class="col">
        <input type="text" class="form-control" placeholder="Matricula" name='matricula' required>
      </div>
      <div class="col">
        <select name='marca_id' class="form-control">
            @foreach ($marcas as $item)
        <option value="{{$item->id}}">{{$item->nombre}}</option>   
            @endforeach
        </select>
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Modelo" name='modelo' required>
      </div>
    </div>
    <div class="form-row mt-3">
        <div class="col">
          <input type="text" class="form-control" placeholder="Color" name='color'>
        </div>
        <div class="col">
          <select name='tipo' class="form-control">
            <option selected>Diesel</option>
            <option>Gasolina</option>
            <option>Híbrido</option>
            <option>Eléctrico</option>
            <option>Gas (GNC/GLC)</option>
        </select>
        </div>
        <div class="col">
            <input type="number" class="form-control" placeholder="Kilometros" name="klms" required min="0">
          </div>
          <div class="col">
            <input type="number" class="form-control" placeholder="Precio(€)" name="pvp" required step="0.50" min="0">
          </div>
      </div>
      <div class="form-row mt-3">
        <div class="col">
            <b>Imagen</b>&nbsp;<input type='file' name='foto' accept="image/*">
        </div>
      </div>
      <div class="form-row mt-3">
        <div class="col">
            <input type='submit' value='Guardar' class='btn btn-success mr-3'>
            <input type='reset' value='Limpiar' class='btn btn-warning mr-3'>
            <a href={{route('coches.index')}} class='btn btn-info'>Volver</a>
        </div>
    </div>

  </form>
@endsection