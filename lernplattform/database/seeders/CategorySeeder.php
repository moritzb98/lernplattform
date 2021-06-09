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
                'icon' => 'keins vorhanden'
            ],
            [
                'name' => 'Chemie',
                'color' => '#008FCC',
                'icon' => 'science'
            ],
            [
                'name' => 'Deutsch',
                'color' => '#BF7A67',
                'icon' => 'keins vorhanden'
            ],
            [
                'name' => 'Englisch',
                'color' => '#FFCE5C',
                'icon' => 'keins vorhanden'
            ],
            [
                'name' => 'Erdkunde',
                'color' => '#2593A6',
                'icon' => 'keins vorhanden'
            ],
            [
                'name' => 'Französisch',
                'color' => '#464FBC',
                'icon' => 'keins vorhanden'
            ],
            [
                'name' => 'Geschichte',
                'color' => '#E67448',
                'icon' => 'keins vorhanden'
            ],
            [
                'name' => 'Gesundheit',
                'color' => '#6FB7FF',
                'icon' => 'keins vorhanden'
            ],
            [
                'name' => 'Informatik',
                'color' => '#3D5282',
                'icon' => 'keins vorhanden'
            ],
            [
                'name' => 'Kunst',
                'color' => '#A0513D',
                'icon' => 'keins vorhanden'
            ],
            [
                'name' => 'Latein',
                'color' => '#F08080',
                'icon' => 'keins vorhanden'
            ],
            [
                'name' => 'Mathematik',
                'color' => '#E05858',
                'icon' => 'keins vorhanden'
            ],
            [
                'name' => 'Medien und Kommunikation',
                'color' => '#8DA887',
                'icon' => 'keins vorhanden'
            ],
            [
                'name' => 'Medizin',
                'color' => '#E8DCCA',
                'icon' => 'keins vorhanden'
            ],
            [
                'name' => 'Musik',
                'color' => '#BD45B4',
                'icon' => 'keins vorhanden'
            ],
            [
                'name' => 'Pyhsik',
                'color' => '#B0DAF5',
                'icon' => 'keins vorhanden'
            ],
            [
                'name' => 'Sport',
                'color' => '#505050',
                'icon' => 'keins vorhanden'
            ],
            [
                'name' => 'Unternehmertum',
                'color' => '#0D6277',
                'icon' => 'keins vorhanden'
            ],
            [
                'name' => 'Weitere Sprachen',
                'color' => '#F5930E',
                'icon' => 'keins vorhanden'
            ],
            [
                'name' => 'Wirtschaft',
                'color' => '#61A397',
                'icon' => 'keins vorhanden'
            ],
            [
                'name' => 'Ernährung',
                'color' => '#48BA00',
                'icon' => 'keins vorhanden'
            ],
            [
                'name' => 'Gestaltung',
                'color' => '#374B54',
                'icon' => 'keins vorhanden'
            ],
            [
                'name' => 'Sonstiges',
                'color' => '#8E86BC',
                'icon' => 'keins vorhanden'
            ],
        ];

        foreach($categories as $categorie){
            DB::table('categories')->insert( [
                'name' => $categorie['name'],
                'color' => $categorie['color'],
                'icon' => $categorie['icon']
            ]);
        }

        echo 'Kategorien erstellt';
        echo "\n\n";

    }
}
