<?php 
session_start();
function upload(){
	if (empty($_POST['username'])) {
		$GLOBALS['error_message'] = '请输入用户名';
		return;
	}
	if (empty($_POST['password'])) {
		$GLOBALS['error_message'] = '请输入密码';
		return;
	}
	$username = $_POST['username'];
	$password = $_POST['password'];
	$conn = mysqli_connect('127.0.0.1','root','123456','vilivili');
	$conn->query("SET NAMES utf8");
	if(!$conn){
		$GLOBALS['error_message'] = '连接数据库失败';
		return;
	}
	$sql = "select name,u_password from user where name = '{$username}' and u_password = '{$password}' limit 1;";
	$query = mysqli_query($conn,$sql);
	if(!$query){
		$GLOBALS['error_message'] = '查询过程失败1';
		return;
	}
	$rows = mysqli_affected_rows($conn);
	if($rows==1){
	mysqli_close($connection);
	$_SESSION['who'] = "{$username}";
  	header("Location: index.php");
	return;
	}else{
		
		$sqla = "select name,a_password from admin where name = '{$username}' and a_password = '{$password}' limit 1;";
		$querya = mysqli_query($conn,$sqla);
		if(!$querya){
		$GLOBALS['error_message'] = '查询过程失败2';
		return;
		}
		$rowsa = mysqli_affected_rows($conn);
		if($rowsa<1){
			$GLOBALS['error_message'] = '账号或密码输入有误';
			return;
		}
		mysqli_close($connection);
		$_SESSION['who'] = "{$username}";
  		header("Location: index.php");
  		
	
	}
	
	
}
	
	if($_SERVER['REQUEST_METHOD']==='POST'){
		upload();
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Vilivili视频共享网站登录</title>
	<link rel="stylesheet" href="css/loginRegister.css">
	<link rel="stylesheet" href="css/common.css">
</head>

<body>
	<div class="title-line">
		<span class="tit">登录</span>
	</div>
	<div class="center">
		<?php if (isset($error_message)):?>
      <div class="login-hidden-gruop cred">
        <?php echo $error_message; ?>
      </div>
    <?php endif ?>
	<form class="login-wrap-module" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<div class="form-group">
			<div class="el-input">
				<input class="text box_com" type="text" name="username" id="username" placeholder="用户名">
			</div>
		</div>
		<div class="login-hidden-gruop" id="usernameerr">

		</div>
		<div class="form-group">
			<div class="el-input">
				<input class="text box_com" type="password" name="password" id="password" placeholder="密码">
			</div>
		</div>
		<div class="login-hidden-gruop" id="passworderr">

		</div>
		<div class="login-hidden-gruop">
			<label><input type="checkbox" name="agree" value="true" style="position: absolute; left: 0;"><a style="position: absolute; left: 20px;">记住我</a></label>
			
		</div>
		<br>	
		<button class="login_btn box_com" type="submit">登录</button>
		<a href="register.php" class="register_btn box_com" type="submit">注册</a>
	</form>
	</div>
</body>
<script src="js/jquery-1.8.2.min.js"></script>
<script src="js/registlogin.js"></script>
</html>