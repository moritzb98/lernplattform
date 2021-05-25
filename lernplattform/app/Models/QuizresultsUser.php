<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizresultsUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'quiz_id', 'correctAnswers', 'passed'
    ];
}
