@section('content')
<div id="messageBlock">
    <div id="profileTitle">Change icon</div>
    <div id="line-separator"></div>
    <div id="profileContent">
        <div id="messagePres">
            <div id="messagePre">Icon:</div>
        </div>
        <div id="messageInputFields" style="margin-top:10px;">
            <form action="/changeIcon" method="post" enctype="multipart/form-data">
                {{ Form::token() }}
                <input name="icon" type="file" required="true" id="messageInputField" style="font-size:20px;"/>
                <input type="submit" value="Submit" id="messageInputSubmit"/>
            </form>
        </div> 
        <div id="errorField">
            <div id="error">{{ $errors->first('meme') }}</div>
            <div id="error">{{ $errors->first('postTitle') }}</div>
         </div>
    </div>
</div>
@stop