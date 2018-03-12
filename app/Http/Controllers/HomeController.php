<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Incident;
use App\ProjectUser;

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
    // Obtener las incidencias con agente de soporte asignado
    $user = auth()->user();
    $selected_project_id = $user->select_project_id;

    $my_incidents = Incident::where('project_id', $user->selected_project_id)
                    ->where('support_id',$user->id)->get();

    $projectUser = ProjectUser::where('project_id', $selected_project_id)
                                ->where('user_id',$user->id)->first();

      // Obtener las incidencias sin agente de soporte asignado
    $pending_incidents = Incident::where('support_id', null)
                         ->where('level_id', $projectUser->level_id)->get();
   print_r($pending_incidents);
   dd($pending_incidents);

      return view('home')->with(compact('my_incidents', 'pending_incidents'));
  }

  public function selectProject($id)
  {
    //validar que el usuario este asiciado
    $user = auth()->user();
    $user->select_project_id = $id;
    $user->save();
    return back();
  }

}
