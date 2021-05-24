<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Category;
use App\Models\Question;
use App\Models\Answer;
use App\Http\Resources\QuizCollection;

class QuizController extends Controller
{
    public function getAllCategoriesQuizzesAreIn() {
        $quizzes = new QuizCollection(Quiz::all());

        return $quizzes;
    }

    public function getQuiz($category){
        $categoryObject = Category::where('name', $category)->first();
        $quizzes = Quiz::where('category_id', $categoryObject['id'])->get();

        return $quizzes;
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
}