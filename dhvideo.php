<?php include 'php/common.php';?>
<?php 
if (empty($_SESSION['who'])) {
	header('Location:index.php');
}
listall();
function listall(){
	global $rowi;
	$conn = mysqli_connect('127.0.0.1','root','123456','vilivili');
	$conn->query("SET NAMES utf8");
  	if(!$conn){
    $GLOBALS['error_message'] = '连接数据库失败';
    return;	
  	}
	$name = $rowi['name'];
	$sql = "select*from up_video where v_class = 1 and v_type = 1";
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
	<title>Document</title>
	
	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/cominf.css">
	<link rel="stylesheet" href="css/myvideo.css">
	<link rel="stylesheet" href="css/backstage.css">
	
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
			<div class="security-left">
				<span class="security-title">后台中心</span>
				<ul class="security-ul">
					<li class="security-list over" onclick="document.location.href='backstage.php'"><span class="security-nav-name">视频审核</span></li>
					<li class="security-list on" onclick="document.location.href='dhvideo.php'"><span class="security-nav-name">动画管理</span></li>
					<li class="security-list over" onclick="document.location.href='fjvideo.php'"><span class="security-nav-name">番剧管理</span></li>
					<li class="security-list over" onclick="document.location.href='dyvideo.php'"><span class="security-nav-name">电影管理</span></li>
				</ul>
			</div>
			<div class="security-right">
				<div class="security-right-title">
					<span class="security-right-title-text">动画管理</span>
				</div>
				<?php if (isset($error_message)):?>
    			  <div class="alert alert-warning">
    			    <?php echo $error_message; ?>
    			  </div>
    			<?php endif ?>
    			<?php while ($item = mysqli_fetch_assoc($query)): ?>
    				<div class="video">
						<div class="my-video">
							<div class="video-left">
						<div class="video-pic-box">
							<img src="<?php echo $item['v_pic'] ?>" class="video-pic">
						</div>
							</div>
						<div class="video-right">
						<div class="title">
							<span><?php echo $item['v_name']; ?></span>
						</div>
						<div class="up">
							<span>up:<?php echo $item['v_up']; ?></span>
						</div>
						<div class="up">
							<span>分类:<?php if ($item['v_class'] == 1): ?>
									<?php echo "动漫"; ?>
								<?php endif ?>
								<?php if ($item['v_class'] == 2): ?>
									<?php echo "番剧"; ?>
								<?php endif ?>
								<?php if ($item['v_class'] == 3): ?>
									<?php echo "电影"; ?>
								<?php endif ?>
							</span>
						</div>
						<div class="delete">
							<a href="php/delete.php?id=<?php echo $item['v_id']; ?>&v_url=<?php echo $item['v_url'] ?>&v_pic=<?php echo $item['v_pic'] ?>&v_type=<?php echo $item['v_type'] ?>">删除</a>
						</div>
						</div>
						</div>
					</div>
    			<?php endwhile ?>
				
			</div>
		</div>
		</div>
			
</body>

<script>
$(function(){
	$(".el-radio-button").click(function(){
		$(this).addClass("is-active");
		$(this).siblings().removeClass("is-active");
		$(this).find('input').attr("checked","checked");
		$(this).siblings().find('input').removeAttr("checked");
	});
});
</script>
</html>