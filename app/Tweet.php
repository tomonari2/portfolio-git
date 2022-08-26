<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable=['content'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function favorite_users(){
        return $this->belongsToMany(User::class,'favorites','tweets_id','user_id');
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount('favorite_users');
    }
}
