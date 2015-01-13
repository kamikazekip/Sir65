function switchNSFW(NSFW){
    if(NSFW === 'On'){
        NSFW = 'Off';
    }
    else{
        NSFW = 'On';
    }
    $.post('switchNSFW', {NSFW: NSFW}).done(function(){
        $("#switchImage").attr("src", "images/overig/switch" + NSFW +  ".png");
        document.getElementById('switchImageHref').setAttribute("onclick", "switchNSFW('" + NSFW + "');");
    });    
}