<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomUsers extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'room_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
