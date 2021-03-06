<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BadgesUser extends Model
{
    use HasFactory;

    protected $table = 'badges_user';

    protected $fillable = [
        'user_id', 'badge_id', 'achieved'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function badge(){
        return $this->belongsTo('App\Models\Badges', 'badge_id', 'id');
    }
}
