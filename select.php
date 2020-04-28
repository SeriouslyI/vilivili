<?php include 'php/common.php';?>
<?php 
if (empty($_POST['select'])) {
  echo "<script>history.back();</script>";
  return;
}else{
  $select = $_POST['select'];
  listall();
}

function listall(){
  global $select;
  global $rowi;
  $conn = mysqli_connect('127.0.0.1','root','123456','vilivili');
  $conn->query("SET NAMES utf8");
    if(!$conn){
    $GLOBALS['error_message'] = '连接数据库失败';
    return; 
    }
  $sqldh = "select*from up_video where v_class=1 and v_type = 1 and v_name like '%{$select}%'";
  $querydh = mysqli_query($conn,$sqldh);
  $GLOBALS['querydh'] = $querydh;
  if(!$querydh){
    $GLOBALS['error_message'] = '查询过程失败';
    return;
  }
  $sqlfj = "select*from up_video where v_class=2 and v_type = 1 and v_name like '%{$select}%'";
  $queryfj = mysqli_query($conn,$sqlfj);
  $GLOBALS['queryfj'] = $queryfj;
  if(!$queryfj){
    $GLOBALS['error_message'] = '查询过程失败';
    return;
  }
  $sqldy = "select*from up_video where v_class=3 and v_type = 1 and v_name like '%{$select}%'";
  $querydy = mysqli_query($conn,$sqldy);
  $GLOBALS['querydy'] = $querydy;
  if(!$querydy){
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
          <li style="border-bottom:2px solid hotpink"><a  class="onpage" href="fjindex.php">搜索</a></li>
        </ul>
    </div>
    <div class="box_clearfix">
    <?php while($rowdh =mysqli_fetch_assoc($querydh)): ?>
          <div class="card_live_module">
            <a href="video.php?id=<?php echo $rowdh['v_id'] ?>" target="_blank">
              <div class="pic">
                <div class="lazy-img">
                  <img src="<?php echo $rowdh['v_pic'] ?>" alt="<?php echo $rowdh['v_name'] ?>">
                </div>
              </div>
              <div class="cover-preview-module">
                <span class="dur">03:45</span>
              </div>
              <p title="<?php echo $rowdh['v_name'] ?>" class="t"><?php echo $rowdh['v_name']; ?></p>
            </a>
          </div>
        <?php endwhile ?>
        </div>
        <div class="box_clearfix">
    <?php while($rowfj =mysqli_fetch_assoc($queryfj)): ?>
          <div class="card_live_module">
            <a href="video.php?id=<?php echo $rowfj['v_id'] ?>" target="_blank">
              <div class="pic">
                <div class="lazy-img">
                  <img src="<?php echo $rowfj['v_pic'] ?>" alt="<?php echo $rowfj['v_name'] ?>">
                </div>
              </div>
              <div class="cover-preview-module">
                <span class="dur">03:45</span>
              </div>
              <p title="<?php echo $rowfj['v_name'] ?>" class="t"><?php echo $rowfj['v_name']; ?></p>
            </a>
          </div>
        <?php endwhile ?>
        </div>
        <div class="dy_in_box">
    <?php while ($rowdy = mysqli_fetch_assoc($querydy)): ?>
          <div class="groom-module">
            <a href="video.php?id=<?php echo $rowdy['v_id'] ?>" target="_blank" title="">
              <div class="lazy-img">
                <img src="<?php echo $rowdy['v_pic'] ?>" alt="">
              </div>
              <div class="card-mark">
                <p class="title" style="font-size:15px"><?php echo $rowdy['v_name'] ?></p>
                <p class="author">up:<?php echo $rowdy['v_up'] ?></p>
              </div>
            </a>
          </div>
        <?php endwhile ?>
        </div>
  </div>
</div>
</body>
<script src="js/jquery-1.8.2.min.js"></script>
</script>
<script>
  
</script>
</html>