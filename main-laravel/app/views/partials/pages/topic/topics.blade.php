@section('content')
<div id="profileBlock">
    <div id="profilesSearch">
        <div id="topicStrength" >
                <img id="topicIcon" src="images/topic/topic.png" />
                <div id="topicData">
                    <div id="buffer"></div>
                    <font color="#01DF01">{{10}}</font> topics!
                </div>
        </div>
    </div>
    <div id="profilesSearch" style="margin-top:10px; height:100px;">
        {{Form::open()}}
        {{Form::token()}}
        {{Form::text('searchTopic', '' , array('id' => 'userInput', 'placeholder' => 'Search topics' )) }}
        {{Form::close()}}
        <p style="width:50%; margin: auto;">This is just a demo, this part of the site is still under construction ;) try searching for "hackershol"</p>
    </div>
    <div id="searchResults">
    </div>
</div>

<script type="text/javascript">
var oldVal;
var typingTimer;
var doneTypingInterval = 300;

//on keyup, start the countdown
$('#userInput').keyup(function(){
    clearTimeout(typingTimer);
    typingTimer = setTimeout(doneTyping, doneTypingInterval);
});

//on keydown, clear the countdown 
$('#userInput').keydown(function(){
    clearTimeout(typingTimer);
});

//user is "finished typing," do something
function doneTyping () {

    var val = document.getElementById("userInput").value;
    if (val !== oldVal) {
        oldVal = val;
        if(val.length > 0){
            searchTopics();
        }
    }
}
</script>


@stop