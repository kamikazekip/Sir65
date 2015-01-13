@section('content')
<div>
    <div id="topic">
        <img id="topicBanner" src="mediabase/topics/{{$topic->name}}/banner.{{$topic->banner_extension}}" />
        <div id="forumButton" class="topicButton">Forum</div>
        <div id="membersButton" class="topicButton" style="left:12.6%;">Members</div>
        <div id="uploadButtonForum" class="topicButton" style="left:25.2%;">Upload</div>
        <a href="" id="actualUpButton" onclick="giveTopicRespect({{$topic->respect}},{{$topic->id}}); return false;">
            <div style="left:37.8%; margin-left:3px; width:100px;" id="upButton" class="topicButton">
                <img src="images/topic/topicUp.png">
            </div>
        </a>
        <div id="topicDescription"></div>
    </div>
     <div id="topicContainer">
        <div id="topicInfo">
            <div id="topicBuffer"></div>
            <div id="infoBlock">
                <div class="topInfo">{{$topic->members}}</div>
                <div id="bottomInfo">Members</div>   
            </div>
            <div id="infoBlock">
                <div class="topInfo" id="topicRespectCounter">{{$topic->respect}}</div>
                <div id="bottomInfo">Respect</div>
            </div>
            <div id="infoBlock">
                <div class="topInfo">{{$topic->posts}}</div>
                <div id="bottomInfo">Posts</div>
            </div>
        </div>
    </div>
</div>
   

<script type="text/javascript">
     $("#membersButton").css("top", "-=41")
     $("#uploadButtonForum").css("top", "-=82")
     $("#upButton").css("top", "-=123")
</script>
@stop

