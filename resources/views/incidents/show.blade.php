@extends('layouts.app')

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">Dashboard</div>
  <div class="panel-body">

<!--Mostrar errors-->
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
        @endforeach;
      </ul>
    </div>
    @endif
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Codigo</th>
          <th>Proyecto</th>
          <th>Categorias</th>
          <th>Fecha de envio</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td id="incident_key">{{ $incident->id }}</td>
          <td id="incident_project">{{ $incident->project->name }}</td>
          <td id="incident_category">{{ $incident->category_name }}</td>
          <td id="incident_created_at">{{ $incident->created_at }}</td>
        </tr>
      </tbody>
      <thead>
        <tr>
          <th>Asignado</th>
          <th>Visibilidad</th>
          <th>Estado</th>
          <th>Severidad</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td id="incident_responsable">{{ $incident->support_name }}</td>
          <td>Publio</td>
          <td id="incident_state">{{ $incident->state }}</td>
          <td id="incident_severity">{{ $incident->severity_full }}</td>
        </tr>
      </tbody>
    </table>
    <table class="table table-bordered">
      <tbody>
        <tr>
          <th>Titulo</th>
          <td id="incident_sumary">{{ $incident->title }}</td>
        </tr>
        <tr>
          <th>Descripción</th>
          <td id="incident_description">{{ $incident->description }}</td>
        </tr>
        <tr>
          <th>Adjuntos</th>
          <td id="incident_attachment">No se han adjuntado archivos.</td>
        </tr>
      </tbody>
    </table>

  </div>
</div>

@endsection
