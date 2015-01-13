<?php $i=0 ?>

@foreach($users as $user)
    <a href='profiles/{{$user->username}}'>
    @if ($i % 2 == 0)
      <div id="searchResult">
    @else
      <div id="searchResult" style="float:right">
    @endif
         <img id="searchResultIcon" src="{{ is_null($user->icon_extension) ? 'images/user/defaultIcon.png' : 'mediabase/users/' . e($user->username) . '/icon.' . e($user->icon_extension) }}" 
                     id="avatar"/>
         <div id="rightSide">
            <div id="searchResultUser">
               <div style="width:100%; height:30%;"></div>
               <div>{{e($user->username)}}</div>
            </div>
            <div id="searchResultRespect">
               <div style="text-align:center;">
                   {{e($user->respect)}} <img id="respectIcon" class="respectButton"  src="images/user/functionIcons/respectIconGray.png" />
               </div>
            </div>
         </div>
      </div>
    </a>
    
<?php $i++ ?>
@endforeach