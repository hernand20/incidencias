<?php

namespace App\Http\Controllers;
use App\Category;
use App\Incident;

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

  public function create()
  {
    $categories = Category::where('project_id',null)->get();
    return view('report')->with(compact('categories'));
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
    $incident->client_id = auth()->user()->id;
    $incident->save();

    return back();
  }
}
