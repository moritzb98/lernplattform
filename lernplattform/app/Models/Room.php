<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Room extends Model implements Searchable
{
    use HasFactory;

    protected $fillable = [
        'name', 'maxPersons', 'user_id', 'category_id'
    ];

    public function roomUsers(){
        return $this->belongsToMany('App\Models\RoomsUsers');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function getSearchResult(): SearchResult {
        $url = '/spa/Lerngruppen/'.$this->id.'/chat';

        return new SearchResult($this, $this->name, $url, $this->category);
    }
}
