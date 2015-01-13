function searchProfile(){
   var inquery = document.getElementById("userInput").value;
   $.ajax({
       type: "POST",
       data: { inquery: inquery },
       url: '/searchProfiles',
       success: function(data){
           document.getElementById('searchResults').innerHTML = data;
       }
   });
}  

function searchTopics(){
    var inquery = document.getElementById("userInput").value;
    $.ajax({
       type: "GET",
       data: { askedFor: inquery },
       url: '/searchTopics',
       success: function(data){
           document.getElementById('searchResults').innerHTML = data;
       }
   });
}