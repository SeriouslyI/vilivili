<?php include 'php/common.php';?>
<?php include 'php/listall.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Vilivili视频共享网站</title>
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/index.css">
  <link href="http://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  

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
          <li style="border-bottom:2px solid hotpink"><a class="onpage" href="index.php">首页</a></li>
          <li><a href="dhindex.php">动画</a></li>
          <li><a href="fjindex.php">番剧</a></li>
          <li><a href="dyindex.php">电影</a></li>
        </ul>
    </div>
    <div class="slider-video">
			<div class="slider">
  				<ul>
            <?php while ($iteml = mysqli_fetch_assoc($queryl)):?>
  				  <li><a href="video.php?id=<?php echo $iteml['v_id'] ?>"><img src="<?php echo $iteml['v_pic'] ?>" alt=""></a></li>
            <?php endwhile ?>
  				</ul>
  				<!--箭头-->
  				<div class="arrow">
  				  <span class="arrow-left">&lt;</span>
  				  <span class="arrow-right">&gt;</span>
  				</div>
			</div>
      <div class="video-card-box">
        <?php while ($itemtj = mysqli_fetch_assoc($querytj)): ?>
          <div class="groom-module">
            <a href="video.php?id=<?php echo $itemtj['v_id'] ?>" target="_blank" title="<?php echo $itemtj['v_name'] ?>">
              <div class="lazy-img">
                <img src="<?php echo $itemtj['v_pic'] ?>" alt="$itemtj['v_name']">
              </div>
              <div class="card-mark">
                <p class="title"><?php echo $itemtj['v_name']; ?></p>
                <p class="author">up主：<?php echo $itemtj['v_up'] ?></p>
              </div>
            </a>
          </div>
        <?php endwhile ?>
      </div>
      </div>
      <div class="headline_clearfix" id="dh">
          <a href="dhindex.php" class="name">动画</a>
          <a href="dhindex.php" class="link_more" target="_blank">更多></a>
        </div>
        <div class="box_clearfix">
        <?php while ($itemdh = mysqli_fetch_assoc($querydh)): ?>
          <div class="card_live_module">
            <a href="video.php?id=<?php echo $itemdh['v_id']?>" target="_blank">
              <div class="pic">
                <div class="lazy-img">
                  <img src="<?php echo $itemdh['v_pic'] ?>" alt="<?php echo $itemdh['v_name'] ?>">
                </div>
              </div>
              <div class="cover-preview-module">
                <span class="dur">03:45</span>
              </div>
              <p title="<?php echo $itemdh['v_name'] ?>" class="t"><?php echo $itemdh['v_name']; ?></p>
            </a>
          </div>
        <?php endwhile ?>
      </div>
      <div class="headline_clearfix" id="fj">
          <a href="fjindex.php" class="name">番剧</a>
          <a href="fjindex.php" class="link_more" target="_blank">更多></a>
        </div>
        <div class="box_clearfix">
        <?php while ($itemfj = mysqli_fetch_assoc($queryfj)): ?>
          <div class="card_live_module">
            <a href="video.php?id=<?php echo $itemfj['v_id']?>" target="_blank">
              <div class="pic">
                <div class="lazy-img">
                  <img src="<?php echo $itemfj['v_pic'] ?>" alt="<?php echo $itemfj['v_name'] ?>">
                </div>
              </div>
              <div class="cover-preview-module">
                <span class="dur">03:45</span>
              </div>
              <p title="<?php echo $itemfj['v_name'] ?>" class="t"><?php echo $itemfj['v_name']; ?></p>
            </a>
          </div>
        <?php endwhile ?>
      </div>
      <div class="headline_clearfix" id="dy1">
          <a href="dyindex.php" class="name">电影</a>
          <a href="dyindex.php" class="link_more" target="_blank">更多></a>
        </div>
        <div class="dybox">
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
        <?php endwhile ?>
        </div>
        <div class="slide-btnprev" style="visibility: visible;">
          <img src="imgs/icon/slide_prev_btn.png" alt="">
          <img src="imgs/icon/slide_prev_bg.png" alt="">
        </div>
        <div class="slide-btnnext" style="visibility: visible;">
          <img src="imgs/icon/slide_next_btn.png" alt="">
          <img src="imgs/icon/slide_next_bg.png" alt="">
        </div>
        
      </div>
      <div class="no"></div>
      
		</div>
    <div class="nav-list">
    <ul>
      <li class="item_sortable" id="bdh">动画</a></li>
      <li class="item_sortable" id="bfj">番剧</a></li>
      <li class="item_sortable" id="bdy">电影</a></li>
      <li class="item_sortable" id="btop">顶部</a></li>
    </ul>
  </div>  
    </div>
	
</body>
<script src="js/jquery-1.8.2.min.js"></script>
<script src="js/index.js">
</script>
<script>
  
</script>
</html>