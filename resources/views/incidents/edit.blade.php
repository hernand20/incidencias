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

    <form action="" method="POST">
      <!--Token para validar-->
      {{ csrf_field() }}


      <div class="form-group">
        <label for="category_id">Categoria</label>
        <select name="category_id" class="form-control">
          <option value="">General</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}" @if($incident->category_id == $category->id) selected @endif>{{$category->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="severity">Severidad</label>
        <select name="severity"  class="form-control">
          <option value="M" @if($incident->severity=='M') selected @endif>Menor</option>
          <option value="N" @if($incident->severity=='N') selected @endif>Normal</option>
          <option value="A" @if($incident->severity=='A') selected @endif>Alto</option>
        </select>
      </div>
      <div class="form-group">
        <label for="title">Titulo</label>
        <input type="text" name="title" value="{{ old('title', $incident->title) }}" class="form-control">
      </div>
      <div class="form-group">
        <label for="description">Descripcion</label>
        <textarea name="description" class="form-control" rows="8" cols="80">{{ old('description', $incident->description ) }}</textarea>
      </div>
      <div class="form-group">
        <button type="submit" value="button" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </form>
  </div>
</div>

@endsection
