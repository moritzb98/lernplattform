<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionFiles extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_id', 'collection_id'
    ];

    public function file(){
        return $this->belongsTo('App\Models\FileUpload', 'file_id', 'id');
    }

    public function collection(){
        return $this->belongsTo('App\Models\Collection', 'collection_id', 'id');
    }
}
