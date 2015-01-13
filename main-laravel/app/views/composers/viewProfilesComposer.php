<?php

class ViewProfilesComposer{
    
    public function compose($view){
        $view->with('users', User::SearchProfiles(Input::get('inquery'))->get());
    }
}
