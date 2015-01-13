<?php

class ProfileComposer{
    
    public function compose($view){
        $profile = User::where('username', '=', Request::segment(2))->get()->first();
        $view->with('profile', $profile);
    }
}
