<?php include 'php/common.php';?>
<?php 
if (empty($_GET['id'])) {
  exit("<h1>没有传入参数</h1>");
}
$id = $_GET['id'];


listall();
function listall(){
  $conn = mysqli_connect('127.0.0.1','root','123456','vilivili');
  $conn->query("SET NAMES utf8");
    if(!$conn){
    $GLOBALS['error_message'] = '连接数据库失败';
    return; 
    }
  global $id;
  $sql = "select*from up_video where v_id = '{$id}'";
  $query = mysqli_query($conn,$sql);
  if(!$query){
    $GLOBALS['error_message'] = '查询过程失败1';
    return;
  }
  $row = mysqli_fetch_assoc($query);
  $GLOBALS['row'] = $row;
  $sqlup = "select*from inf where name = '{$row['name']}'";
  $queryup = mysqli_query($conn,$sqlup);
  if (!$queryup) {
    $GLOBALS['error_message'] = '查询过程失败2';
    return;
  }
  $rowup = mysqli_fetch_assoc($queryup);
  $GLOBALS['rowup'] = $rowup;
  $sqlm = "select*from message where v_id = '{$row['v_id']}'";
  $querym = mysqli_query($conn,$sqlm);
  if (!$querym){
    $GLOBALS['error_message'] = '查询过程失败3';
    return;
  }
  $GLOBALS['querym'] = $querym;
  global $rowi;
  
  
  $sqlf = "select*from follower where u_name='{$rowi['name']}'";
  $queryf = mysqli_query($conn,$sqlf);
  if (!$queryf) {
    $GLOBALS['error_message'] = '查询过程失败4';
    return;
  }
  while($rowf = mysqli_fetch_assoc($queryf)){
    $arr[] = $rowf['up_name'];
    $GLOBALS['arr'] = $arr;
  }
  $fl = '<a href="php/addfallower.php?up_name='.$rowup['name'].'&u_name='.$rowi['name'].'" class="bgcblue">+ 关注</a>';
  $GLOBALS['fl'] = $fl;
  $dontfl = '<a href="php/removefollower.php?u_name='.$rowi['name'].'&up_name='.$rowup['name'].'" class="bgcred">取消关注</a>';
  $GLOBALS['dontfl'] = $dontfl;
}


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $row['v_name']; ?></title>
	<link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/video.css">
