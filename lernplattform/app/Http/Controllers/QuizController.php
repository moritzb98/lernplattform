<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Category;
use App\Models\Question;
use App\Models\Answer;
use App\Models\QuizresultsUser;
use App\Http\Resources\QuizCollection;
use Auth;

class QuizController extends Controller
{
    public function getAllCategoriesQuizzesAreIn() {
        $quizzes = new QuizCollection(Quiz::all());

        return $quizzes;
    }

    public function getQuizCollection($category){
        $categoryObject = Category::where('name', $category)->first();
        $quizzes = new QuizCollection(Quiz::where('category_id', $categoryObject['id'])->get());

        return $quizzes;
    }

    public function getQuiz($category){
        $categoryObject = Category::where('name', $category)->first();
        $quizzes = Quiz::where('category_id', $categoryObject['id'])->get();

        return $quizzes;
    }

    public function getQuizWithId($quizid){
        return Quiz::where('id', $quizid)->first();
    }

    public function getQuestion($quizid){
        $questions = Question::where('quiz_id', $quizid)->get();

        for($i=0; $i<count($questions);$i++){
            $questions[$i]['answers'] = Answer::where('question_id', $questions[$i]['id'])->get();
        }
        return $questions;
    }

    public function showAnswers($questionid){
        return Answer::where('question_id', $questionid)->get();
    }

    public function saveResult(Request $request){

        $currentResult = QuizresultsUser::where('user_id', Auth::user()->id)->where('quiz_id', $request['quizid'])->first();

        if($currentResult['correctAnswers'] < $request['correctAnswers']){
            QuizresultsUser::updateOrCreate(
            [
                'user_id' => Auth::user()->id,
                'quiz_id' => $request['quizid'],
            ],
            [
                'user_id' => Auth::user()->id,
                'quiz_id' =>  $request['quizid'],
                'correctAnswers' => $request['correctAnswers'],
                'passed' => $request['passed'],
            ]);

            app('App\Http\Controllers\BadgeController')->checkBadges();

        }

        return response()->json(['´success' => 'Ergebnis erfolgreich gespeichert.'], 200);

    }

    public function getResult(Request $request){

        $userid = Auth::user()->id;
        $result = [];

        for($i = 0; $i<count($request->all()); $i++){
            array_push($result, QuizresultsUser::where('user_id', $userid)->where('quiz_id', $request[$i]['id'])->first());
        }

        return $result;
    }

    public function createQuiz(Request $request){

        $quiz = Quiz::create([
            'category_id' => $request['category_id'],
            'name' => $request['name'],
            'user_id' => Auth::user()->id,
        ]);

        foreach($request['questions'] as $key => $question){
            $newQuestion = Question::create( [
                'quiz_id' => $quiz['id'],
                'question' => $question['question'],
                'questionNumber' => $key+1
            ]);

            foreach($question['answers'] as $answer){
                Answer::create([
                    'question_id' => $newQuestion['id'],
                    'answer' => $answer['answer'],
                    'is_correct' => $answer['is_correct']
                ]);
            }
        };


        return response()->json(['´success' => 'Quiz erfolgreich erstellt.'], 200);
    }

    public function deleteQuiz($quizid){

        $questions = Question::where('quiz_id', $quizid)->get();

        foreach($questions as $question){
            Answer::where('question_id', $question['id'])->delete();
            Question::where('id', $question['id'])->delete();
        };

        Quiz::where('id', $quizid)->delete();

        return response()->json(['´success' => 'Quiz erfolgreich gelöscht.'], 200);
    }

    public function getMyQuiz(){
        return new QuizCollection(Quiz::where('user_id', Auth::user()->id)->get());
    }
}
