$(function () {
    
    var count = 0;
    setInterval(function(){
      count++;
      if(count == $(".slider li").length){
        count = 0;
      }

      //让count渐渐的显示，其他兄弟渐渐的隐藏
      $(".slider li").eq(count).fadeIn().siblings("li").fadeOut();
      
    },2000);
    $(".arrow-right").click(function () {
      count++;
      
      
      if(count == $(".slider li").length){
        count = 0;
      }
      //让count渐渐的显示，其他兄弟渐渐的隐藏
      $(".slider li").eq(count).fadeIn().siblings("li").fadeOut();
    });
    
    $(".arrow-left").click(function () {
      count--;
  
      if(count == -1){
        count = $(".slider li").length - 1;
      }
      //让count渐渐的显示，其他兄弟渐渐的隐藏
      $(".slider li").eq(count).fadeIn().siblings("li").fadeOut();
    });
    $(".center .onpage").parent().siblings().children().mouseover(function(){
      $(this).css("color","hotpink");
      $(this).parent().css("border-bottom","2px solid hotpink");
    });
    $(".center .onpage").parent().siblings().children().mouseout(function(){
      $(this).css("color","black");
      $(this).parent().css("border-bottom","2px solid #e5e9ef");
    });
    $(".groom-module .card-mark").mouseover(function(){
      $(".author").fadeIn(200);

    });
    $(".groom-module .card-mark").mouseout(function(){
      $(".author").css("display","none");
    });

    var dhtop = $('#dh').offset().top;
    var fjtop = $('#fj').offset().top;
    var dytop = $('#dy1').offset().top;
    $('#bdh').click(function(){
      $("html,body").stop().animate({scrollTop:dhtop});
    });
    $('#bfj').click(function(){
      $("html,body").stop().animate({scrollTop:fjtop});
    });
    $('#bdy').click(function(){
      $("html,body").stop().animate({scrollTop:dytop});
    });
    $('#btop').click(function(){
      $("html,body").stop().animate({scrollTop:0});
    });

    $("body").mouseover(function(){
    if($(".dy_in_box").offset().left>=0){
      $(".slide-btnprev").css("display","none");
      $(".dy_in_box").css("left",0);
    }
    if($(".dy_in_box").offset().left<0){
      $(".slide-btnprev").css("display","block");
    }
    if($(".dy_in_box").offset().left<=(-2000)) {
      $(".slide-btnnext").css("display","none");
    }
    if($(".dy_in_box").offset().left>(-2000)) {
      $(".slide-btnnext").css("display","block");
    }
    });


    var i=0;
    $(".slide-btnprev").click(function(){
      i++;
    if($(".dy_in_box").offset().left>=0){
      $(".slide-btnprev").css("display","none");
      $(".dy_in_box").css("left",0);
    }
    if($(".dy_in_box").offset().left<0){
      $(".slide-btnprev").css("display","block");
    }
      $(".slide-btnprev").css("display","block");
      $(".dy_in_box").stop().animate({left:i*220},500);
      $(".slide-btnprev").css("display","none");
    });

    $(".slide-btnnext").click(function(){
      i--;
    
    if($(".dy_in_box").offset().left<=(-2000)) {
      $(".slide-btnnext").css("display","none");
    }
    if($(".dy_in_box").offset().left>(-2000)) {
      $(".slide-btnnext").css("display","block");
    }
    $(".slide-btnnext").css("display","block");
    $(".dy_in_box").stop().animate({left:i*220},500);
    $(".slide-btnnext").css("display","none");
  });
    
  });
