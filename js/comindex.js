$(function{
	$(".center .onpage").parent().siblings().children().mouseover(function(){
      $(this).css("color","hotpink");
      $(this).parent().css("border-bottom","2px solid hotpink");
    });
    $(".center .onpage").parent().siblings().children().mouseout(function(){
      $(this).css("color","black");
      $(this).parent().css("border-bottom","2px solid #e5e9ef");
    });
    
});