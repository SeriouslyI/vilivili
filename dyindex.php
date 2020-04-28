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
  $sql = "select*from up_video where v_class = 3 and v_type = 1";
  $query = mysqli_query($conn,$sql);
  $GLOBALS['query'] = $query;
  if(!$query){
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
          <li><a href="dhindex.php">动画</a></li>
          <li><a href="fjindex.php">番剧</a></li>
          <li style="border-bottom:2px solid hotpink"><a   class="onpage" href="dyindex.php">电影</a></li>
        </ul>
    </div>
    <div class="dy_in_box">
    <?php while ($item = mysqli_fetch_assoc($query)): ?>
          <div class="groom-module">
            <a href="video.php?id=<?php echo $item['v_id'] ?>" target="_blank" title="">
              <div class="lazy-img">
                <img src="<?php echo $item['v_pic'] ?>" alt="">
              </div>
              <div class="card-mark">
                <p class="title" style="font-size:15px"><?php echo $item['v_name'] ?></p>
                <p class="author">up:<?php echo $item['v_up'] ?></p>
              </div>
            </a>
          </div>
          <div class="clean"></div>
        <?php endwhile ?>
        </div>
  </div>
</div>
</body>
<script src="js/jquery-1.8.2.min.js"></script>
<script src="js/comindex.js">
</script>
</html>