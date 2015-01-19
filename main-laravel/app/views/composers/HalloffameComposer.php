<?php

class HalloffameComposer{
    
    public function compose($view){
        $postsPerPage = 3;
        $page = Session::get('page');
        $posts = Post::HallOfFame()->take($postsPerPage)->offset($page * $postsPerPage)->get();
        $view->with('posts', $posts);
    }
}
