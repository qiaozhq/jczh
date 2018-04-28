$("a.next").click(function(){
    var removeobj = $("div.lunbo-cont").children("div")[0];
    $("div.lunbo-cont").children("div")[0].remove();
    var afterobj=document.createElement("div");
    afterobj.id="tempid";
    // $('li.remove').replaceWith(removeobj); 
    $("div.lunbo-cont").append(afterobj);        // 追加新元素
    $("#tempid").replaceWith(removeobj); 
});