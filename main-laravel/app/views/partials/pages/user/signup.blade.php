@section('content')
<div id="mainContent">
    <div id="loginBlock">
        {{ Form::open(array('url' => 'signup')) }}
                        <h4>{{Lang::get('site.Username')}}</h4>
			{{ Form::text('username', e(Input::old('username')), array('id' => 'userInput')) }}
                        {{ Form::token() }}
                        <h4 style="margin-top:4px;">{{Lang::get('site.Password')}}</h4>
			{{ Form::password('password', array('id' => 'userInput')) }}
                        <h4 style="margin-top:4px;">{{Lang::get('site.RepeatPassword')}}</h4>
			{{ Form::password('password_confirmation', array('id' => 'userInput')) }}
                        <p style="color:#000;">
                        {{ Form::checkbox('terms_of_agreement', '1') . Lang::get('site.IAccept')}}
                        <p>
                        {{ Form::submit(Lang::get('site.Signup'), array('id' => 'loginButton')) }}
                        <!-- if there are login errors, show them here -->
                        <p>
			{{ $errors->first('username') }}
			{{ $errors->first('password') }}
                        {{ $errors->first('password_confirmation') }}
                        {{ $errors->first('terms_of_agreement') }}
                        </p>
                        <p style="color:#00DB00;">
                            {{$errors->first('success')}}
                        </p>
                        <p style="color:red;">
                            {{$errors->first('failure')}}
                        </p>
	{{ Form::close() }}
    </div>
</div>
@stop