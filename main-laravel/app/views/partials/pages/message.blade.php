@section('content');
@if (! is_null($profile))
<div id="messageBlock">
    <div id="messageTitle">{{Lang::get('site.WriteAMessage')}}</div>
    <div id="line-separator"></div>
    
    <div id="messageContent">
        <div id="messagePres">
            <div id="messagePre">{{Lang::get('site.To')}}:</div>
            <div id="messagePre">{{Lang::get('site.Title')}}:</div>
            <div id="messagePre">{{Lang::get('site.Message')}}:</div>
        </div>
        <div id="messageInputFields">
            {{Form::open(array('url' => '/message/' . e($profile->username), 'method' => 'post'))}}
                <div id="messageInputField">{{$profile->username}}</div>
                {{ Form::text("title", "", array("name" => "title", "id" => "messageInputField"))}}
                {{ Form::textarea("message", "", array("name" => "message", "id" => "messageInputField")) }}
                {{ Form::submit(Lang::get('site.Send'), array("name" =>"Send", "id" => "messageInputSubmit" ))}}
            {{Form::close()}}
        </div>
        <div id="errorField">
            <div id="error">{{ $errors->first('title') }}</div>
            <div id="error">{{ $errors->first('message') }}</div>
         </div>
    </div>
</div>
@else
    <div id="profileBlock">
        <div id="profileTitle">{{Lang::get('site.UserNotFound', array('name' => e(Request::segment(2))));}}</div>
        <div id="sad"><img src="images/user/sad.jpg" id="sadImage" /></div>
    </div>
@endif

@stop;