<?php

class NewComposer{
    
    public function compose($view){
        $postsPerPage = 3;
        $page = Session::get('page');
        $posts = Post::orderBy('created_at','desc')->take($postsPerPage)->offset($page * $postsPerPage)->get();         
        $view->with('posts', $posts);
    }
}
