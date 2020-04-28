<?php include 'php/common.php';?>
<?php 
if (empty($_SESSION['who'])) {
	header('Location:index.php');
}
$conn = mysqli_connect('127.0.0.1','root','123456','vilivili');
  $conn->query("SET NAMES utf8");
    if(!$conn){
    $GLOBALS['error_message'] = '连接数据库失败';
    }
    global $rowi;
  $sql = "select*from inf,follower where up_name = name and u_name='{$rowi['name']}'";
  $query = mysqli_query($conn,$sql);
  if (!$query){
    $GLOBALS['error_message'] = '查询过程失败3';
  }
  $GLOBALS['query'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人信息</title>
	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/cominf.css">
	<link rel="stylesheet" href="css/fallower.css">
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
					<li class="security-list over" onclick="window.location.href='information.php'"><span class="security-nav-name">我的信息</span></li>
					<li class="security-list over" onclick="document.location.href='myvideo.php'"><span class="security-nav-name">我的投稿</span></li>
					<li class="security-list over" onclick="window.location.href='uploadvideo.php'"><span class="security-nav-name">投稿</span></li>
					<li class="security-list on" onclick="document.location.href='fallower.php'"><span class="security-nav-name">我的关注</span></li>
					
				</ul>
			</div>
			<div class="security-right">
				<div class="security-right-title">
					<span class="security-right-title-text">我的关注</span>
				</div>
				<?php if (isset($error_message)):?>
    			  <div class="alert alert-warning">
    			    <?php echo $error_message; ?>
    			  </div>
    			<?php endif ?>
    			<?php while ($row = mysqli_fetch_assoc($query)): ?>
    			<div class="up-info">
          			<div class="up-avatar">
          			  <img src="<?php echo $row['avatar'] ?>">
          			</div>
          			<div class="up-name">
          			  <span><?php echo $row['nickname']; ?></span>
          			</div>
          			<div class="up-signature">
          			  <span><?php echo $row['signature']; ?></span>
          			</div>
          			<div class="dontfl">
          				<a href="php/removefollower.php?u_name=<?php echo $row['u_name']; ?>&up_name=<?php echo $row['up_name']; ?>">取消关注</a>
          			</div>
        		</div>
				<?php endwhile ?>
			</div>
		</div>
		</div>
			
</body>

<script>
$(function(){
	if($('#man').attr('boxcol') == 1){
		$('#manlb').addClass("is-active");
		$('#manlb').siblings().removeClass("is-active");
	}if($('#man').attr('boxcol') == 0){
		$('#womanlb').addClass("is-active");
		$('#womanlb').siblings().removeClass("is-active");
	}if($('#man').attr('boxcol') ==-1||$('#man').attr('boxcol') ==''){
		$('#noonelb').addClass("is-active");
		$('#noonelb').siblings().removeClass("is-active");
	}
	$(".el-radio-button").click(function(){
		$(this).addClass("is-active");
		$(this).siblings().removeClass("is-active");
		$(this).find('input').attr("checked","checked");
		$(this).siblings().find('input').removeAttr("checked");
	});
});
</script>
</html>