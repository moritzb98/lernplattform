<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Quizzes
        DB::table('quiz')->insert( [
            'category_id' => 2,
            'name' => 'Testquiz'
        ]);

        DB::table('quiz')->insert( [
            'category_id' => 2,
            'name' => 'Test2'
        ]);

        DB::table('quiz')->insert( [
            'category_id' => 1,
            'name' => 'Test3'
        ]);

        // Create Questions
        $questions = ['Was ergibt 5+5?', 'Was ist 5*2?', 'Was ist 8-5?'];

        foreach($questions as $question){
            DB::table('questions')->insert( [
                'quiz_id' => 1,
                'question' => $question
            ]);
        }

        // Create Answers
        $answers = [
            [
                'question_id' => 1,
                'answer' => 'Es ist 9',
                'is_correct' => false
            ],
            [
                'question_id' => 1,
                'answer' => 'Es ist 7',
                'is_correct' => false
            ],
            [
                'question_id' => 1,
                'answer' => 'Es ist 10',
                'is_correct' => true
            ],
            [
                'question_id' => 1,
                'answer' => 'Ich glaube 55',
                'is_correct' => false
            ],
            [
                'question_id' => 2,
                'answer' => 'Drölf',
                'is_correct' => false
            ],
            [
                'question_id' => 2,
                'answer' => 'Auf jeden Fall 5',
                'is_correct' => false
            ],
            [
                'question_id' => 2,
                'answer' => 'Eventuell doch wieder 10',
                'is_correct' => true
            ],
            [
                'question_id' => 2,
                'answer' => 'Zrölf',
                'is_correct' => false
            ],
            [
                'question_id' => 3,
                'answer' => 'Safe 2',
                'is_correct' => false
            ],
            [
                'question_id' => 3,
                'answer' => 'Safe -7',
                'is_correct' => false
            ],
            [
                'question_id' => 3,
                'answer' => 'Oder doch 3?',
                'is_correct' => true
            ],
            [
                'question_id' => 3,
                'answer' => 'Nein stopp, es sind 4',
                'is_correct' => false
            ],
        ];

        foreach($answers as $answer){
            DB::table('answers')->insert([
                'question_id' => $answer['question_id'],
                'answer' => $answer['answer'],
                'is_correct' => $answer['is_correct']
            ]);
        }


        echo 'Quiz erstellt';
	    echo "\n\n";
	    echo "---------------------";
	    echo "\n";

	    for ($i=0; $i < 15; $i++) {
	    	echo 'A';
	    	usleep(100000);
	    }
	    echo 'BFAHRT';
	    echo "\n\n";

    }
}
