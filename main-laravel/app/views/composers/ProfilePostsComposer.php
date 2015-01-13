<?php

class ProfilePostsComposer{
    
    public function compose($view){
        
        $postsPerPage = 3;
        $page = Session::get('page');
        $user = User::where('username', '=', Session::get('userPost'))->firstOrFail();
        $posts = Post::ProfilePosts($user->id)->take($postsPerPage)->offset($page * $postsPerPage)->get();          
        $view->with('posts', $posts);
    }
}
