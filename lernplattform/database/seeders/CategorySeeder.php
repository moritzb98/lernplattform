<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Mathe', 'Deutsch'];

        foreach($categories as $categorie){
            DB::table('categories')->insert( [
                'name' => $categorie
            ]);
        }

    }
}
