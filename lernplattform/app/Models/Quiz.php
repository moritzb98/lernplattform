<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quiz';

    protected $fillable = [
        'category_id', 'name'
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
}
