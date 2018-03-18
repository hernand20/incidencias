<?php

namespace App\Http\Controllers;
use App\Category;
use App\Incident;
use App\Project;

use Illuminate\Http\Request;

class IncidentController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function show($id)
  {
    $incident = Incident::findOrfail($id);
    return view('incidents.show')->with(compact('incident'));
  }


  public function create()
  {

    $categories = Category::where('project_id', 1 )->get();
    return view('incidents.create')->with(compact('categories'));
  }

  public function store(Request $request)
  {
    $rules = [
      'category_id' =>'sometimes|exists:categories,id',
      'severity' => 'required|in:M,N,A',
      'title' => 'required|min:5',
      'description' => 'required|min:15',
    ];
    $this->validate($request, $rules);

    $incident = new Incident();
    $incident->category_id = $request->input('category_id') ?:null;
    $incident->severity = $request->input('severity');
    $incident->title = $request->input('title');
    $incident->description = $request->input('description');

    $user = auth()->user();

    $incident->client_id = $user->id;
    $incident->project_id = $user->selected_project_id;
    $incident->level_id = Project::find($user->selected_project_id)->first_level_id;
    //$incident->level_id =Project::find($user->selected_project_id);
    $incident->save();

    return back();
  }
}
