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
        <input type="text" name="name" class="form-control" value="{{ old('name', $project->name) }}">
      </div>
      <div class="form-group">
        <label for="description">Descripcion</label>
        <input type="text" name="description" class="form-control" value="{{ old('description', $project->description) }}">
      </div>
      <div class="form-group">
        <label for="start">Fecha inicio</label>
        <input type="date" name="start" class="form-control">
      </div>
      <div class="form-group">
        <button type="submit" value="button" class="btn btn-primary">Actualizar Proyecto</button>
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

      </tbody>
    </table>
  </div>
  <div class="row">
    <div class="col-md-6">
      <p>Categorias</p>
      <form class="form-inline" action="/categorias" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="project_id" value="{{ $project->id }}">
        <div class="form-group">
          <input type="text" placeholder="Ingrese nombre" class="form-control" name="name" value="">
        </div>
        <div class="form-group">
          <button class="btn btn-primary" >Añadir</button>
        </div>
      </form>
      <table class="table table.bordered">
        <thead>
          <tr>
            <th>Categorias</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
          <tr>
            <td>{{ $category->name }}</td>
            <td>
              <button type="button"  class="btn btn-sm btn-primary" data-category="{{$category->id}}" title="Editar">
                <span class="glyphicon glyphicon-pencil"></span>
              </button>
              <a href="/categoria/{{ $category->id }}/eliminar" type="button"  class="btn btn-sm btn-danger" title="Dar de baja">
                <span class="glyphicon glyphicon-remove"></span>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-md-6">
      <p>Niveles</p>
      <form class="form-inline" action="/niveles" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="project_id" value="{{ $project->id }}">
        <div class="form-group">
          <input type="text" placeholder="Ingrese nombre" class="form-control" name="name" value="">
        </div>
        <div class="form-group">
          <button class="btn btn-primary" >Añadir</button>
        </div>
      </form>
      <table class="table table.bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Nivel</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($levels as $key => $level)
          <tr>
            <td> N{{ $key+1 }}</td>
            <td>{{ $level->name }}</td>
            <td>
              <button type="button" class="btn btn-sm btn-primary" data-level="{{$level->id}}"  title="Editar">
                <span class="glyphicon glyphicon-pencil"></span>
              </button>
              <a href="/nivel/{{ $level->id }}/eliminar" class="btn btn-sm btn-danger" title="Dar de baja">
                <span class="glyphicon glyphicon-remove"></span>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalEditarCategory">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Editar Categoria.</h4>
      </div>
        <form action="/categorias/editar" method="post">
          {{ csrf_field() }}
          <div class="modal-body">
            <input type="hidden" name="category_id" id="category_id" value="">
            <div class="form-group">
              <label for="name">Nombre de la categoria.</label>
              <input type="text" class="form-control" name="name" id="category_name" value="">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modalEditarLevel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Editar Nivel.</h4>
      </div>
        <form action="/niveles/editar" method="post">
          {{ csrf_field() }}
          <div class="modal-body">
            <input type="hidden" name="level_id" id="level_id" value="">
            <div class="form-group">
              <label for="name">Nombre de la nivel.</label>
              <input type="text" class="form-control" name="name" id="level_name" value="">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection

@section('scripts')
  <script src="/js/projects/admin/edit.js">

  </script>
@endsection('scripts')
