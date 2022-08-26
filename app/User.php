<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function tweets(){
        return $this->hasMany(Tweet::class);
    }
     public function followings(){
        return $this->belongsToMany(User::class,'user_follow','user_id','follow_id')->withTimestamps();
    }
    
    public function followers(){
        return $this->belongsToMany(User::class,'user_follow','follow_id','user_id')->withTimestamps();
    }
    
    public function favorites(){
        return $this->belongsToMany(Tweet::class,'favorites','user_id','tweets_id')->withTimestamps();
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount(['tweets', 'followings', 'followers','favorites']);
    }
    
   
    
    public function follow($userId){
        $exist=$this->is_following($userId);
        $its_me=$this->id==$userId;
        
        if($exist||$its_me){
            return false;
        }else{
            $this->followings()->attach($userId);
            return true;
        }
    }
    
    public function unfollow($userId){
        $exist=$this->is_following($userId);
        $its_me=$this->id==$userId;
        
        if($exist&&!$its_me){
            $this->followings()->detach($userId);
            return true;
        }else{
            return false;
        }
    }
    
    public function is_following($userId){
        return $this->followings()->where('follow_id',$userId)->exists();
    }
    
    public function feed_tweets(){
        $userIds=$this->followings()->pluck('users.id')->toArray();
        $userIds[]=$this->id;
        return Tweet::whereIn('user_id',$userIds);
    }
    
    
    
    public function is_favoriting($tweetId){
        return $this->favorites()->where('tweets_id',$tweetId)->exists();
    }
    
    public function favorite($tweetId){
        $exists=$this->is_favoriting($tweetId);
        
        if($exists){
            return false;
        }else{
            $this->favorites()->attach($tweetId);
            return true;
        }
    }
    
    public function unfavorite($tweetId){
        $exists=$this->is_favoriting($tweetId);
        if($exists){
            $this->favorites()->detach($tweetId);
            return true;
        }else{
            return false;
        }
    }
}
