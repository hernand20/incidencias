<?php

use Illuminate\Database\Seeder;
use App\User;

class SupportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Support
      User::create([ //4
        'name' => 'Support S1',
        'email' => 'support1@gmail.com',
        'password' => bcrypt('123456'),
        'role' => 1
      ]);
      //Support
      User::create([//5
        'name' => 'Support S2',
        'email' => 'support2@gmail.com',
        'password' => bcrypt('123456'),
        'role' => 1
      ]);
    }
}
