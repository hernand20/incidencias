@extends('layouts.app')

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">Dashboard</div>
  <div class="panel-body">

<!--Mostrar errors-->
@if (session('notification'))
<div class="alert alert-success">
  {{ session('notification') }}
</div>
@endif

    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
        @endforeach;
      </ul>
    </div>
    @endif
    <form action="" method="POST">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control" {{ old('name') }}>
      </div>
      <div class="form-group">
        <label for="description">Descripcion</label>
        <input type="text" name="description" class="form-control" {{ old('description') }}>
      </div>
      <div class="form-group">
        <label for="start">Fecha inicio</label>
        <input type="date" name="start" class="form-control" {{ old('start', date('Y-m-d')) }}>
      </div>
      <div class="form-group">
        <button type="submit" value="button" class="btn btn-primary">Registrar Proyecto</button>
      </div>
    </form>
    <table class="table title-bordere">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Descripcion</th>
          <th>Fecha inicio</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($projects as $project)
        <tr>
          <td>{{ $project->name }}</td>
          <td>{{ $project->description }}</td>
          <td>{{ $project->start ?:'No se ha indicado fecha de inicio' }}</td>
          <td>
            <a href="/proyecto/{{ $project->id}}" class="btn btn-sm btn-primary " title="Editar">
              <span class="glyphicon glyphicon-pencil"></span></a>
            @if ($project->trashed())
            <a href="/proyecto/{{ $project->id }}/restore" class="btn btn-sm btn-danger " title="Habilitar">
              <span class="glyphicon glyphicon-repeat"></span></a>
            @else
            <a href="/proyecto/{{ $project->id }}/eliminar" class="btn btn-sm btn-danger " title="deshabilitado">
              <span class="glyphicon glyphicon-remove"></span></a>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
