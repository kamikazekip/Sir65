<?php

class TopicsComposer{
    
    public function compose($view){
        //$topic = User::where('username', '=', Request::segment(2))->get()->first();
        $view->with('topics', '0');
    }
}
