@section('content')
<div id="messageBlock">
    <div id="profileTitle">{{Lang::get('site.Upload')}}</div>
    <div id="line-separator"></div>
    <div id="profileContent">
        <div id="messagePres">
            <div id="messagePre">{{Lang::get('site.Title')}}:</div>
            <div id="messagePre">{{Lang::get('site.Meme')}}:</div>
            <div id="messagePre">NSFW:</div>
        </div>
        <div id="messageInputFields">
            <form action="/upload" method="post" enctype="multipart/form-data">
                {{Form::token()}}
                <input name="postTitle" type="text" required="true" name="title" id="messageInputField">
                <input name="meme" type="file" required="true" id="messageInputField" style="font-size:20px;"/>
                <div id="messageInputField">{{Form::checkbox('nsfw', '1', false, ['id' => 'nsfwCheck'])}}</div>
                <input type="submit"  value="{{Lang::get('site.Submit')}}" id="messageInputSubmit"/> 
            </form>
        </div> 
        <div id="errorField">
            <div id="error">{{ $errors->first('meme') }}</div>
            <div id="error">{{ $errors->first('postTitle') }}</div>
         </div>
    </div>
</div>
@stop