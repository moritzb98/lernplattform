<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\Searchresult;

class Quiz extends Model implements Searchable
{
    use HasFactory;

    protected $table = 'quiz';

    protected $fillable = [
        'category_id', 'name'
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function getSearchResult(): SearchResult {

        $url = '/spa/quiz/'.$this->category['name'].'/'.$this->id;

        return new SearchResult($this, $this->name, $url);
    }
}
