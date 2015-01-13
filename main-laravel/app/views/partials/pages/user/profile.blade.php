@section('content')

@if (! is_null($profile))
    <div id="profileBlock">
        <div id="profileTitle">{{e($profile->username)}}</div>
        <div id="line-separator"></div>
        
        <div id="profileContent">
            <div id="profileOptions">
                @if(Auth::check() && e(Request::segment(2)) === e(Auth::user()->username))
                <a href="notifications"><div id="profileOption" style="margin-top:0px;">
                    <div id="profileFunctionIcon"><img  src="images/user/functionIcons/mailIcon.png"></div>
                    <div id="profileFunctionDescription" style="padding-top:7px;">{{Lang::get('site.Inbox');}}</div>
                </div></a>
                @else
                <a href="message/{{e($profile->username)}}"><div id="profileOption" style="margin-top:0px;">
                    <div id="profileFunctionIcon"><img  src="images/user/functionIcons/mailIcon.png"></div>
                    <div id="profileFunctionDescription" style="padding-top:7px;">{{Lang::get('site.Message');}}</div>
                </div></a>
                @endif
                
                
                
                <div id="profileOption" style="margin-top:30px;">
                    <a onclick="giveProfileRespect('{{e($profile->id)}}', {{e($profile->respect)}})" >
                    <div id="profileFunctionIcon"><img id="functionIcon" 
                      src="images/user/functionIcons/respectIconGray.png" onmouseover="hover(this, 'images/user/functionIcons/respectIconGrayHover.png')" 
                      onmouseout="unhover(this, 'images/user/functionIcons/respectIconGray.png');" title="Click to give respect to {{e($profile->username)}}" /></div>
                    <div id="profileFunctionDescription">{{Lang::get('site.Respect');}}</div>
                    </a>
                </div>
                
                 <a href="profiles/{{e($profile->username)}}/posts"><div id="profileOption">
                    <div id="profileFunctionIcon"><img  src="images/user/functionIcons/postsIcon.png"></div>
                    <div id="profileFunctionDescription">{{Lang::get('site.Posts');}}</div>
                 </div></a>
            </div>
            <div id="profileRespect">
                <div id="respectCounter">{{e($profile->respect)}}</div>
                <div id="respectSub">{{Lang::get('site.Respect');}}</div>
            </div>
            <div id="profileAvatar">
                <img src="{{ is_null($profile->icon_extension) ? 'images/user/defaultIcon.png' : 'mediabase/users/' . e($profile->username) . '/icon.' . e($profile->icon_extension) }}" 
                     id="avatar"/>
                @if(Auth::check())
                    @if(e(Request::segment(2)) === e(Auth::user()->username))
                        <p>
                        <a href="changeIcon/{{e(Auth::user()->username)}}">{{Lang::get('site.ChangeIcon');}}</a>
                        </p>
                    @endif
                @endif
                
            </div>
        </div>
        
    </div>
@else
    <div id="profileBlock">
        <div id="profileTitle">{{Lang::get('site.UserNotFound', array('name' => e(Request::segment(2))));}}</div>
        <div id="sad"><img src="images/user/sad.jpg" id="sadImage" /></div>
    </div>
@endif
@stop
