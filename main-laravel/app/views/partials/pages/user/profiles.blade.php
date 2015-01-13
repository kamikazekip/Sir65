@section('content')
<div id="profileBlock">
    <div id="profilesSearch">
        <div id="communityStrength" >
                <img id="communityIcon" src="images/user/community.png" />
                <div id="communityData">
                    <div id="buffer"></div>
                    <font color="#01DF01">{{e($communityStrength)}}</font> people!
                </div>
        </div>
    </div>
    <div id="profilesSearch" style="margin-top:10px;">
        {{Form::open()}}
        {{Form::token()}}
        {{Form::text('inquery', '' , array('id' => 'userInput', 'placeholder' => 'Search people' )) }}
        {{Form::close()}}
    </div>
    <div id="searchResults">
    </div>
</div>

<script type="text/javascript">
    var oldVal;
    
$('#userInput').on('change paste input load', function () {
        var val = this.value;
        if (val !== oldVal) {
            oldVal = val;
            if(val.length > 0){
                searchProfile();
            }
        }
    });
</script>
@stop