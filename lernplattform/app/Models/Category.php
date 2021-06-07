<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function quizzes(){
        return $this->belongsToMany('App\Models\Quiz');
    }

    public function karteikartensets(){
        return $this->belongsToMany('App\Models\Karteikartenset');
    }

    public function collections(){
        return $this->belongsToMany('App\Models\Collection');
    }
}
