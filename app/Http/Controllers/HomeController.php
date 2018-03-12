<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Incident;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function selectProject($id)
    {
      //validar que el usuario este asiciado
      $user = auth()->user();
      $user->selected_project_id = $id;
      $user->save();

      return back();

    }

    public function getReport()
    {
      $categories = Category::where('project_id', 1)->get();
      return view('report')->with(compact('categories'));
    }

    public function postReport(Request $request)
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
