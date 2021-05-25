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
                'color' => '#479D59',
            ],
            [
                'name' => 'Chemie',
                'color' => '#008FCC',
            ],
            [
                'name' => 'Deutsch',
                'color' => '#BF7A67',
            ],
            [
                'name' => 'Englisch',
                'color' => '#FFCE5C',
            ],
            [
                'name' => 'Erdkunde',
                'color' => '#2593A6',
            ],
            [
                'name' => 'Französisch',
                'color' => '#464FBC',
            ],
            [
                'name' => 'Geschichte',
                'color' => '#E67448',
            ],
            [
                'name' => 'Gesundheit',
                'color' => '#6FB7FF',
            ],
            [
                'name' => 'Informatik',
                'color' => '#3D5282',
            ],
            [
                'name' => 'Kunst',
                'color' => '#A0513D',
            ],
            [
                'name' => 'Latein',
                'color' => '#F08080',
            ],
            [
                'name' => 'Mathematik',
                'color' => '#E05858',
            ],
            [
                'name' => 'Medien und Kommunikation',
                'color' => '#8DA887',
            ],
            [
                'name' => 'Medizin',
                'color' => '#E8DCCA',
            ],
            [
                'name' => 'Musik',
                'color' => '#BD45B4',
            ],
            [
                'name' => 'Pyhsik',
                'color' => '#B0DAF5',
            ],
            [
                'name' => 'Sport',
                'color' => '#505050',
            ],
            [
                'name' => 'Unternehmertum',
                'color' => '#0D6277',
            ],
            [
                'name' => 'Weitere Sprachen',
                'color' => '#F5930E',
            ],
            [
                'name' => 'Wirtschaft',
                'color' => '#61A397',
            ],
            [
                'name' => 'Ernährung',
                'color' => '#48BA00',
            ],
            [
                'name' => 'Gestaltung',
                'color' => '#374B54',
            ],
            [
                'name' => 'Sonstiges',
                'color' => '#8E86BC',
            ],
        ];

        foreach($categories as $categorie){
            DB::table('categories')->insert( [
                'name' => $categorie['name'],
                'color' => $categorie['color']
            ]);
        }

        echo 'Kategorien erstellt';
        echo "\n\n";

    }
}
