$(document).ready(function(){
   var url = "/user/getlonginSts.html";
    $.get(url,function(result){
        if(result=="no"){
            window.location = "/index.html";
        }else{

        }
    }); 
});