<?php include 'php/common.php';?>
<?php
listall();
function listall(){
  global $rowi;
  $conn = mysqli_connect('127.0.0.1','root','123456','vilivili');
  $conn->query("SET NAMES utf8");
    if(!$conn){
    $GLOBALS['error_message'] = '连接数据库失败';
    return; 
    }
  $sqldh = "select*from up_video where v_class = 1 and v_type = 1";
  $querydh = mysqli_query($conn,$sqldh);
  $GLOBALS['querydh'] = $querydh;
  if(!$querydh){
    $GLOBALS['error_message'] = '查询过程失败';
    return;
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Vilivili视频共享网站</title>
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/comindex.css">
</head>

<script src="js/jquery-1.8.2.min.js"></script>
<script src="js/common.js"></script>
<script>
$(function(){
	$(".slider li:first-child").css("display","block");
});
</script>
<body>
	<div class="header">
		<img src="imgs/1.png" alt="" style="position: absolute;top:0;">
		<div class="top">
			<div class="top_title">
        <div class="logo">
          <div class="logo_pic"><a href="index.php" >首页<img src="" alt=""></a></div>
        </div>
        <div class="ucenter">
          <div class="uitem" id="uitem1"><a href="<?php if(empty($_SESSION['who'])): ?> <?php echo 'login.php' ?> <?php endif ?> <?php if(!empty($_SESSION['who'])): ?> <?php echo 'information.php' ?><?php endif ?>"><img src="<?php if(empty($avatar)): ?>imgs/icon/me.png<?php endif ?><?php if(!empty($avatar)): ?><?php echo $avatar ?><?php endif ?>" alt=""></a></div>
          
          <?php if(isset($utable)): ?>
            <?php echo $utable; ?>
            <?php endif ?>

          <?php if(isset($atable)): ?>
            <?php echo $atable; ?>
            <?php endif ?>

          <?php if(empty($_SESSION['who'])): ?>
            <?php echo $dl; ?>
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
      <div class="nav">
        <ul>
          <li><a href="index.php">首页</a></li>
          <li style="border-bottom:2px solid hotpink"><a class="onpage" href="dhindex.php">动画</a></li>
          <li><a href="fjindex.php">番剧</a></li>
          <li><a href="dyindex.php">电影</a></li>
        </ul>
    </div>
    <div class="box_clearfix">
    <?php while ($itemdh = mysqli_fetch_assoc($querydh)): ?>
          <div class="card_live_module">
            <a href="video.php?id=<?php echo $itemdh['v_id'] ?>" target="_blank">
              <div class="pic">
                <div class="lazy-img">
                  <img src="<?php echo $itemdh['v_pic'] ?>" alt="<?php echo $itemdh['v_name'] ?>">
                </div>
              </div>
              <div class="cover-preview-module">
                <span class="dur">03:45</span>
              </div>
              <p title="<?php echo $itemdh['v_name'] ?>" class="t"><?php echo $itemdh['v_name'] ?></p>
            </a>
          </div>
        <?php endwhile ?>
        </div>
  </div>
</div>
</body>
<script src="js/jquery-1.8.2.min.js"></script>
<script src="js/comindex.js">
</script>
<script>
  
</script>
</html>