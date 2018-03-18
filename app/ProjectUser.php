  <?php

  namespace App;

  use Illuminate\Database\Eloquent\Model;

  class ProjectUser extends Model
  {
    protected $table = 'project_user';

    //Relationsships
    public function users()
    {
      return $this->belongsToMany('App\Users');
    }

    //Accessors
    public function project()
    {
      return $this->belongsTo('App\Project');
    }

    public function level()
    {
      return $this->belongsTo('App\Level');
    }
  }
