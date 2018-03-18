@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
      @if (auth()->user()->is_support)
      <!--Incidencias asignadas a mí.-->
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Incidencias asignadas a mí.</h3>
        </div>
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Código</th>
                <th>Categoría</th>
                <th>Severidad</th>
                <th>Estado</th>
                <th>Fecha creación</th>
                <th>Titulo</th>
              </tr>
            </thead>
            <tbody id="dashboard_my_incidents">
              @foreach ($my_incidents as $incident)
                <tr>
                  <td>{{ $incident->id }}</td>
                  <td>{{ $incident->Category->name }}</td>
                  <td>{{ $incident->severity_full }}</td>
                  <td>{{ $incident->id }}</td>
                  <td>{{ $incident->created_at }}</td>
                  <td>{{ $incident->title_short }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <!--Incidencias sin asignar.-->
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Incidencias sin asignar.</h3>
        </div>
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Código</th>
                <th>Categoría</th>
                <th>Severidad</th>
                <th>Estado</th>
                <th>Fecha creación</th>
                <th>Titulo</th>
                <th>Opción</th>
              </tr>
            </thead>
            <tbody id="dashboard_pending_incidents">
              @foreach ( $pending_incidents as $incident)
                <tr>
                  <td>{{ $incident->id }}</td>
                  <td>{{ $incident->Category->name }}</td>
                  <td>{{ $incident->severity_full }}</td>
                  <td>{{ $incident->id }}</td>
                  <td>{{ $incident->created_at }}</td>
                  <td>{{ $incident->title_short }}</td>
                  <td>
                    <a href="#" class="btn btn-primary btn-sm">
                      Atender
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      @endif

      <!--Incidencias asignadas a otros.-->
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Incidencias reportados por mí.</h3>
        </div>
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Código</th>
                <th>Categoría</th>
                <th>Severidad</th>
                <th>Estado</th>
                <th>Fecha creación</th>
                <th>Titulo</th>
                <th>Responsable</th>
              </tr>
            </thead>
            <tbody id="dashboard_by_me">
              @foreach ( $incident_by_me as $incident)
                <tr>
                  <td>{{ $incident->id }}</td>
                  <td>{{ $incident->category_name }}</td>
                  <td>{{ $incident->severity_full }}</td>
                  <td>{{ $incident->id }}</td>
                  <td>{{ $incident->created_at }}</td>
                  <td>{{ $incident->title_short }}</td>
                  <td>
                    {{ $incident->support_id ?: 'Sin asignar' }}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

    </div>
</div>

@endsection
