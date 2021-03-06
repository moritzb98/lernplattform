<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomsUsers extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'room_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function room(){
        return $this->belongsTo('App\Models\Room', 'room_id', 'id');
    }
}