</head>
<script src="js/jquery-1.8.2.min.js"></script>
<script src="js/common.js"></script>
<body>
	<div class="header">
		<div class="top">
			<div class="top_title">
        <div class="logo">
          <div class="logo_pic"><a href="index.php" >首页<img src="" alt=""></a></div>
        </div>
        <div class="ucenter">
          <div class="uitem" id="uitem1"><a href="<?php if(empty($_SESSION['who'])): ?> <?php echo 'login.php' ?> <?php endif ?> <?php if(!empty($_SESSION['who'])): ?> <?php echo 'information.php' ?><?php endif ?>" title="登录"><img src="<?php if(empty($avatar)): ?>imgs/icon/me.png<?php endif ?><?php if(!empty($avatar)): ?><?php echo $avatar ?><?php endif ?>" alt=""></a></div>

          <?php if(isset($utable)): ?>
            <?php echo $utable; ?>
            <?php endif ?>

          <?php if(isset($atable)): ?>
            <?php echo $atable; ?>
            <?php endif ?>

          <?php if(empty($_SESSION['who'])): ?>
            <?php echo $dl ?>
            <?php endif ?>
          <div class="uitem" id="dy"><a href="fallower.php">关注</a></div>
          <div class="uitem tg" id="tg"><a href="uploadvideo.php">投稿</a></div>
          
        </div>
				<div class="search">
    		    <form action="select.php" method="post">
    		        <input class="select" type="text" placeholder="请输入您要搜索的内容..." name="select">
    		        <input class="sbm" type="submit" value="搜索">
    		    </form>
    		</div>
			</div>
		</div>
    <div class="center">
      <table>
      <div class="l-con">
        <td>
        <div class="player-video">
          <video src="<?php echo $row['v_url'] ?>" preload="true">
            </video>
            <div class="player-video-control-mask">
              <div class="player-video-control-wrap">
                <div class="player-video-control">
                  <div class="player-video-control-top">
                    <div class="player-video-progress">
                      <div class="bar"></div>
                      <div class="loaded"></div>
                      <div class="elapse"></div>
                    </div>
                  </div>
                  <div class="player-video-control-bottom">
                    <div class="play"><img class="v-play" src="imgs/icon/bofangqi-bofang.png" alt=""><img class="v-stop" src="imgs/icon/bofangqi-zanting.png" alt=""></div>
                    <div class="player-video-time-wrap">
                      <div class="loadtime">00:00:00 /</div>
                      <div class="totalTime"></div>
                    </div>
                    <div class="fullscreen"><img class="v-full" src="imgs/icon/icon_quanping.png" alt=""><img class="v-nofull" src="imgs/icon/icon_quanpingquxiao.png" alt=""></div>
                    <div class="video-volumebar-wrp">
                      <div class="video-volumebar-slider">
                        <div class="video-volumebar-bar-none"></div>
                        <div class="video-volumebar-bar"></div>
                        <div class="video-volumebar-slider-voice"></div>
                      </div>
                    </div>
                    <div class="sound"><img src="imgs/icon/shengyin.png" alt=""></div>
                    
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="video-info">
          <h1 title="<?php echo $row['v_name'] ?>">
            <span><?php echo $row['v_name'] ?></span>
          </h1>
        </div>
        <div class="up-info">
          <div class="up-avatar">
            <img src="<?php echo $rowup['avatar'] ?>" alt="">
          </div>
          <div class="up-name">
            <span><?php echo $rowup['nickname']; ?></span>
          </div>
          <div class="up-signature">
            <span><?php echo $rowup['signature']; ?></span>
          </div>
          <div class="btn-followe">
            
          <?php if($rowup['name']==$rowi['name']): ?>
            <?php echo ""; ?>
          <?php endif ?>
          <?php if($rowup['name']!==$rowi['name']): ?>
            <?php if(!isset($arr)): ?>
              <?php echo $fl; ?>
            <?php endif ?>
            <?php  if(isset($arr)): ?>
            <?php if(in_array($rowup['name'], $arr)): ?>
            <?php echo $dontfl; ?>
            <?php endif ?>
            <?php if(!in_array($rowup['name'], $arr)): ?>
            <?php echo $fl; ?>
            <?php endif ?>
          <?php endif ?>
        <?php endif ?>
          </div>
        </div>
        <div class="b-head">
          <span>评论</span>
        </div>
        <div class="comment-send">
          <div class="my-avatar">
            <img src="<?php if (empty($_SESSION['who'])): ?><?php echo "imgs/icon/me.png" ?>
          <?php endif ?><?php if(!empty($_SESSION['who'])): ?><?php if(empty($rowi['avatar'])): ?><?php echo "imgs/icon/noface.gif" ?><?php endif ?><?php if(!empty($rowi['avatar'])): ?><?php echo $rowi['avatar']; ?><?php endif ?><?php endif ?>" alt="">
          </div>
          <div class="textarea-container">
            <form action="php/sendmessage.php?name=<?php echo $rowi['name']?>&v_id=<?php echo $row['v_id'] ?>&nickname=<?php echo $rowi['nickname'] ?>&avatar=<?php echo $rowi['avatar'] ?>" method="post">
            <textarea placeholder="<?php if(!empty($_SESSION['who'])): ?><?php echo "请自觉遵守互联网相关的政策法规，严禁发布色情、暴力、反动的言论。" ?><?php endif ?><?php if(empty($_SESSION['who'])): ?> <?php echo "登录后评论" ?><?php endif ?>" class="ipt-txt" name="message"></textarea>
            <button class="<?php if (empty($_SESSION['who'])): ?><?php echo "comment-submitdis" ?><?php endif ?><?php if(!empty($_SESSION['who'])): ?><?php echo "comment-submit" ?><?php endif ?>" type="submit" <?php if(empty($_SESSION['who'])): ?><?php echo "disabled='disabled'" ?><?php endif ?>>发表评论</button>
            </form>
          </div>
        </div>
        <div class="comment-list">
          <?php while ($rowm = mysqli_fetch_assoc($querym)): ?>
          <div class="list-item">
            <div class="message-avatar">
            <div class="my-avatar">
              <img src="<?php if(empty($rowm['avatar'])): ?><?php echo "imgs/icon/noface.gif" ?><?php endif ?><?php if(!empty($rowm['avatar'])): ?><?php echo $rowm['avatar'] ?><?php endif ?>" alt="">
            </div>
            <?php $mfl = '<a href="php/addfallower.php?up_name='.$rowm['name'].'&u_name='.$rowi['name'].'" class="bgcblue">关注</a>'; $mdontfl = '<a href="php/removefollower.php?u_name='.$rowi['name'].'&up_name='.$rowm['name'].'" class="bgcred">取关</a>'; ?>
              <?php if($rowm['name']==$rowi['name']): ?>
              <?php echo ""; ?>
              <?php endif ?>
              <?php if($rowm['name']!==$rowi['name']): ?>
                <?php if (!isset($arr)): ?>
                  <?php echo $mfl; ?>
                <?php endif ?>
                <?php if(isset($arr)): ?>
              <?php if(in_array($rowm['name'], $arr)): ?>
                <?php echo $mdontfl; ?>
              <?php endif ?>
              <?php if(!in_array($rowm['name'], $arr)): ?>
                <?php echo $mfl; ?>
              <?php endif ?>
                <?php endif ?>
            <?php endif ?>
            </div>
            <div class="con">
            <div class="user">
              <span><?php echo $rowm['nickname']; ?></span>
            </div>
            <p class="text"><?php echo $rowm['message'] ?></p>
            <?php if($rowm['name']==$rowi['name']): ?><a href="php/deletemsg.php?id=<?php echo $rowm['m_id'] ?>" style="color:#dc3545">[删除]</a>
            <?php endif ?>
            </div>
          </div>
        <?php endwhile ?>
        </div>
      </div>
      </td>
      <td>
      <div class="r-con">
        

      </div>
      </td>
      </table>
    </div>

	</div>
