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
}
