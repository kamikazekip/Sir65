<?php

class HomeController extends BaseController {

    protected $layout = 'layouts.master';
   
    public function showHome() {  
        $this->layout->header = View::make('partials.header');
        Session::put('page', 0);
        Session::put('intendedPage', '/');
        View::composer('partials/pages/post.posts', 'HomeComposer');
        $this->layout->content = View::make('partials.home');
    }
    
    public function showNew(){
        Session::put('page', 0);
        View::composer('partials/pages/post.posts', 'NewComposer');
        Session::put('intendedPage', '/new');
        $this->layout->content = View::make('partials/pages/topic.new');   
    }
    
    public function showPopular(){
        Session::put('page', 0);
        Session::put('intendedPage', '/popular');
        View::composer('partials/pages/post.posts', 'PopularComposer');
        $this->layout->content = View::make('partials/pages/topic.popular');
        
    }
    
    public function showHalloffame(){
        Session::put('page', 0);
        Session::put('intendedPage', '/halloffame');
        View::composer('partials/pages/post.posts', 'HalloffameComposer');
        $this->layout->content = View::make('partials/pages/topic.halloffame');
    }
    
    public function loadMore(){
        View::composer('partials/pages/post.posts', Input::get('composer'));
        Session::put('page', Session::get('page') + 1);
        return Response::view('partials/pages/post.posts');
    }
    
    public function showSettings(){
        Session::put('intendedPage', '/');
        $this->layout->content = View::make('partials/pages.settings');
    }
    
    public function showTheIdea(){
        $this->layout->content = View::make('partials/pages/easterEggs.theIdea');
    }
    
    public function showBears(){
        Session::put('intendedPage', '/');
        $this->layout->content = View::make('partials/pages/easterEggs.bears');
    }
    
    public function show404(){
        Session::put('intendedPage', '/');
        $this->layout->content = View::make('errors.missing');
    }
    
    public function changeLanguage(){
        Session::put('lang', Input::get('language'));
    }
    
    public function setMessageRead(){
        echo('hello');
        Notification::where('id', '=', Input::get('id'))->first()->increment('read', 1);
        
    }
    
    public function switchNSFW(){
        Session::put('NSFW', Input::get('NSFW'));
    }  
}
