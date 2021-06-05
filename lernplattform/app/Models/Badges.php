<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badges extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'challenge'
    ];

    public function badges(){
        return $this->belongsToMany('App\Models\BadgesUser');
    }

}
