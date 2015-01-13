<?php

class MessageComposer{
    
    public function compose($view){
        if(Auth::check()){
            $profile = User::where('username', '=', Request::segment(2))->get()->first();
            $view->with('profile', $profile);
        }
    }
}
