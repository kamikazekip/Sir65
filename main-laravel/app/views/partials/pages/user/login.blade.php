@section('content')
<div id="mainContent">
    <div id="loginBlock">
        {{ Form::open(array('url' => 'login')) }}
                        <h4>{{Lang::get('site.Username')}}</h4>
			{{ Form::text('username', Input::old('username'), array('id' => 'userInput')) }}
                        {{ Form::token()}}
                        <h4 style="margin-top:4px;">{{Lang::get('site.Password')}}</h4>
			{{ Form::password('password', array('id' => 'userInput')) }}
                        {{ Form::hidden('intendedURL' , e(URL::Previous())) }}
                        {{ Form::submit('Log in', array('id' => 'loginButton')) }}
                        <!-- if there are login errors, show them here -->
                        <p>
			{{ $errors->first('username') }}
			{{ $errors->first('password') }}
                        <p>
	{{ Form::close() }}
    </div>
</div>
@stop