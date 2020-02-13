@extends('plantillas.plantilla')
@section('titulo')
Marcas
@endsection
@section('cabecera')
Marcas Disponibles
@endsection
@section('contenido')
@if($texto=Session::get('mensaje'))
<p class="alert alert-success my-3">{{$texto}}</p>
@endif
<div class="container">
<a href="{{route('marcas.create')}}" class="btn btn-success mb-3">Guardar Marca</a>

<form name="search" method="get" action="{{route('marcas.index')}}" class="form-inline float-right">
    <i class="fa fa-search fa-2x ml-2 mr-2" aria-hidden="true"></i>
    <select name='pais' class='form-control mr-2' onchange="this.form.submit()">
      <option value='%'>Todos</option>
      @foreach($paises as $pais)
        @if($pais==$request->pais)
          <option selected>{{$pais}}</option>
        @else
          <option >{{$pais}}</option>
        @endif
      @endforeach
    </select>
  <input type="submit" value="Buscar" class="btn btn-info ml-2">
</form>
</div>
<table class="table table-striped table-dark mt-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Logo</th>
        <th scope="col">Pais</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach($marcas as $marca)
      <tr>
        <th scope="row" class="align-middle">
        <a href="{{route('marcas.show', $marca)}}" class="btn btn-info">Detalles</a>
        </th>
    <td class="align-middle">{{$marca->nombre}}</td>
    <td>
        <img src="{{asset($marca->logo)}}" width="90px" height='90px' class="rounded-circle">
        </td>
    <td class="align-middle">{{$marca->pais}}</td>
    <td class="align-middle" style="white-space: nowrap">
    <form name="borrar" method='post' action='{{route('marcas.destroy', $marca)}}'>
      @csrf
      @method('DELETE')
      <a href='{{route('marcas.edit', $marca)}}' class="btn btn-warning">Editar</a>
      <button type='submit' class="btn btn-danger" onclick="return confirm('¿Borrar Marca?')">
        Borrar</button>
    </form>
    </td>
      </tr>
     @endforeach
    </tbody>
  </table>
  {{$marcas->appends(Request::except('page'))->links()}}
@endsection
