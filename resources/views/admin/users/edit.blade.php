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
        <label for="email">E-mail</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" readonly>
      </div>
      <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">

      </div>
      <div class="form-group">
        <label for="password">Contraseña <em>Ingresar solo si se desea modificar</em></label>
        <input type="text" name="password" class="form-control" {{ old('password') }}>
      </div>
      <div class="form-group">
        <button type="submit" value="button" class="btn btn-primary">Actualizar</button>
      </div>
    </form>

    <form action="/proyecto-usuario"  method="post">
       {{ csrf_field() }}
      <input type="hidden" name="user_id" value="{{ $user->id }}">
      <div class="row">
        <div class="col-md-4">
          <select name="project_id" class="form-control"  id="select-project">
            <option value="">Seleccione Proyecto</option>
            @foreach ($projects as $project)
              <option value="{{ $project->id }}">{{ $project->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-4">
          <select name="level_id" class="form-control"  id="select-level">
            <option value="">Seleccione nivel</option>
          </select>
        </div>
        <div class="col-md-4">
          <button class="btn btn-primary btn-block" >Asignar proyecto</button>
        </div>
      </div>
    </form>

    <table class="table title-bordered">
      <thead>
        <tr>
          <th>Proyecto</th>
          <th>Nivel</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($projects_user as $project_user)
        <tr>
          <td>{{ $project_user->project->name}}</td>
          <td>{{ $project_user->level->name }}</td>
          <td>
            <a href="/proyecto-usuario/{{ $project_user->id }}/eliminar" class="btn btn-sm btn-danger " title="Dar de baja">
              <span class="glyphicon glyphicon-remove"></span></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection

@section('scripts')

<script src="/js/admin/users/edit.js">

</script>
@endsection
