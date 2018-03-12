<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Admin
        User::create([
          'name' => 'Felipe',
          'email' => 'cruz9620@gmail.com',
          'password' => bcrypt('123456'),
          'role' => 0
        ]);
        User::create([
          'name' => 'Miguel',
          'email' => 'miguel@gmail.com',
          'password' => bcrypt('123456'),
          'role' => 0
        ]);

        //Support
          User::create([
            'name' => 'Lupita',
            'email' => 'support@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 1
          ]);

          //Client
          User::create([
            'name' => 'Angel',
            'email' => 'client@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 2
          ]);


    }
}
