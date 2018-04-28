$(document).ready(function(){   
  $("div.maps-new-sy").mouseover(function(event){
    $(this).children("div.mapbox").css('display','block');
  });
  $("div.maps-new-sy").mouseout(function(event){
    $(this).children("div.mapbox").css('display','none');
  });  
});