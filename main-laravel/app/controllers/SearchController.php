<?php

class SearchController extends BaseController {
    protected $layout = 'layouts.master';
    
    public function showSearch(){
        Session::put('intendedPage', '/profiles');
        $this->layout->content = View::make('partials/pages/user.profiles')->with('communityStrength', User::GetCommunityStrength());
    }
    
    public function searchProfiles(){
        return Response::view('partials/pages/user.viewProfiles');
    }
    
    public function searchTopics(){
        return Response::view('partials/pages/topic.viewTopics');
    }
}