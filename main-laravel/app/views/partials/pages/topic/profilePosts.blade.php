@section('content')
<div id="frontPage">
    <div id="mainFrontPage">
        {{View::make('partials/pages/post.posts')->render()}}
        <div class="loading"><img src="images/overig/loading.gif" class="loadingImage" /></div>
    </div>
</div>

<script type="text/javascript">
    $( document ).ready(function() {
        fadeIn("#frontPage", 1000);
    });
    window.onscroll = function(evt){
        autoload('ProfilePostsComposer');
    };
</script>


@stop