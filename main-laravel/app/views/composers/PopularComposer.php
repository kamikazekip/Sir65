<?php

class PopularComposer{
    
    public function compose($view){
        $postsPerPage = 3;
        $page = Session::get('page');
        $posts = Post::Popular()->take($postsPerPage)->offset($page * $postsPerPage)->get();          
        $view->with('posts', $posts);
    }
}