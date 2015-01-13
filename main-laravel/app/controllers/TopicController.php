<?php

class TopicController extends BaseController {

    protected $layout = 'layouts.master';
    
    public function showTopics(){
        Session::put('intendedPage', '/topics');
        Session::put('page', 0);
        View::composer('partials/pages/post.posts', 'TopicsComposer');
        $this->layout->content = View::make('partials/pages/topic.topics');
    }
    
    public function showTopic($topic){
        Session::put('intendedPage', ('/t/' . $topic));
        $this->layout->content = View::make('partials/pages/topic.topic');
    }
    
    public function topicRespect(){
        topic::where('id', '=', Input::get('topicId'))->first()->increment('respect', 1);
    }
}