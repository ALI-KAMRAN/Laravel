<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\role;
class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Admin','Basic-User'];
        foreach($roles as $role){
            role::create([
                'name' => $role,
            ]);
        }
    }
}