</body>
<script>
$(function(){
  var video = $("video")[0];
  $(".play").mouseover(function(){
    $(".v-play")[0].src="imgs/icon/bofangqi-bofanghover.png";
  });
  $(".play").mouseout(function(){
    $(".v-play")[0].src="imgs/icon/bofangqi-bofang.png";
  });
  $(".play").mouseover(function(){
    $(".v-stop")[0].src="imgs/icon/bofangqi-zantinghover.png";
  });
  $(".play").mouseout(function(){
    $(".v-stop")[0].src="imgs/icon/bofangqi-zanting.png";
  });
  $(".v-full").mouseover(function(){
    $(".v-full")[0].src="imgs/icon/icon_quanpinghover.png";
  });
  $(".v-full").mouseout(function(){
    $(".v-full")[0].src="imgs/icon/icon_quanping.png";
  });
  $(".sound").mouseover(function(){
    $(".sound img")[0].src="imgs/icon/shengyinhover.png";
  });
  $(".sound").mouseout(function(){
    $(".sound img")[0].src="imgs/icon/shengyin.png";
  });
  $(".v-play").click(function(){
    video.play();
    $(".v-play").css("display","none");
    $(".v-stop").css("display","block");
  });
  $(".v-stop").click(function(){
    video.pause();
    $(".v-stop").css("display","none");
    $(".v-play").css("display","block");
  });
  function requestFullScreen(elem){
    if(elem.requestFullScreen){
      elem.requestFullScreen();
    }else if(elem.webkitRequestFullScreen){
      elem.webkitRequestFullScreen();
    }else if(elem.mozRequestFullScreen){
      elem.mozRequestFullScreen();
    }else if(elem.msRequestFullScreen){
      elem.msRequestFullScreen();
    }
  }
  function exitFullScreen(elem){
    if(elem.exitFullScreen){
      elem.exitFullScreen();
    }else if(elem.webkitExitFullScreen){
      elem.webkitExitFullScreen();
    }else if(elem.mozExitFullScreen){
      elem.mozExitFullScreen();
    }else if(elem.msExitFullScreen){
      elem.msExitFullScreen();
    }
  }
  var video = $("video")[0];

  $(".v-full").click(function(){
    requestFullScreen(video);
  });
  function getResult(time){
    var hour = Math.floor(time/3600);
    hour = hour<10?"0"+hour:hour;
    var minute = Math.floor(time%3600/60);
    minute = minute<10?"0"+minute:minute;
    var second = Math.floor(time%60);
    second = second<10?"0"+second:second;
    return hour+":"+minute+":"+second;
  }
  video.oncanplay = function(){
    setTimeout(function(){
      video.style.display = "block";
      var total = video.duration;
      var result = getResult(total);
      $(".totalTime").html("&nbsp"+result);
      var percent = video.volume*100+"%";
      $(".video-volumebar-slider-voice").css("width",percent);
      $(".video-volumebar-bar").css("left",percent);

    });
  }
  video.ontimeupdate = function(){
    var current = video.currentTime;
    var result = getResult(current);
    $(".loadtime").html(result+"&nbsp"+'/');
    var percent = current/video.duration*100+"%";
    $(".elapse").css("width",percent);
    console.log(video.buffered);
  }
  $(".bar").click(function(e){
    var offset = e.offsetX;
    var percent = offset/$(this).width();
    var current = percent*video.duration;
    video.currentTime = current;
  });
    
  $(".video-volumebar-slider").mousedown(function(e){
    startX = e.offsetX;
    $(".video-volumebar-wrp").mousemove(function(e){
      moveX = e.offsetX;
      disX = moveX-startX;
      percent = (startX+disX)/$(".video-volumebar-slider").width()*100+"%";
      $(".video-volumebar-bar").css("left",percent);
      $(".video-volumebar-slider-voice").css("width",percent);

    });
    
  });
  $(".video-volumebar-slider").mouseup(function(e){
    $(".video-volumebar-bar").css("left",percent);
    $(".video-volumebar-slider-voice").css("width",percent);
    console.log(percent);
    var str=percent.replace("%","");
    str = str/100;
    video.volume=str;
    console.log(video.volume);
    $(".video-volumebar-wrp").unbind("mousemove");
  });
  
  video.onended = function(){
    video.currentTime=0;
    $(".v-play").css("display","block");
    $(".v-stop").css("display","none");
  }
});
  
</script>
</html>