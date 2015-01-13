<?php

class PostController extends BaseController {

    protected $layout = 'layouts.master';
    
    public function showUpload(){
        Session::put('intendedPage', '/upload');
        $this->layout->content = View::make('partials/pages/post.upload');
        
    }
    
    public function showPost($id){
        Session::put('intendedPage', ('/posts/' . $id));
        $this->layout->content = View::make('partials/pages/post.post');  
    }
    
    public function showProfilePosts($name){
        Session::put('intendedPage', ('/profiles/' . $name . '/posts'));
        Session::put('page', 0);
        Session::put('userPost', $name);
        View::composer('partials/pages/post.posts', 'ProfilePostsComposer');
        $this->layout->content = View::make('partials/pages/topic.profilePosts');
    }
    
    public function doUpload(){
        $file = Input::file('meme');
        $title = Input::get('postTitle');
        $validator = Validator::make(array('meme' => $file , 'postTitle' => $title), Post::$rules);
        if ($validator->passes()) {
            $destinationPath = public_path().'/mediabase/users/'. Auth::user()->username;
            $filename        = str_random(6) . '_' . $file->getClientOriginalName();
            
            if(!file_exists($destinationPath)){
                mkdir( $destinationPath, 0777, false );
                $destinationPath = $destinationPath  . '/posts';
                mkdir( $destinationPath, 0777, false );
            }
            else{
                $destinationPath = $destinationPath  . '/posts';
            }
            
            $file->move($destinationPath, $filename);  
            $xmlFile = pathinfo($destinationPath . '/'. $filename);
            
            $post = new Post();
            $post->user_id = Auth::user()->id;
            $post->hash = $xmlFile['filename'];  
            $post->title = $title;
            if (Input::get('nsfw') === '1') {
                $post->nsfw = 1;
            }
            $post->extension = $xmlFile['extension'];
            $post->save();
            
            $note = new Notification();
            $note->title = 'Thank you!';
            $note->user_id = Auth::user()->id;
            $note->message = 'Thank you for your post! Here is 5 respect as a token of my gratitude, hope you enjoy! - BarryTheKing (Creator of this website)';
            $note->sender_id = 2;
            $note->read = 0;
            $note->created_at = time();
            $note->updated_at = time();
            $note->save();
            Auth::user()->respect +=  5;
            Auth::user()->save();
            
            return Redirect::to('/new');
        } else {
            return Redirect::to('/upload')->withErrors($validator)->withInput();
        }
    }
    
    public function giveRespect(){
    	if(Auth::check()){
    		$respectAmount = round((Auth::user()->respect/50), 0, PHP_ROUND_HALF_DOWN);
    		$giver_id = Auth::user()->id;
    	} else{
    		$respectAmount = 1;
    		$giver_id = null;
    	}
        $respect = new Respect();
        $respect->giver_id = $giver_id;
        $respect->created_at = time();
        $respect->updated_at = time();
        $respect->post_id = Input::get('postnumber');
        $respect->user_id = Input::get('userId');
        $respect->amount = $respectAmount;
        $respect->save();
        
        Post::where('id', '=', Input::get('postnumber'))->first()->increment('respect', $respectAmount);
        User::where('username','=', Input::get('username'))->first()->increment('respect', $respectAmount);
    }
    
    public function giveDislike(){
        user::where('username','=', Input::get('username'))->first()->decrement('respect', 1);
        post::where('id', '=', Input::get('postnumber'))->first()->decrement('respect', 1);
    }
    
    public function writeComment($id){
        $comment = Input::get('comment');
        $validator = Validator::make(array('comment' => $comment), Comment::$rules);
        if ($validator->passes()) {
            $note = new Notification();
            $note->title = 'Post comment!';
            $note->user_id = Post::where('id', '=', $id)->first()->user_id;
            $note->message = Auth::user()->username . " commented on your post!";
            $note->sender_id = Auth::user()->id;
            $note->read = 0;
            $note->created_at = time();
            $note->updated_at = time();
            $note->save();
            
            $newComment = new Comment();
            $newComment->comment = Input::get('comment');
            $newComment->user_id = Auth::user()->id;
            $newComment->post_id = $id;
            $newComment->save();
            return Redirect::to('/posts/' . $id);
        } else {
            return Redirect::to('/upload')->withErrors($validator)->withInput();
        }
    }
    
    public function commentRespect(){
       Comment::where('id', '=', Input::get('commentID'))->first()->increment('respect', 1);
    }
}