<?php

class PostComposer{
    
    public function compose($view){
        $post = Post::where('id', '=', Request::segment(2))->get()->first();
        $comments = Comment::GetCommentsByPost(Request::segment(2))->orderBy('created_at', 'DESC')->get();
        $view->with('post', $post);
        $view->with('comments', $comments);
    }
}