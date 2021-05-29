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
            'category_id' => 1,
            'name' => 'Biologie Quiz'
        ]);

        DB::table('quiz')->insert( [
            'category_id' => 15,
            'name' => 'Musik Quiz'
        ]);


        // Create Questions
        $questionsTestquiz = ['Was ergibt 5+5?', 'Was ist 5*2?', 'Was ist 8-5?'];

        foreach($questionsTestquiz as $key => $question){
            DB::table('questions')->insert( [
                'quiz_id' => 1,
                'question' => $question,
                'questionNumber' => $key + 1
            ]);
        }

        $questionsBioQuiz = ['Wo liegt der pH-Wert von Wasser', 'Was ist keine Nukleinbase?', 'Welches ist kein Bestandteil einer tierischen Zelle?', 'Wozu dient ein Chromosom?', 'Was ist das spezielle am Chromosomensatz bei Menschen mit Down-Syndrom?', 'Was versteht man unter dem Begriff “Phänotyp”?', 'Welches Zellkompartiment ist für die Photosynthese verantwortlich?', 'Was beschreibt den Vorgang “Mitose”?', 'Welche ist keine Phase der “Mitose”?', 'Eine Biozönose ist..'];

        foreach($questionsBioQuiz as $key => $question){
            DB::table('questions')->insert( [
                'quiz_id' => 2,
                'question' => $question,
                'questionNumber' => $key + 1
            ]);
        }

        $questionsMusikQuiz = ['Welches dieser Instrument ist ein Blasinstrument?', 'Wer trug den Beinamen “Walzerkönig”?', 'Wer von den Beatles spielte die Bassgitarre?', 'Weiter mit den Beatles: Wie hieß ihr letztes Album?', 'Wie nennt man das Textbuch für eine Oper, eine Operette oder ein Ballett?', '1969 ging Woodstock mit seinem Rockfestival in die Geschichte ein. Wer war nicht dabei?', 'Wie heißt das traditionelle Blasinstrument der Aborigines?', 'Wer war der Komponist der “Dreigroschenoper”?', 'Wer ist der Vater der Melodie der deutschen Nationalhymne?', 'Welcher Begriff hat nichts mit Musik zu tun?', 'Wer designte Madonnas spitzbrüstoges Korsett?'];

        foreach($questionsMusikQuiz as $key => $question){
            DB::table('questions')->insert( [
                'quiz_id' => 3,
                'question' => $question,
                'questionNumber' => $key + 1
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

        $answersBioQuiz = [
            [
                'question_id' => 4,
                'answer' => '3',
                'is_correct' => false
            ],
            [
                'question_id' => 4,
                'answer' => '5',
                'is_correct' => false
            ],
            [
                'question_id' => 4,
                'answer' => '12',
                'is_correct' => false
            ],
            [
                'question_id' => 4,
                'answer' => '7',
                'is_correct' => true
            ],
            [
                'question_id' => 5,
                'answer' => 'Adenin',
                'is_correct' => false
            ],
            [
                'question_id' => 5,
                'answer' => 'Guanin',
                'is_correct' => false
            ],
            [
                'question_id' => 5,
                'answer' => 'Cytosin',
                'is_correct' => false
            ],
            [
                'question_id' => 5,
                'answer' => 'Thymian',
                'is_correct' => true
            ],
            [
                'question_id' => 6,
                'answer' => 'Mitochondrien',
                'is_correct' => false
            ],
            [
                'question_id' => 6,
                'answer' => 'Chloroplasten',
                'is_correct' => true
            ],
            [
                'question_id' => 6,
                'answer' => 'Lysosomen',
                'is_correct' => false
            ],
            [
                'question_id' => 6,
                'answer' => 'Endoplasmatisches Reticulum',
                'is_correct' => false
            ],
            [
                'question_id' => 7,
                'answer' => 'Zur Stärkung der Haarwurzel',
                'is_correct' => false
            ],
            [
                'question_id' => 7,
                'answer' => 'Zur Speicherung von Erbinformationen',
                'is_correct' => true
            ],
            [
                'question_id' => 7,
                'answer' => ' Als Verbindungsglied zwischen Hirnstamm und Kleinhirn',
                'is_correct' => false
            ],
            [
                'question_id' => 7,
                'answer' => 'Zur Ermöglichung der Fingerbeweglichkeit',
                'is_correct' => false
            ],
            [
                'question_id' => 8,
                'answer' => 'Das X und Y Chromosom ist vertauscht',
                'is_correct' => false
            ],
            [
                'question_id' => 8,
                'answer' => 'Es fehlt das Chromosom 20',
                'is_correct' => false
            ],
            [
                'question_id' => 8,
                'answer' => 'Es fehlen mehrere Chromosomen',
                'is_correct' => false
            ],
            [
                'question_id' => 8,
                'answer' => 'Das Chromosom 21 ist dreifach vorhanden',
                'is_correct' => true
            ],
            [
                'question_id' => 9,
                'answer' => 'Genetische Ausstattung',
                'is_correct' => false
            ],
            [
                'question_id' => 9,
                'answer' => 'Erbkrankheit',
                'is_correct' => false
            ],
            [
                'question_id' => 9,
                'answer' => 'Erscheinungsbild',
                'is_correct' => true
            ],
            [
                'question_id' => 9,
                'answer' => 'Erhöhte Intelligenz',
                'is_correct' => false
            ],
            [
                'question_id' => 10,
                'answer' => 'Nukleus',
                'is_correct' => false
            ],
            [
                'question_id' => 10,
                'answer' => 'Vakuole',
                'is_correct' => false
            ],
            [
                'question_id' => 10,
                'answer' => 'Zellwand',
                'is_correct' => false
            ],
            [
                'question_id' => 10,
                'answer' => 'Chloroplast',
                'is_correct' => true
            ],
            [
                'question_id' => 11,
                'answer' => 'Die Zellteilung in Körperzellen',
                'is_correct' => true
            ],
            [
                'question_id' => 11,
                'answer' => 'Die Zellteilung in Geschlechtszellen',
                'is_correct' => false
            ],
            [
                'question_id' => 11,
                'answer' => 'Die Bildung von Gallensteinen',
                'is_correct' => false
            ],
            [
                'question_id' => 11,
                'answer' => 'Die Festigung von Haarwurzeln',
                'is_correct' => false
            ],
            [
                'question_id' => 12,
                'answer' => 'Prophase',
                'is_correct' => false
            ],
            [
                'question_id' => 12,
                'answer' => 'Postphase',
                'is_correct' => true
            ],
            [
                'question_id' => 12,
                'answer' => 'Telophase',
                'is_correct' => false
            ],
            [
                'question_id' => 12,
                'answer' => 'Anaphase',
                'is_correct' => false
            ],
            [
                'question_id' => 13,
                'answer' => '...ein abgegrenzter Lebensraum',
                'is_correct' => false
            ],
            [
                'question_id' => 13,
                'answer' => '...eine Lebensart, die nur Pflanzen isst',
                'is_correct' => false
            ],
            [
                'question_id' => 13,
                'answer' => '...eine Lebensart, die nur im Sumpf lebt',
                'is_correct' => false
            ],
            [
                'question_id' => 13,
                'answer' => '...eine Gemeinschaft von Organismen verschiedener Arten in einem abgegrenzten Lebensraum',
                'is_correct' => true
            ],
        ];

        foreach($answersBioQuiz as $answer){
            DB::table('answers')->insert([
                'question_id' => $answer['question_id'],
                'answer' => $answer['answer'],
                'is_correct' => $answer['is_correct']
            ]);
        }

        $answersMusikQuiz = [
            [
                'question_id' => 14,
                'answer' => 'Okarina',
                'is_correct' => true
            ],
            [
                'question_id' => 14,
                'answer' => 'Ukele',
                'is_correct' => false
            ],
            [
                'question_id' => 14,
                'answer' => 'Balalaika',
                'is_correct' => false
            ],
            [
                'question_id' => 14,
                'answer' => 'Bandoneon',
                'is_correct' => false
            ],
            [
                'question_id' => 15,
                'answer' => 'Johann Strauß',
                'is_correct' => true
            ],
            [
                'question_id' => 15,
                'answer' => 'Johann Sebastian Bach',
                'is_correct' => false
            ],
            [
                'question_id' => 15,
                'answer' => 'Ludwig van Beethoven',
                'is_correct' => false
            ],
            [
                'question_id' => 15,
                'answer' => 'Wolfgang Amadeus Mozart',
                'is_correct' => false
            ],
            [
                'question_id' => 16,
                'answer' => 'Ringo Starr',
                'is_correct' => false
            ],
            [
                'question_id' => 16,
                'answer' => 'George Harrison',
                'is_correct' => false
            ],
            [
                'question_id' => 16,
                'answer' => 'Paul McCartney',
                'is_correct' => true
            ],
            [
                'question_id' => 16,
                'answer' => 'John Lennon',
                'is_correct' => false
            ],
            [
                'question_id' => 17,
                'answer' => 'Let it Be',
                'is_correct' => true
            ],
            [
                'question_id' => 17,
                'answer' => 'Abbey Road',
                'is_correct' => false
            ],
            [
                'question_id' => 17,
                'answer' => 'The BEATLES',
                'is_correct' => false
            ],
            [
                'question_id' => 17,
                'answer' => 'Yellow Submarine',
                'is_correct' => false
            ],
            [
                'question_id' => 18,
                'answer' => 'Menü',
                'is_correct' => false
            ],
            [
                'question_id' => 18,
                'answer' => 'Partitur',
                'is_correct' => false
            ],
            [
                'question_id' => 18,
                'answer' => 'Broschüre',
                'is_correct' => false
            ],
            [
                'question_id' => 18,
                'answer' => 'Libretto',
                'is_correct' => true
            ],
            [
                'question_id' => 19,
                'answer' => 'Joe Cocker',
                'is_correct' => false
            ],
            [
                'question_id' => 19,
                'answer' => 'Eric Clapton',
                'is_correct' => true
            ],
            [
                'question_id' => 19,
                'answer' => 'Santana',
                'is_correct' => false
            ],
            [
                'question_id' => 19,
                'answer' => 'Jimi Hendrix',
                'is_correct' => false
            ],
            [
                'question_id' => 20,
                'answer' => 'Kantele',
                'is_correct' => false
            ],
            [
                'question_id' => 20,
                'answer' => 'Xeremia',
                'is_correct' => false
            ],
            [
                'question_id' => 20,
                'answer' => 'Didgeridoo',
                'is_correct' => true
            ],
            [
                'question_id' => 20,
                'answer' => 'Arghul',
                'is_correct' => false
            ],
            [
                'question_id' => 21,
                'answer' => 'Erich Kästner',
                'is_correct' => false
            ],
            [
                'question_id' => 21,
                'answer' => 'Kurt Thomas',
                'is_correct' => false
            ],
            [
                'question_id' => 21,
                'answer' => 'Berthold Brecht',
                'is_correct' => false
            ],
            [
                'question_id' => 21,
                'answer' => 'Kurt Weil',
                'is_correct' => true
            ],
            [
                'question_id' => 22,
                'answer' => 'Joseph Haydn',
                'is_correct' => true
            ],
            [
                'question_id' => 22,
                'answer' => 'Franz Liszt',
                'is_correct' => false
            ],
            [
                'question_id' => 22,
                'answer' => 'Johannes Brahms',
                'is_correct' => false
            ],
            [
                'question_id' => 22,
                'answer' => 'Franz Schubert',
                'is_correct' => false
            ],
            [
                'question_id' => 23,
                'answer' => 'Violinschlüssel',
                'is_correct' => false
            ],
            [
                'question_id' => 23,
                'answer' => 'Notenschlüssel',
                'is_correct' => false
            ],
            [
                'question_id' => 23,
                'answer' => 'Bassschlüssel',
                'is_correct' => false
            ],
            [
                'question_id' => 23,
                'answer' => 'Ringschlüssel',
                'is_correct' => true
            ],
            [
                'question_id' => 24,
                'answer' => 'Karl Lagerfeld',
                'is_correct' => false
            ],
            [
                'question_id' => 24,
                'answer' => 'Gianni Versace',
                'is_correct' => false
            ],
            [
                'question_id' => 24,
                'answer' => 'Christian Dior',
                'is_correct' => false
            ],
            [
                'question_id' => 24,
                'answer' => 'Jean-Paul Gaultier',
                'is_correct' => true
            ],
        ];

        foreach($answersMusikQuiz as $answer){
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
