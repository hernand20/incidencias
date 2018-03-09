<?php

use Illuminate\Database\Seeder;
use App\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Project::create([
        'name' => 'Proyecto A',
        'description' => 'El proyecto A consiste en dar seguimientos a las incidencias con Huespedes.',
      ]);

      Project::create([
        'name' => 'Proyecto B',
        'description' => 'El proyecto B consiste en dar seguimientos a las incidencias de colaboradores',
      ]);
    }
}
