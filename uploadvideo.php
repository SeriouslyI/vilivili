<?php include 'php/common.php';?>
<?php 
if (empty($_SESSION['who'])) {
	header('Location:index.php');
} 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	add_inf();
}
function add_inf(){
	global $rowi;
	if(empty($_FILES['video'])){
		$GLOBALS['error_message'] = '请选择视频';
		return;
	}
	if (empty($_FILES['video-pic'])) {
		$GLOBALS['error_message'] = '请选择视频封面';
		return; 
	}
	if (empty($_POST['title'])) {
		$GLOBALS['error_message'] = '请输入标题';
		return;
	}
	if (!isset($_POST['class'])) {
		$GLOBALS['error_message'] = '请选择上传视频类型';
		return;
	}
	$title = $_POST['title'];
	$up = $_SESSION['who'];
	$class = $_POST['class'];
	$name = $rowi['name'];
	$id = uniqid();
	$targetv = 'uploads/video/video-' . uniqid() . '.' . pathinfo($_FILES['video']['name'],PATHINFO_EXTENSION);
  	if(!move_uploaded_file($_FILES['video']['tmp_name'], $targetv)){
  		$GLOBALS['error_message'] = '上传视频文件失败';
  		return;
  	}
  	$targetp = 'uploads/poster/poster-' . uniqid() . '.' . pathinfo($_FILES['video-pic']['name'],PATHINFO_EXTENSION);
  	if(!move_uploaded_file($_FILES['video-pic']['tmp_name'], $targetp)){
  		$GLOBALS['error_message'] = '上传封面失败';
  		return;
  	}
  	$conn = mysqli_connect('127.0.0.1','root','123456','vilivili');
  	$conn->query("SET NAMES utf8");
  	if(!$conn){
    $GLOBALS['error_message'] = '连接数据库失败';
    return;
  	}
  	$sql = "insert into up_video values('{$id}','{$title}','{$targetv}','{$targetp}','{$up}','{$name}',{$class},0)";
  	$query = mysqli_query($conn,$sql);
  	if (!$query) {
  		$GLOBALS['error_message'] = '查询过程失败';
  		return;
  	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人信息</title>
	
	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/cominf.css">
	<link rel="stylesheet" href="css/uploadvideo.css">
	
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
				<span class="security-title">个人中心</span>
				<ul class="security-ul">
					<li class="security-list over" onclick="document.location.href='information.php'"><span class="security-nav-name">我的信息</span></li>
					<li class="security-list over" onclick="document.location.href='myvideo.php'"><span class="security-nav-name">我的投稿</span></li>
					<li class="security-list on" onclick="document.location.href='uploadvideo.php'"><span class="security-nav-name">投稿</span></li>
					<li class="security-list over" onclick="document.location.href='fallower.php'"><span class="security-nav-name">我的关注</span></li>
				</ul>
			</div>
			<div class="security-right">
				<div class="security-right-title">
					<span class="security-right-title-text">投稿</span>
				</div>
				<?php if (isset($error_message)):?>
    			  <div class="alert alert-warning">
    			    <?php echo $error_message; ?>
    			  </div>
    			<?php endif ?>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" id="inf" class="inf-form">
				<div class="form-group">
      			  <label for="video">视频</label>
      			  <input type="file" class="form-control" id="video" name="video" accept="video/*">
      			</div>
				<div class="avatar">
					<div class="avatar_nav">
						<label for="video-pic" class="first-change-lb">
							<img src="imgs/icon/donload.png" alt="">
						</label>
						<span class="">选择封面</span>
						<input type="file" id="video-pic" style="display: none;" name="video-pic" accept="image/*">
					</div>
				</div>
				<div class="form-group">
      			  <label for="title">标题</label>
      			  <input type="text" class="form-control" id="title" name="title">
      			</div>
      			<div class="form-group el-form-item_content">
      			  <label>up主:</label>
      			  	<div class="el-input">
						<span><?php echo $_SESSION['who']; ?></span>
					</div>
      			</div>
      			<div class="el-form-item_content">
					<label class="el-form-item_content">类型:</label>
					<div class="el-input">

						<label for="dh" class="el-radio-button is-active" id="dhlb">
						<input type="radio" class="" value="1" id="dh" style="display: none" name="class" checked="true">
						<span>动画</span>
					</label>
					<label for="fj" class="el-radio-button" id="fjlb">
						<input type="radio" class="" value="2" id="fj" style="display: none" name="class">
						<span>番剧</span>
					</label>
					<label for="dy" class="el-radio-button" id="dylb">
						<input type="radio" class="" value="3" id="dy" style="display: none" name="class">
						<span>电影</span>
					</label>		
					</div>
				</div>

				<button type="submit" class="btn_save">上传</button>
				</form>
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