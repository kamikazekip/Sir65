<?php

class TopicComposer{
    
    public function compose($view){
        $topic = Topic::where('name', '=', Request::segment(2))->get()->first();
        $view->with('topic', $topic);
    }
}
