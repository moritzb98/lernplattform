<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\Searchresult;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model implements Searchable
{
    use HasFactory;

    protected $fillable = [
        'name', 'user_id', 'category_id'
    ];

    public function collectionFiles(){
        return $this->belongsToMany('App\Models\CollectionFiles');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function getSearchResult(): SearchResult {
        $url = '/spa/Collection-detail/'.$this->id;

        return new SearchResult($this, $this->name, $url);
    }
}
