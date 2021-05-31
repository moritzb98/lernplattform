<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\Searchresult;
use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model implements Searchable
{
    use HasFactory;
    protected $fillable = [
        'name',
        'path',
        'user_id',
        'displayname',
        'category_id',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function collectionFiles(){
        return $this->belongsToMany('App\Models\CollectionFiles');
    }

    public function getSearchResult(): SearchResult {
        $url = '/spa/documents/'.$this->id;

        return new SearchResult($this, $this->displayname, $url);
    }
}
