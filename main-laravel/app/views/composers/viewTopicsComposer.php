<?php

class ViewTopicsComposer{
    
    public function compose($view){
        $view->with('topics', Topic::SearchTopics(Input::get('askedFor'))->get());
    }
}
