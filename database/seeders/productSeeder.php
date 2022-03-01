<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name'=> 'sumsung',
            'color'=> 'yellow',
            'description'=> 'this phone is very much clear and sound',
            'price' => '1999' 
     
     
             ]);
    }
}
