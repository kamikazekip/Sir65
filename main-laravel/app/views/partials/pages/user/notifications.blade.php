@section('content')
<div id="profileBlock">
    <div id="profileTitle">{{Lang::get('site.Notifications')}}</div>
    <div id="line-separator" style="margin-bottom: 20px;"></div>
    
    @foreach($notifications->reverse() as $notification)
    <div id="profileContent" style="margin-top:0px;" onclick="setMessageRead({{$notification->id}}, {{$notification->read}})">
        @if($notification->read == 0)
            <div class="notificationBlock" id="notificationBlock{{$notification->id}}" style="font-weight:bolder;">
        @else
             <div class="notificationBlock" >
        @endif
            <div id="notificationUser"><div id="notificationActualUser">{{User::find($notification->sender_id)->username}}</div></div>
            <div id="notificationTitle">{{$notification->title}}</div>
            {{Form::open(array('url' => '/notifications/delete/' . $notification->id))}}
            <div id="notificationGarbage">
                <a href="message/{{User::find($notification->sender_id)->username}}"><img src="images/user/notification/reply.png" id="replyImage"></a>
                <input type="image" src="images/user/notification/garbage.png" alt="Submit Form" />
            </div>
            {{Form::close()}}
        </div>
        <div id="message">
            {{$notification->message}}
        </div>
    @endforeach
    </div>
</div>
    
<script type="text/javascript">
    $('#profileContent').accordion({ 
        header: 'div.notificationBlock', 
        active: false,
        collapsible: true,
        event: "mousedown"
    });
</script>
@stop