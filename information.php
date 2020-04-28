<?php include 'php/common.php';?>
<?php 
if (empty($_SESSION['who'])) {
	header('Location:index.php');
} 
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    add_inf();
  }
function add_inf(){
global $rowi;

 if(!isset($_POST['sex'])){
    	$sex = -1;
  }else{
  	$sex = $_POST['sex'];
  }
  $nickname = $_POST['nickname'];
  $signature = $_POST['signature'];
  $birthday = $_POST['birthday'];
  if (empty($_FILES['avatar']['name'])) {
  	$target = $rowi['avatar'];
  }else{
  	$target = 'uploads/avatar/avatar-' . uniqid() . '.' . pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);
  	move_uploaded_file($_FILES['avatar']['tmp_name'], $target);
  }
	$avatar = $target;

  
  
  $conn = mysqli_connect('127.0.0.1','root','123456','vilivili');
  $conn->query("SET NAMES utf8");
  if(!$conn){
    $GLOBALS['error_message'] = '连接数据库失败';
    return;
  }
  global $id;
  global $rowi;
  $sql = "update inf set nickname='{$nickname}',signature='{$signature}',sex='{$sex}',birthday='{$birthday}',avatar='{$avatar}'where i_id='{$id}';";
  $query = mysqli_query($conn,$sql);
  if (!$query) {
  	$GLOBALS['error_message'] = '查询过程失败';
  	return;
  }
  $row = mysqli_affected_rows($conn);
  if ($row<1) {
  	$GLOBALS['error_message'] = '保存信息失败';
  	return;
  }
  $sqlm = "update message set nickname='{$nickname}',avatar='{$avatar}' where name='{$rowi['name']}'";
  $querym = mysqli_query($conn,$sqlm);
  if(!$querym){
  	$GLOBALS['error_message'] = '保存信息失败2';
  	return;
  }
  mysqli_close($conn);
  header('Location: '.$_SERVER['PHP_SELF'].'');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人信息</title>
	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/cominf.css">
	<link rel="stylesheet" href="css/inf.css">
	
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
					<li class="security-list on" onclick="window.location.href='information.php'"><span class="security-nav-name">我的信息</span></li>
					<li class="security-list over" onclick="document.location.href='myvideo.php'"><span class="security-nav-name">我的投稿</span></li>
					<li class="security-list over" onclick="window.location.href='uploadvideo.php'"><span class="security-nav-name">投稿</span></li>
					<li class="security-list over" onclick="document.location.href='fallower.php'"><span class="security-nav-name">我的关注</span></li>
					
				</ul>
			</div>
			<div class="security-right">
				<div class="security-right-title">
					<span class="security-right-title-text">我的信息</span>
				</div>
				<?php if (isset($error_message)):?>
    			  <div class="alert alert-warning">
    			    <?php echo $error_message; ?>
    			  </div>
    			<?php endif ?>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" id="inf">
				<div class="avatar">
					<div class="avatar_nav">
						<label for="file_input" class="first-change-lb">
							<img src="<?php if(empty($avatar)): ?>imgs/icon/me.png<?php endif ?><?php if(!empty($avatar)): ?><?php echo $avatar ?><?php endif ?>" alt="">
						</label>
						<span class="">选择头像</span>
						<input type="file" id="file_input" style="display: none;" onchange="document.getElementById('inf').submit()" name="avatar" accept="image/*">
					</div>
				</div>
				<div class="el-form-item_content">
					<label for="el-form-item_label">昵称:</label>
					<div class="el-input">
						<input type="text" class="el-input__inner" placeholder="你的昵称" value="<?php echo $rowi['nickname'] ?>" name="nickname">
					</div>
				</div>
				<div class="el-form-item_content">
					<label for="el-form-item_label">用户名:</label>
					<div class="el-input">
						<span><?php echo $_SESSION['who']; ?></span>
					</div>
				</div>
				<div class="el-form-item_content qm">
					<label for="el-form-item_label">我的签名:</label>
					<div class="el-input">
						<textarea type="text" class="el-textarea_inner" placeholder="设置您的签名- ( ゜- ゜)つロ" name="signature"><?php echo $rowi['signature']; ?></textarea>
					</div>
				</div>
				<div class="el-form-item_content">
					<label for="" class="el-form-item_content">性别:</label>
					<div class="el-input">

						<label for="man" class="el-radio-button" id="manlb">
						<input type="radio" class="" value="1" id="man" style="display: none" name="sex" checked="<?php if($rowi['sex'] == 1): ?><?php echo 'true' ?><?php endif ?>" boxcol="<?php echo $rowi['sex'] ?>">
						<span>男</span>
					</label>
					<label for="woman" class="el-radio-button" id="womanlb">
						<input type="radio" class="" value="0" id="woman" style="display: none" name="sex" checked="<?php if($rowi['sex'] == 0): ?><?php echo 'true' ?><?php endif ?>">
						<span>女</span>
					</label>	
					<label for="noone" class="el-radio-button" id="noonelb">
						<input type="radio" class="" value="-1" id="noone" style="display: none" name="sex" checked="<?php if($rowi['sex'] == -1||empty($rowi['sex'])): ?><?php echo 'true' ?><?php endif ?>">
						<span>保密</span>
					</label>		
					</div>
				</div>
				<div class="el-form-item_content">
					<label for="el-form-item_label">出生日期:</label>
					<div class="el-input">
						<input type="date" class="el-input__inner" style="color: #898989" value="<?php echo $rowi['birthday'] ?>" name="birthday">
					</div>
				</div>
				<button type="submit" class="btn_save">保存</button>
				</form>
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