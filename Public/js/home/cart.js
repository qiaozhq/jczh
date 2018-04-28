$(document).ready(function(){
	var trList = $("#cartline").children("tr");
	var kingaku = 0;
for (var i=0;i<trList.length;i++) {
    var tdArr = trList.eq(i).find("td");
    var priceline = tdArr.eq(2).html();//金额
    var amountline = tdArr.eq(3).html();//数量	
    kingaku += parseInt(priceline)*parseInt(amountline);
}
$('span.sum').html(kingaku)
});
var SCOPE = {
'push_url' : '/product/generateOrder.html',
'jump_url' : '/product/index.html',
};