<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        	'user_id' => NULL,
        	'name' => 'Compañía'
        ]);

        DB::table('categories')->insert([
        	'user_id' => NULL,
        	'name' => 'Mascotas'
        ]);

        DB::table('categories')->insert([
        	'user_id' => NULL,
        	'name' => 'Doméstica'
        ]);

        DB::table('categories')->insert([
        	'user_id' => NULL,
        	'name' => 'Lúdico'
        ]);
    }
}
