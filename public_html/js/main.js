
function confirmation(link, functie){
    var answer = confirm("Are you sure you want to " + functie + "?");
    if (answer)
        window.location = link;
}

function slideButton(x){
        var easingOut = "easeOutElastic";
        var easingIn = "easeOutBounce";
        $("#header").stop(true, true);
        $("#theIdea").stop(true, true);
        $("#homeButton").stop(true, true);
        
	if ($("#header").css("top") < "0") { //Omlaag
		$("#header").animate({"top":"0"}, {duration: x, easing: easingIn, start:function(){
                        $("#slidingButton").rotate(0);
                }});
                $("#homeButton").animate({"opacity":"0"}, x);
                $("#theIdea").animate({"opacity":"0"}, x)
                $("#homeLink").removeAttr('href');
                $("#homeLinkIdea").removeAttr('href');
                $("#homeButton").css('cursor', 'default');
                $("#theIdea").css('cursor', 'default');
                if(document.getElementById("topic") !== null){
                    $("#topic").stop(true);
                    $("#topic").animate({"top":"84"}, {duration: x, easing: easingOut});
                }
	}
        else {  //Omhoog
                $("#header").animate({"top":"-84"}, {duration: x, easing: easingOut, start:function(){
                        $("#slidingButton").rotate(180);
                }});
                $("#homeButton").animate({"opacity":"1"}, x);
                $("#theIdea").animate({"opacity":"1"}, x);
                $("#homeLink").attr("href", "/");
                $("#homeLinkIdea").attr("href", "/theIdea");
                $("#homeButton").css('cursor', 'pointer');
                $("#theIdea").css('cursor', 'pointer');
                if(document.getElementById("topic") !== null){
                    $("#topic").stop(true);
                    $("#topic").animate({"top":"0"}, {duration: x, easing: easingIn});
                }
	}
}

function autoload(composer){
   var y = window.pageYOffset + window.innerHeight;
   var percentage = document.getElementById('frontPage').offsetHeight * 0.75;
   if(y >= percentage && callOrdered === false){
       window.callOrdered = true;
       $.ajax({
        type: "GET",
        data: { composer: composer },
        url: '/loadMore',
        success: function(data){  
            if(callOrdered === true){ //Prevent double loading
                document.getElementById('mainFrontPage').innerHTML += data;
                window.callOrdered = false;
            }
            $(".loading").remove();
            if(data){
                document.getElementById('mainFrontPage').innerHTML += '<div class="loading"><img src="images/overig/loading.gif" class="loadingImage" /></div>';
            }
            else{
                document.getElementById('mainFrontPage').innerHTML += '<div class="loading">No more posts :( by the way, you got to the end of all posts! How?\n\
                you can go check out some other content on this site or check out people, but be sure to do some other things that are not Sir 65 from time to time, k? k, stay awesome! :D</div>';
            }
        }
      
   }
}  

function hover(element, path) {
    element.setAttribute('src', path);
}
function unhover(element, path) {
    element.setAttribute('src', path);
}

function fadeIn(y, x){
    var speed = x;
    $(y).animate({"opacity":"1"}, speed);
}

function giveProfileRespect(profileID, respect){
    respect++;
    $("#respectCounter").html(respect);
    $("#functionIcon").prop("onclick", false);
    $.post('profileRespect', {profileID: profileID});
}

function giveCommentRespect(commentID, respect){
    respect++;
    var div = "#respectCounter" + commentID;
    $(div).html(respect);
    $("#respectButton" + commentID).prop("onclick", false);
    $.post('commentRespect', {commentID: commentID});
}

function giveRespect(username, postnumber, userRespect, userId, postRespect, respectToGive){
    userRespect += respectToGive;
    postRespect += respectToGive;
    var divNameUser = "#userRespectNumber" + postnumber;
    var divNamePost = "#postRespectNumber" + postnumber;
    $(divNameUser).html(userRespect + " respect");
    $(divNamePost).html(postRespect + " respect");
    $("#dislikeIcon" + postnumber).prop("onclick", false);
    $("#functionIcon" + postnumber).prop("onclick", false);
    $.post('respect', {username: username, userId: userId, postnumber: postnumber});
}

function giveDislike(username, postnumber, userRespect, userId, postRespect, respectToGive){
    userRespect -= respectToGive;
    postRespect -= respectToGive;
    var divNameUser = "#userRespectNumber" + postnumber;
    var divNamePost = "#postRespectNumber" + postnumber;
    $(divNameUser).html(userRespect + " respect");
    $(divNamePost).html(postRespect + " respect");
    $("#dislikeIcon" + postnumber).prop("onclick", false);
    $("#functionIcon" + postnumber).prop("onclick", false);
    $.post('dislike', {username: username, userId: userId, postnumber: postnumber});
}

function giveTopicRespect(topicRespect, id){
    topicRespect++;
    $("#topicRespectCounter").html(topicRespect);
    $("#actualUpButton").prop("onclick", false);
    $.post('giveTopicRespect', {topicId: id});
}


function changeLanguage(language){
    $.post('changeLanguage', {language: language}).done(function(){
        $("#languageImage").attr("src", "images/header/languages/" + language + ".png");
    });
}

function setMessageRead(id, read){
    if(read === 0){
        var x =  "#notificationBlock" + id;
        $.post('setMessageRead', {id: id }).done(function(){
            $(x).css("font-weight","normal");
        });
    }
}

function slideCommentsForth(target, speed){
    $(target).stop(true);
    $(target).css({"opacity":1});
    $(target).animate({"left":510}, speed);
    $(target).css({"height":"initial"});
    $(target + " #commentSection").animate({"opacity" : 1}, speed)
}

function slideCommentsBack(target, speed){
    $(target).stop(true);
    $(target + " #commentSection").stop(true);
    $(target + " #commentSection").css({"opacity" : 0})
    $(target).animate({"height":100 + "px"});
    $(target).animate({"left":200}, speed, function(){
        $(target).css({"opacity":0});
    });
}
