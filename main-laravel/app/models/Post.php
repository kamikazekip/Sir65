<?php

class Post extends Eloquent{
    protected $table = "post";
    
    public static $rules = array(
        'meme'=>'image|max:3000',
        'postTitle' =>'required'
    );
    
    public function scopeCreatedLastXDays($query, $nb)
    {
        return $query->where('created_at', '>=', new DateTime('-'.$nb.' days'))->orderBy('created_at', 'DESC'); 
    }
    
    public function scopeTop10($query, $nb)
    {
        return $query->orderBy('respect', 'DESC');
    }
    
    public function scopePopular($query){
        return $query->whereBetween('respect', array(0, 5))->orderBy('respect', 'DESC');
    }
    
    public function scopeFrontPage($query){
        return $query->whereBetween('respect', array(0, 10))->orderBy('respect', 'DESC');
    }
    
    public function scopeProfilePosts($query, $profile){
        return $query->where('user_id', '=', $profile);
    }
    
    public function comments()
    {
        return $this->hasMany('Comment', 'post_id')->orderBy('respect', 'DESC')->get()->take(3);
    }
    
}

