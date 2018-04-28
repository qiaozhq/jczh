$(document).ready(function(){
   var url = "/user/getlonginSts.html";
    $.get(url,function(result){
        if(result=="no"){
            $("#userinImg").css("display","none");
            $("#loginImg").css("display","inline");
        }else{
            $("#loginImg").css("display","none");
            $("#userinImg").css("display","inline");
        }
    }); 
});  