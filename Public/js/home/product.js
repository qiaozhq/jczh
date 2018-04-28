$(document).ready(function(){
$(".addtoCart").click(function(){
   var url = "/user/getlonginSts.html";
   var self = $(this);
    $.get(url,function(result){
        if(result=="no"){
            $("#loginImg").trigger("click");
        }else{
            var id = self.attr("attrid");
            var obj = $('div[attrid='+id+']');
            var productname = obj.find('a[name="productname"]').html();
            var productprice = obj.find('span[name="productprice"]').html();           
            var thumb = obj.find('img[name="thumb"]').attr('src');
            $('#modthumb').attr("src",thumb);
            $('#productid').html(id);
            $('#productmodl').find('span[name="name"]').html(productname);
            $('#productmodl').find('span[name="price"]').html(productprice);      
            $("#addtoCartP").trigger("click");
        }
    }); 
});
$("img").load(function () {
    //图片默认隐藏  
    $(this).hide();
    //使用fadeIn特效  
    $(this).stop().fadeIn("5000");
});
$(".scrollLoading").scrollLoading(); 
});
var product = {
    cart : function() {
        // 获取登录页面中的用户名 和 密码
        var id = $('#productid').html();
        var name = $('span[name="name"]').html();
        var price = $('span[name="price"]').html();
        var amount = $('input[name="amount"]').val();
        var thumb = $("#modthumb").attr("src");
        if(!amount) {
            dialog.error('数量不能为空');
            return;
        }
        var url = "/product/addToCart.html";
        var data = {'id':id,'name':name,'price':price,'amount':amount,"thumb":thumb};
        // 执行异步请求  $.post
        $.post(url,data,function(result){
            if(result.status == 0) {
                return dialog.error(result.message);
            }
            if(result.status == 1) {
                return dialog.success(result.message, '/product/index.html');
            }
        },'JSON');
    }
} 
$("#hide-left-img").click(function(){
    $("#hide-left").addClass("hide-left-cls");
    $("#hide-left").removeClass("show-left-cls");
    $("#show-left-img").css("left",0);
});

$("#show-left-img").click(function(){
    $("#hide-left").addClass("show-left-cls");
    $("#hide-left").removeClass("hide-left-cls");
    $("#show-left-img").css("left","-50px");
});


$('a[name=linkdetail]').click(function(event){
    for (var i = 0; i < $("#myTab").children().length; i++) {
        if($("#myTab").children().eq(i).attr('class')=='active'){
            var exp = new Date();
            exp.setTime(exp.getTime() + 60000);
            document.cookie = "lii="+i+";expires="+ exp.toGMTString();
        }
    };
    window.location.href="/product/detail/id/"+$(this).attr('linkid')+".html";
});

var lii=getCookie('lii')
if (lii!=null && lii!="") {
     $("#myTab").children().eq(lii).children().eq(0).trigger("click");
}

function getCookie(c_name)
{
if (document.cookie.length>0)
  {
  c_start=document.cookie.indexOf(c_name + "=")
  if (c_start!=-1)
    { 
    c_start=c_start + c_name.length+1 
    c_end=document.cookie.indexOf(";",c_start)
    if (c_end==-1) c_end=document.cookie.length
    return unescape(document.cookie.substring(c_start,c_end))
    } 
  }
return ""
}