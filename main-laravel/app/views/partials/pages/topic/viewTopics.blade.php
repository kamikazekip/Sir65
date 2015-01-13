<?php $i=0 ?>

@foreach($topics as $topic)
    <a href='t/{{$topic->name}}'>
    @if ($i % 2 == 0)
      <div id="searchResult">
    @else
      <div id="searchResult" style="float:right">
    @endif
         <img id="searchResultIcon" src="{{ is_null($topic->icon_extension) ? 'images/topic/defaultIcon.png' : 'mediabase/topics/' . e($topic->name) . '/icon.' . e($topic->icon_extension) }}" 
                     id="avatar"/>
         <div id="rightSide">
            <div id="searchResultUser">
               <div style="width:100%; height:30%;"></div>
               <div>{{e($topic->name)}}</div>
            </div>
            <div id="searchResultRespect">
               <div style="text-align:center;">
                   {{e($topic->respect)}} <img id="respectIcon" class="respectButton"  src="images/user/functionIcons/respectIconGray.png" />
               </div>
            </div>
         </div>
      </div>
    </a>
    
<?php $i++ ?>
@endforeach