<?php

class HomeComposer{
    
    public function compose($view){
        $postsPerPage = 3;
        $page = Session::get('page');
        $posts = Post::FrontPage()->take($postsPerPage)->offset($page * $postsPerPage)->get();          
        $view->with('posts', $posts);
    }
}
