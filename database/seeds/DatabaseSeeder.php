<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTabSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(LevelsTableSeeder::class);
    }
}
