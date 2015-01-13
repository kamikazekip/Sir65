<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="rating" content="General" />
<meta name="robots" content="index, follow" />
<meta name="revisit-after" content="30 days"/>

<!-- favicon -->
<link rel="icon" type="image/png" href="images/header/favicon.png">

<!-- CSS -->
{{ HTML::style('css/comment.css'); }}
{{ HTML::style('css/header.css'); }}
{{ HTML::style('css/main.css'); }}
{{ HTML::style('css/user.css'); }}
{{ HTML::style('css/post.css'); }}
{{ HTML::style('css/topic.css'); }}
{{ HTML::style('css/jquerydropdown.css'); }}



<!-- JavaScript -->
{{ HTML::script('js/main.js'); }}
{{ HTML::script('js/jqueryui/js/jquery-1.10.2.js'); }}
{{ HTML::script('js/jqueryui/js/jquery-ui-1.10.4.custom.min.js'); }}
{{ HTML::script('js/jqueryui/js/jquery-rotate.min.js'); }}
{{ HTML::script('js/jquerydropdown.js'); }}
{{ HTML::script('js/settings.js'); }}
{{ HTML::script('js/search.js'); }}


<script type="text/javascript">
    var kkeys = [], konami = "38,38,40,40,37,39,37,39,66,65";
    $(document).keydown(function(e) {
      kkeys.push( e.keyCode );
      if ( kkeys.toString().indexOf( konami ) >= 0 ){
        $(document).unbind('keydown',arguments.callee);
        window.location = "/paasei"   
      }
    });
</script>

<title>{{Lang::get('site.siteTitle');}}</title>

