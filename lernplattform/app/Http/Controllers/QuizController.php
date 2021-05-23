<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Http\Resources\QuizCollection;

class QuizController extends Controller
{
    public function getAllCategoriesQuizzesAreIn() {
        $quizzes = new QuizCollection(Quiz::all());

        return $quizzes;
    }
}
