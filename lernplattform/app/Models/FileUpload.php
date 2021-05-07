<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'path',
        'user_id',
        'displayname',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function collectionFiles(){
        return $this->belongsToMany('App\Models\CollectionFiles');
    }
}
