@section('content')

@if (! is_null($post))
    <div id='mainFrontPage'>
        <div id="post">
            <div id="title">{{e($post->title)}}</div>
            <img id="actualPost" width="500px;"  src="mediabase/users/{{e(User::find($post->user_id)->username)}}/posts/{{e($post->hash)}}.{{e($post->extension)}}" />
            <div id="respectDIV">
                <div id="usernames">
                    {{Lang::get('site.ThisPost')}} <br />
                    <a href="profiles/{{e(User::find($post->user_id)->username)}}" id="profileLink" title="Click to go to {{e(User::find($post->user_id)->username)}}'s page">{{e(User::find($post->user_id)->username)}}</a>           
                </div>
                <div id="respect">
                    <div id="postRespectNumber{{e($post->id)}}">{{e($post->respect)}} respect</div>
                    <div id="userRespectNumber{{e($post->id)}}">{{e(User::find($post->user_id)->respect)}} respect</div>
                </div>
            </div>
            <div id="functions">
                     <div id="respectContainer"><img class="respectFunction" id="functionIcon{{e($post->id)}}" onclick="giveRespect('{{e(User::find($post->user_id)->username)}}', {{e($post->id)}}, {{e(User::find($post->user_id)->respect)}}, {{e($post->user_id)}}, {{e($post->respect)}})" 
                          src="images/user/functionIcons/respectIconLaugh.png" onmouseover="hover(this, 'images/user/functionIcons/respectIconHover.png')" 
                          onmouseout="unhover(this, 'images/user/functionIcons/respectIconLaugh.png');" title="Click to give respect to this post and {{e(User::find($post->user_id)->username)}}" /></div>
                     <div id="respectContainer"><img class="dislikeFunction" id="dislikeIcon{{e($post->id)}}" onclick="giveDislike('{{e(User::find($post->user_id)->username)}}', {{e($post->id)}}, {{e(User::find($post->user_id)->respect)}}, {{e($post->user_id)}}, {{e($post->respect)}})" 
                          src="images/user/functionIcons/dislike.png" onmouseover="hover(this, 'images/user/functionIcons/dislikeHover.png')" 
                          onmouseout="unhover(this, 'images/user/functionIcons/dislike.png');" title="Click to dislike respect this post and decrement 1 respect from {{e(User::find($post->user_id)->username)}}" /></div>
                </div>
        </div>
        <div id="postCommentblock">
            <div id="writeCommentBlock">
                <div id="userImageDiv">
                @if(Auth::check())
                <img 
                    src="{{ is_null(Auth::user()->icon_extension) ? 'images/user/defaultIcon.png' : 'mediabase/users/' . e(Auth::user()->username) . '/icon.' . e(Auth::user()->icon_extension) }}"  
                    id="userImage"/>
                @else
                <img src="images/user/defaultIcon.png" id="userImage" />
                @endif
                </div>
                <div id="writeCommentDiv">
                    {{ Form::open(array('url' => '/writeComment/' . $post->id, 'id' => 'writeCommentForm', 'cols' => '80', 'rows' => '8')) }}
                    {{ Form::textarea('comment', '', array('id' => 'writeComment', 'placeholder' => Lang::get('site.WriteComment'), 'required' => true, 'name' => 'comment' )) }}
                    {{ Form::token() }}
                </div>
            </div>
            <div id="submitButton">
                <div id="commentErrors"> {{ $errors->first('comment') }}</div>
                {{ Form::submit(Lang::get('site.Submit'), array('id' => 'commentSubmitButton'))}}
            </div>
            {{ Form::close() }}
            <div id="title">{{Lang::get('site.Comments')}}</div>
            
            
            @foreach($comments as $comment)
            <div id="commentBlock">
                <div id="userImageDiv">
                    <img id="userImage" 
                         src="{{ is_null(User::find($comment->user_id)->icon_extension) ? 'images/user/defaultIcon.png' : 'mediabase/users/' . e(User::find($comment->user_id)->username) . '/icon.' . e(User::find($comment->user_id)->icon_extension) }}" />
                </div>
                <div id="middleSection">
                    <div id="commentHeader">
                        <div id="commentUsername">{{e(User::find($comment->user_id)->username)}}</div>
                        <div id="commentTime">{{$comment::time_elapsed_string($comment->created_at)}}</div>
                    </div>
                    <div id="actualCommentDiv">
                        {{e($comment->comment)}}
                    </div>
                </div>
                <div id="respectDiv">
                    <div class="respectCounter" id="respectCounter{{e($comment->id)}}">{{e($comment->respect)}}</div> 
                    <div id="respectButtonDiv" >
                        <img class="respectButton" id="respectButton{{e($comment->id)}}" src="images/user/functionIcons/respectIconLaugh.png" onclick="giveCommentRespect({{e($comment->id)}},{{e($comment->respect)}})" onmouseover="hover(this, 'images/user/functionIcons/respectIconHover.png')" 
                        onmouseout="unhover(this, 'images/user/functionIcons/respectIconLaugh.png');" />
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div id="postCommentBlockBuffer"> </div>
    </div>
@else
    <div id="profileBlock">
        <div id="profileTitle">I'm sorry, there is no post {{e(Request::segment(2))}} :(</div>
        <div id="sad"><img src="images/user/sad.jpg" id="sadImage" /></div>
    </div>
@endif
@stop