<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $badges = [
            [
                'name' => 'Amateur',
                'challenge' => 'Bestehe 5 Quiz.',
                'icon' => '',
                'text' => 'Jeder Start ist hart.',
                'goal' => 5
            ],
            [
                'name' => 'Beginner',
                'challenge' => 'Bestehe 15 Quiz.',
                'icon' => '',
                'text' => 'Langsam gehts voran.',
                'goal' => 15
            ],
            [
                'name' => 'Fortgeschritten',
                'challenge' => 'Bestehe 25 Quiz.',
                'icon' => '',
                'text' => 'Sehr gut, das lässt sich schon sehen.',
                'goal' => 25
            ],
            [
                'name' => 'Kenner',
                'challenge' => 'Bestehe 50 Quiz.',
                'icon' => '',
                'text' => 'Wow, du bist schon richtig gut.',
                'goal' => 50
            ],
            [
                'name' => 'Experte',
                'challenge' => 'Bestehe 85 Quiz.',
                'icon' => '',
                'text' => 'Du hast es geschafft und bist ein wahrer Experte.',
                'goal' => 85
            ],
        ];

        foreach($badges as $badge){
            DB::table('badges')->insert( [
                'name' => $badge['name'],
                'challenge' => $badge['challenge'],
                'icon' => $badge['icon'],
                'text' => $badge['text'],
                'goal' => $badge['goal']
            ]);

        }

        echo 'Badges erstellt';
        echo "\n\n";
    }
}

