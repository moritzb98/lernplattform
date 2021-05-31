<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\Searchresult;


class Karteikartenset extends Model implements Searchable
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'category_id'
    ];

    public function karteSets(){
        return $this->belongsToMany('App\Models\KarteSets');
    }

    public function getSearchResult(): SearchResult {
        $url = '/spa/sets/'.$this->name;

        return new SearchResult($this, $this->name, $url);
    }
}
