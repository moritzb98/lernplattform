<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\Searchresult;

class User extends Authenticatable implements Searchable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'job',
        'age'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rooms(){
        return $this->belongsToMany('App\Models\RoomsUsers');
    }

    public function files(){
        return $this->belongsToMany('App\Models\FileUpload');
    }

    public function badges(){
        return $this->belongsToMany('App\Models\BadgesUser');
    }

    public function collections(){
        return $this->belongsToMany('App\Models\Collection');
    }

    public function getSearchResult(): SearchResult {
        //$url = '/spa/users/'.$this->name;
        $url = "#";

        return new SearchResult($this, $this->name, $url);
    }
}
