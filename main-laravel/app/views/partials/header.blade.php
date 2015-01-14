<header id="header">
    <a href="/"><img src="images/header/languages/slogan-{{Config::get('app.locale');}}.png" id="sloganImage"/></a>
    <div id="postStreamDiv">
        <ul id='headerList'>
            <li><a href="/" title="The funniest posts of now!" id="headerMenu"><div id="{{ Route::currentRouteName() === 'home' ? 'postStreamActiveItem' : 'postStreamItem' }}" class="headerButton">Front page</div></a></li>
            <li><a href="/new" title="New posts! Please rate!" id="headerMenu"><div id="{{ Route::currentRouteName() === 'new' ? 'postStreamActiveItem' : 'postStreamItem' }}" class="headerButton">New</div></a></li>
            <li><a href="/popular" title="Upcoming posts! Popular posts!" id="headerMenu"><div id="{{ Route::currentRouteName() === 'popular' ? 'postStreamActiveItem' : 'postStreamItem' }}" class="headerButton">Popular</div></a></li>
            <li><a href="/halloffame" title="The best posts of all time, ever, holy shit." id="headerMenu"><div id="{{ Route::currentRouteName() === 'halloffame' ? 'postStreamActiveItem' : 'postStreamItem' }}" class="headerButton">Hall Of Fame</div></a></li>
            <li ><a href="/topics" title="Choose a topic!" id="headerMenu"><div id="{{ Route::currentRouteName() === 'topics' ? 'postStreamActiveItem' : 'postStreamItem' }}" class="headerButton">Topic</div></a></li>
        </ul>
    </div>
    <a href="" onclick="slideButton(1400); return false;"><div id="slidingButtonDiv" class="headerButtonImage"><img id="slidingButton" src="images/header/buttonOut.png"></div></a>
    <a href="profiles"><div id="profilesButton" class="headerButton headerBelowButton">People</div></a>
    @if(Auth::check()) <!-- If user is logged in -->
        <a href="" onclick="confirmation('/logout', 'log out'); return false;"><div id="userbutton" class="headerButton">{{Lang::get('site.Logout');}}</div></a>
        @if(Notification::where('user_id', '=', Auth::user()->id)->where('read', '=', '0')->count() > 0)
            <a href="/notifications"><div id="userNotifications">{{e(Notification::where('user_id', '=', Auth::user()->id)->where('read', '=', '0')->count())}}</div></a>
        @endif
        <a href="/profiles/{{e(Auth::user()->username)}}"><div style="right:178px;" id="userbutton" class="headerButton">{{e(Auth::user()->username)}}</div></a>
        <a href="/upload"><div id="uploadButton" class="headerButton headerBelowButton">{{Lang::get('site.Upload');}}</div></a>    
        
    @else <!-- If the user is not logged in yet -->
        <a href="/login"><div id="userbutton" class="headerButton">{{Lang::get('site.Login');}}</div></a>
        <a href="/signup"><div style="right:178px;" id="userbutton" class="headerButton">{{Lang::get('site.Signup');}}</div></a>
    @endif
    
    <!-- Settings button -->
    <a href="/settings"><div id="optionsDiv" class="headerButtonImage" style="{{Auth::check() ? '': 'right: 303px;'}}">
        <img src="images/header/settings.png"/>
    </div></a>
    
    <!-- Two buttons at the top left side that appear when you retract the header -->
    <a id="homeLink"><div id="homeButton" class="headerButton headerBelowButton">Home</div></a>
    <a id="homeLinkIdea"><div id="theIdea" class="headerButton headerBelowButton">Sir65</div></a>
</header>

<script type="text/javascript">
        $('#sloganImage').tooltip();
        $('#headerMenu').tooltip();
	window.callOrdered = false;
        
  //Google analytics
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-58078697-1', 'auto');
  ga('send', 'pageview');

</script>