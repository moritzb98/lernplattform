<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karteikartenset extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
    ];

    public function karteSets(){
        return $this->belongsToMany('App\Models\KarteSets');
    }
}
