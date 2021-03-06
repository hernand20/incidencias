<?php

use Illuminate\Database\Seeder;
use App\Incident;

class IncidentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Incident::create([
        'title' => 'Primera Incidencias',
        'description' => 'Lo que ocurre es que se encuentra un error en el codigo Linea 43',
        'severity' => 'N',

        'category_id' => 2,
        'project_id' =>  1,
        'level_id' => 1,

        'client_id' => 3,
        'support_id' => 4
      ]);
    }
}
