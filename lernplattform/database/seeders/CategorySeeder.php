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
                'icon' => 'biotech'
            ],
            [
                'name' => 'Chemie',
                'color' => '#008FCC',
                'icon' => 'science'
            ],
            [
                'name' => 'Deutsch',
                'color' => '#BF7A67',
                'icon' => 'local_library'
            ],
            [
                'name' => 'Englisch',
                'color' => '#FFCE5C',
                'icon' => 'language'
            ],
            [
                'name' => 'Erdkunde',
                'color' => '#2593A6',
                'icon' => 'public'
            ],
            [
                'name' => 'Französisch',
                'color' => '#464FBC',
                'icon' => 'language'
            ],
            [
                'name' => 'Geschichte',
                'color' => '#E67448',
                'icon' => 'history_edu'
            ],
            [
                'name' => 'Gesundheit',
                'color' => '#6FB7FF',
                'icon' => 'health_and_safety'
            ],
            [
                'name' => 'Informatik',
                'color' => '#3D5282',
                'icon' => 'integration_instructions'
            ],
            [
                'name' => 'Kunst',
                'color' => '#A0513D',
                'icon' => 'brush'
            ],
            [
                'name' => 'Latein',
                'color' => '#F08080',
                'icon' => 'language'
            ],
            [
                'name' => 'Mathematik',
                'color' => '#E05858',
                'icon' => 'calculate'
            ],
            [
                'name' => 'Medien und Kommunikation',
                'color' => '#8DA887',
                'icon' => 'web'
            ],
            [
                'name' => 'Medizin',
                'color' => '#E8DCCA',
                'icon' => 'medical_services'
            ],
            [
                'name' => 'Musik',
                'color' => '#BD45B4',
                'icon' => 'music_note'
            ],
            [
                'name' => 'Physik',
                'color' => '#B0DAF5',
                'icon' => 'flash_on'
            ],
            [
                'name' => 'Sport',
                'color' => '#505050',
                'icon' => 'directions_run'
            ],
            [
                'name' => 'Unternehmertum',
                'color' => '#0D6277',
                'icon' => 'apartment'
            ],
            [
                'name' => 'Weitere Sprachen',
                'color' => '#F5930E',
                'icon' => 'translate'
            ],
            [
                'name' => 'Wirtschaft',
                'color' => '#61A397',
                'icon' => 'trending_up'
            ],
            [
                'name' => 'Ernährung',
                'color' => '#48BA00',
                'icon' => 'restaurant'
            ],
            [
                'name' => 'Gestaltung',
                'color' => '#374B54',
                'icon' => 'design_services'
            ],
            [
                'name' => 'Sonstiges',
                'color' => '#8E86BC',
                'icon' => 'all_inclusive'
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
