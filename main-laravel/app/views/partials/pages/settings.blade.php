@section('content')
<div id="settingsBlock">
    <div id="settingsColumn">
        <div id="settingslabel">Language</div>
        <div id="settingsContent"><img id="languageImage" src="images/header/languages/{{Config::get('app.locale');}}.png" data-dropdown="#dropdown-1"/></div>
    </div>
    <div id="settingsColumn"> 
        <div id="settingslabel">Show Not Safe For Work (NSFW)</div>
        <div id="choice">Off <a href="javascript:void(0);" id="switchImageHref" onclick="switchNSFW('{{Session::get('NSFW', 'Off')}}');"><img  id="switchImage" src="images/overig/switch{{Session::get('NSFW', 'Off')}}.png" /></a> On</div>
        
        <div id="dropdown-1" class="dropdown dropdown-tip dropdown-relative">
            <ul class="dropdown-menu">
                <li><a onclick="changeLanguage('en');">English</a></li>
                <li><a onclick="changeLanguage('nl');">Nederlands</a></li>
                <li><a onclick="changeLanguage('de');">Deutsch</a></li>
            </ul>
        </div>
    </div>    
</div>
@stop