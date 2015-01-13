<?php

class NotificationComposer{
    
    public function compose($view){
        if(Auth::check()){
            $notifications = User::find(Auth::user()->id)->notification;
            $notifications->sortBy(function($notification)
            {
              return $notification->created_at;
            });
            $numberOfNotes = 1;
            $view->with('numberOfNotes', $numberOfNotes);
            $view->with('notifications', $notifications);
        }
    }
}
