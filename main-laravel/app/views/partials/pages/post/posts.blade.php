@if(! is_null($posts))
    @foreach($posts as $post)
            <div id="post">
                <div id="title">{{e($post->title)}} </div>
                <div id="actualPostdiv">
                    @if(! $post->nsfw == 1 || Session::get('NSFW') == 'On' )
                    <a href='posts/{{e($post->id)}}' onmouseover="slideCommentsForth('#commentBlock{{$post->id}}',250)" onmouseout="slideCommentsBack('#commentBlock{{e($post->id)}}',500 )">
                        <img id="actualPost" width="500px;"  src="mediabase/users/{{e(User::find($post->user_id)->username)}}/posts/{{e($post->hash)}}.{{e($post->extension)}}" />
                    </a>
                        
                    @else
                    <a href='settings'>
                        <img id="actualPost" width="500px;"  src="images/overig/nsfw.jpg" />
                    </a>
                    @endif
                        <div class="frontpageCommentblock" id="commentBlock{{e($post->id)}}">
                            <div id="commentsHeader">{{Lang::get('site.TopComments')}}</div>
                            <div id="seperator"></div>
                            <div id="commentSection">
                                @if (! $post->comments()->isEmpty() )
                                    @foreach($post->comments() as $comment)
                                    <div id="commenter">
                                        {{e(User::find($comment->user_id)->username)}}
                                    </div>
                                    <div id="comment">
                                        {{e($comment->comment)}}
                                    </div>
                                    @endforeach
                                @else
                                <div id="noComments">{{Lang::get('site.NoComments')}}</div>
                                @endif
                            </div>
                        </div>
                </div> 
                <div id="respectDIV">
                    <div id="usernames">
                        <a href="posts/{{e($post->id)}}" id="profileLink" title="Click to go to this post">{{Lang::get('site.ThisPost')}}</a> <br />
                        <a href="profiles/{{e(User::find($post->user_id)->username)}}" id="profileLink" title="Click to go to {{e(User::find($post->user_id)->username)}}'s page">{{e(User::find($post->user_id)->username)}}</a> 
                    </div>
                    <div id="respect">
                        <div id="postRespectNumber{{e($post->id)}}">{{e($post->respect)}} respect</div>
                        <div id="userRespectNumber{{e($post->id)}}">{{e(User::find($post->user_id)->respect)}} respect</div>
                    </div>
                </div>
                @if( $post->nsfw == 1 )
                            <div id="nsfwBannerDiv">
                                <div id="nsfwBanner">
                                    NSFW
                                </div>
                            </div>
                        @endif
                 <div id="functions">
                     <div id="respectContainer"><img class="respectFunction" id="functionIcon{{e($post->id)}}" onclick="giveRespect('{{e(User::find($post->user_id)->username)}}', {{e($post->id)}}, {{e(User::find($post->user_id)->respect)}}, {{e($post->user_id)}}, {{e($post->respect)}})" 
                          src="images/user/functionIcons/respectIconLaugh.png" onmouseover="hover(this, 'images/user/functionIcons/respectIconHover.png')" 
                          onmouseout="unhover(this, 'images/user/functionIcons/respectIconLaugh.png');" title="Click to give respect to this post and {{e(User::find($post->user_id)->username)}}" /></div>
                     <div id="respectContainer"><img class="dislikeFunction" id="dislikeIcon{{e($post->id)}}" onclick="giveDislike('{{e(User::find($post->user_id)->username)}}', {{e($post->id)}}, {{e(User::find($post->user_id)->respect)}}, {{e($post->user_id)}}, {{e($post->respect)}})" 
                          src="images/user/functionIcons/dislike.png" onmouseover="hover(this, 'images/user/functionIcons/dislikeHover.png')" 
                          onmouseout="unhover(this, 'images/user/functionIcons/dislike.png');" title="Click to dislike respect this post and decrement 1 respect from {{e(User::find($post->user_id)->username)}}" /></div>
                </div>
            <div id="postSeperator"></div>
        </div>
    @endforeach
@endif