<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KarteSets extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_id', 'set_id'
    ];

    public function card(){
        return $this->belongsTo('App\Models\Karteikarte', 'card_id', 'id');
    }

    public function set(){
        return $this->belongsTo('App\Models\Karteikartenset', 'set_id', 'id');
    }
}
