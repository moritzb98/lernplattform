<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\Searchresult;

class Room extends Model implements Searchable
{
    use HasFactory;

    protected $fillable = [
        'name', 'maxPersons', 'user_id', 'category_id'
    ];

    public function roomUsers(){
        return $this->belongsToMany('App\Models\RoomsUsers');
    }

    public function getSearchResult(): SearchResult {
        $url = '/spa/Lerngruppen/Finden';

        return new SearchResult($this, $this->name, $url);
    }
}
