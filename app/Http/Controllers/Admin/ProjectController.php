<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Project;
use App\Category;


class ProjectController extends Controller
{
  public function index()
  {
    $projects = Project::withTrashed()->get();
    return view('admin.projects.index')->with(compact('projects'));

  }
  public function store(Request $request)
  {
    $this->validate($request, Project::$rules, Project::$messages);
    Project::create($request->all());

    return back()->with('notification', ' El proyecto se ha registrado correctamente.');
  }
  public function edit($id)
  {
    $project = Project::find($id);
    $categories= $project->categories;
    $levels = $project->levels;//Level::where('project_id', $id)->get();

    return view('admin.projects.edit')->with(compact('project', 'categories', 'levels'));
  }
  public function update($id, Request $request)
  {
    $this->validate($request, Project::$rules, Project::$messages);
    //$project = Project::find($id);
    //$project->name = $request->input('name');
    //$project->description = $request->input('description');
    //$project->start = $request->input('start');
    //$project->save();
    Project::find($id)->update($request->all());
    return back()->with('notification', ' El proyecto se ha actualizado correctamente.');
  }
  public function delete($id)
  {
    Project::find($id)->delete();
    return back()->with('notification', 'El proyecto se ha deshabilitado correctamente.');
  }
  public function restore($id)
  {
    Project::withTrashed()->find($id)->restore();
    return back()->with('notification', 'El proyecto se ha Habilitado correctamente.');
  }

}
