<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;


class Karteikartenset extends Model implements Searchable
{
    use HasFactory;
    protected $table = 'karteikartenset';
    protected $fillable = [
        'user_id',
        'name',
        'category_id'
    ];

    public function karteSets(){
        return $this->belongsToMany('App\Models\KarteSets');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function getSearchResult(): SearchResult {
        $url = '/spa/sets/'.$this->name;

        return new SearchResult($this, $this->name, $url, $this->category);
    }
}
