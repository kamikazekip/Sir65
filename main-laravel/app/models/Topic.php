<?php

class Topic extends Eloquent{
    protected $table = "topic";
    
    public function scopeSearchTopics($query, $inquery){
        return $query->where('name', 'LIKE', ('%' . $inquery . '%'));
    }
}
