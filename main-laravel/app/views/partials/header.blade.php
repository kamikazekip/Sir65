<header id="header">
    <a href="/"><img src="images/header/languages/slogan-{{Config::get('app.locale');}}.png" id="sloganImage"/></a>
    <div id="postStreamDiv">
        <ul id='headerList'>
            <li ><a href="/" title="The funniest posts of now!" id="headerMenu"><div id="{{ Route::currentRouteName() === 'home' ? 'postStreamActiveItem' : 'postStreamItem' }}">Front page</div></a></li>
            <li><a href="/new" title="New posts! Please rate!" id="headerMenu"><div id="{{ Route::currentRouteName() === 'new' ? 'postStreamActiveItem' : 'postStreamItem' }}">New</div></a></li>
            <li><a href="/popular" title="Upcoming posts! Popular posts!" id="headerMenu"><div id="{{ Route::currentRouteName() === 'popular' ? 'postStreamActiveItem' : 'postStreamItem' }}">Popular</div></a></li>
            <li><a href="/halloffame" title="The best posts of all time, ever, holy shit." id="headerMenu"><div id="{{ Route::currentRouteName() === 'halloffame' ? 'postStreamActiveItem' : 'postStreamItem' }}">Hall Of Fame</div></a></li>
            <li ><a href="/topics" title="Choose a topic!" id="headerMenu"><div id="{{ Route::currentRouteName() === 'topics' ? 'postStreamActiveItem' : 'postStreamItem' }}">Topic</div></a></li>
        </ul>
    </div>
    <a href="" onclick="slideButton(1400); return false;"><div id="slidingButtonDiv"><img id="slidingButton" src="images/header/buttonOut.png"></div></a>
    <a href="profiles"><div id="profilesButton">People</div></a>
    @if(Auth::check()) <!-- als de user is ingelogd -->
        <a href="" onclick="confirmation('/logout', 'log out'); return false;"><div id="userbutton">{{Lang::get('site.Logout');}}</div></a>
        @if(Notification::where('user_id', '=', Auth::user()->id)->where('read', '=', '0')->count() > 0)
            <a href="/notifications"><div id="userNotifications">{{e(Notification::where('user_id', '=', Auth::user()->id)->where('read', '=', '0')->count())}}</div></a>
        @endif
        <a href="/profiles/{{e(Auth::user()->username)}}"><div style="right:178px;" id="userbutton">{{e(Auth::user()->username)}}</div></a>
        <a href="/upload"><div id="uploadButton">{{Lang::get('site.Upload');}}</div></a>
        <div id="optionsDiv"><a href="/settings">
                <img src="images/header/settings.png"/>
            </a></div>       
        
    @else <!-- als de user niet is ingelogd -->
        <a href="/login"><div id="userbutton">{{Lang::get('site.Login');}}</div></a>
        <a href="/signup"><div style="right:178px;" id="userbutton">{{Lang::get('site.Signup');}}</div></a>
        <div id="optionsDiv" style="right:303px;"><a href="/settings">
                <img src="images/header/settings.png"/>
            </a></div>
    @endif
    <a id="homeLink"><div id="homeButton">Home</div></a>
    <a id="homeLinkIdea"><div id="theIdea">Sir65</div></a>
</header>

<script type="text/javascript">
        $('#sloganImage').tooltip();
        $('#headerMenu').tooltip();
	
	window.callOrdered = false;
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-58078697-1', 'auto');
  ga('send', 'pageview');

</script>