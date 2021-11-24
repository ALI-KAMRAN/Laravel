<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class adminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

// if multiple admins then run this code

        $admins = [

    [
      'name' => 'Admis User',
      'email' => 'admin@gmail.com',
      'password' => bcrypt('12345678'),
    ],

    [
         
         'name' => 'Super User',
      'email' => 'super@gmail.com',
      'password' => bcrypt('12345678'),

],
];

        foreach ($admins as $admin){
            $adminUser = User::create($admin);
            $adminUser->roles()->attach(1);
        }


// single admin purpose use this code

      //   $users = User::create([
      //      'name' => 'Ali kamran',
      //      'email' => 'alikamrankamboh@gmail.com',
      //      'password' => bcrypt('12345678'),
      // ]);
      //   $users->roles()->attach(1);
    }
}
