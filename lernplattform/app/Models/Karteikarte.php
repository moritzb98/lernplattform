<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karteikarte extends Model
{
    use HasFactory;

    protected $table = 'karteikarte';

    protected $fillable = [
        'user_id',
        'frontside',
        'backside',
        'set_id',
    ];

    public function setss(){
        return $this->belongsToMany('App\Models\Karteikartenset');
    }
}
