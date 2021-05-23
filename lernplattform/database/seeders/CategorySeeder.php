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
        $categories = [
            [
                'name' => 'Biologie',
                'color' => '00bb2d',
            ],
            [
                'name' => 'Chemie',
                'color' => '00bb2d',
            ],
            [
                'name' => 'Deutsch',
                'color' => '00bb2d',
            ],
            [
                'name' => 'Englisch',
                'color' => '00bb2d',
            ],
            [
                'name' => 'Erdkunde',
                'color' => '00bb2d',
            ],
            [
                'name' => 'Französisch',
                'color' => '00bb2d',
            ],
            [
                'name' => 'Geschichte',
                'color' => '00bb2d',
            ],
            [
                'name' => 'Gesundheit',
                'color' => '00bb2d',
            ],
            [
                'name' => 'Informatik',
                'color' => '00bb2d',
            ],
            [
                'name' => 'Kunst',
                'color' => '00bb2d',
            ],
            [
                'name' => 'Latein',
                'color' => '00bb2d',
            ],
            [
                'name' => 'Mathematik',
                'color' => '00bb2d',
            ],
            [
                'name' => 'Medien und Kommunikation',
                'color' => '00bb2d',
            ],
            [
                'name' => 'Medizin',
                'color' => '00bb2d',
            ],
            [
                'name' => 'Musik',
                'color' => '00bb2d',
            ],
            [
                'name' => 'Pyhsik',
                'color' => '00bb2d',
            ],
            [
                'name' => 'Sport',
                'color' => '00bb2d',
            ],
            [
                'name' => 'Unternehmertum',
                'color' => '00bb2d',
            ],
            [
                'name' => 'Weitere Sprachen',
                'color' => '00bb2d',
            ],
            [
                'name' => 'Wirtschaft',
                'color' => '00bb2d',
            ],
            [
                'name' => 'Ernährung',
                'color' => '00bb2d',
            ],
            [
                'name' => 'Gestaltung',
                'color' => '00bb2d',
            ],
            [
                'name' => 'Sonstiges',
                'color' => '00bb2d',
            ],
        ];

        foreach($categories as $categorie){
            DB::table('categories')->insert( [
                'name' => $categorie['name'],
                'color' => $categorie['color']
            ]);
        }

    }
}
