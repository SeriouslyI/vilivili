$(function(){
  console.log("首席设计师:lcy\nphp后端开发:lcy\nweb前端开发:lcy\n\n\n\n\n网页技术包含php,javascript,css3,html5,jquery\n联系方式:\nQQ:915067990\nemail(不定期使用):forlove655@yahoo.com\n电话号码:当然保密啦(╯‵□′)╯︵┻━┻");
    $('#uitem1').mouseover(function(){
      $(".ucenter .uitem img").stop().animate({width:"60px",height:"60px",top:"20px",border:"2px solid #fff"},300);
      $('#uitem1').stop().animate({right:"5px"},100);
      $(".profile-m").css("display","block");
    });
    $(".profile-m").mouseover(function(){
      $(".ucenter .uitem img").stop().animate({width:"60px",height:"60px",top:"20px",border:"2px solid #fff"},300);
      $('#uitem1').stop().animate({right:"5px"},100);
      $(".profile-m").css("display","block");
    });
    $(".profile-m").mouseout(function(){
      $(".ucenter .uitem img").stop().animate({width:"40px",height:"40px",top:"5px",border:"0px"},300);
      $('uitem1').stop().animate({right:"0px"},100);
      $(".profile-m").css("display","none");
    });
    $('#dy').mouseover(function(){
      $('#dy').css("background-color","hsla(0,0%,100%,.5)");
    });
    $('#dy').mouseout(function(){
      $('#dy').css("background-color","hsla(0,0%,100%,0)");
    });
    $('#jl').mouseover(function(){
      $('#jl').css("background-color","hsla(0,0%,100%,.5)");
    });
    $('#jl').mouseout(function(){
      $('#jl').css("background-color","hsla(0,0%,100%,0)");
    });
    $('#tg').mouseover(function(){
      $('#tg').css("background-color","#ff85ad");
    });
    $('#tg').mouseout(function(){
      $('#tg').css("background-color","#fb7299");
    });
});
    