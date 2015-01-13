<?php

class UserController extends BaseController {

    protected $layout = 'layouts.master';
    
    public function showLogin(){
        $this->layout->content = View::make('partials/pages/user.login');
    }
    
    public function doLogin()
	{
		$rules = array('password' => 'required|alphaNum|min:3');
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {
			// create our user data for the authentication
			$userdata = array('username' => Input::get('username'),'password' => Input::get('password')
			);
			// attempt to do the login
			if (Auth::attempt($userdata)) {
                                return Redirect::to(Session::get('intendedPage'));
			} else {	 	
				return Redirect::to('/login')->with('errorMessage', 'Verkeerde combinatie');
                        }
		}
	}
        
    public function showSignup(){
        Session::put('intendedPage', '/');
        $this->layout->content = View::make('partials/pages/user.signup');
    }
    
    public function doSignup(){
        $validator = Validator::make(Input::all(), User::$rules);
        if(is_null(User::where('username' , '=', Input::get('username'))->get()->first())){
            if ($validator->passes()) {
                $user = new User;
                $user->username = Input::get('username');
                $user->password = Hash::make(Input::get('password'));
                $user->respect = 0;
                $user->created_at = time();
                $user->updated_at = time();
                $user->save();
                return Redirect::to('signup')->withErrors(array('success' => 'AWW YISS ' . Input::get('username') . '! head over to the login page to get this party started :D'));
            }
            else{
                return Redirect::to('signup')->withErrors($validator)->withInput();
            }
        } else {
            return Redirect::to('signup')->withErrors(array('failure' => 'Oh noes! It looks like the username ' . Input::get('username') . ' has already been taken'))->withInput();
        }
    }
    
    public function doLogout(){
        Auth::logout();
        return Redirect::to('/');
    }
    
    public function showProfile($name){
        Session::put('intendedPage', ('/profiles/' . $name));
        $this->layout->content = View::make('partials/pages/user.profile');
    }
    
    public function showNotifications(){
        Session::put('intendedPage', '/');
        $this->layout->content = View::make('partials/pages/user.notifications');
    }
    
    public function showMessage(){
        Session::put('intendedPage', '/');
        $this->layout->content = View::make('partials/pages.message');
    }
    
    public function deleteNotification($id){
        $notification = Notification::find($id)->get()->first();
        $notification->delete();
        return Redirect::to('/notifications');
    }
    
    public function sendMessage($name){
        $rules = array('title' => 'required|min:3|max:25',
                       'message' => 'required|min:3|max:125');
	$validator = Validator::make(Input::all(), $rules);
        
	if ($validator->fails()) {
		return Redirect::to('/message/' . Request::segment(2))
			->withErrors($validator)->withInput(); // send back all errors to the login form
		} else {
                $user = User::where('username', '=', Request::segment(2))->get()->first();
                
                $note = new Notification();
                $note->title = Input::get('title');
                $note->user_id = $user->id;
                $note->message = Input::get('message');
                $note->sender_id = Auth::user()->id;
                $note->read = 0;
                $note->created_at = time();
                $note->updated_at = time();
                $note->save();
                
		return Redirect::to('/profiles/' . $user->username);
	}
    }
    
    public function showChangeIcon(){
        Session::put('intendedPage', '/');
        $this->layout->content = View::make('partials/pages/user.changeicon');
    }
    
    public function profileRespect(){
        User::where('id', '=', Input::get('profileID'))->first()->increment('respect', 1);
    }
    
    public function doChangeIcon(){
        $file = Input::file('icon');
        $validator = Validator::make(array('icon' => $file), array('icon'=>'image|max:1000'));
        if ($validator->passes()) {
            $destinationPath = public_path().'/mediabase/users/'. Auth::user()->username;
            $filename        = "icon." . $file->getClientOriginalExtension();
            
            if(!file_exists($destinationPath)){
                mkdir( $destinationPath, 0777, false );
            }
            
            $file->move($destinationPath, $filename); 
            Auth::user()->icon_extension = $file->getClientOriginalExtension();
            Auth::user()->save();
     
            return Redirect::to('/profiles/' . Auth::user()->username);
        } else {
            return Redirect::to('/changeIcon/' . Auth::user()->username)->withErrors($validator)->withInput();
        }
    }
}