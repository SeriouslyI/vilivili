<?php 
function upload(){
	if (empty($_POST['username'])) {
		$GLOBALS['error_message'] = '请输入用户名';
		return;
	}
	if (empty($_POST['password'])) {
		$GLOBALS['error_message'] = '请输入密码';
		return;
	}
	if (empty($_POST['confirm'])) {
		$GLOBALS['error_message'] = '请确认密码';
		return;
	}
	if ($_POST['password'] !== $_POST['confirm']) {
		$GLOBALS['error_message'] = '两次输入密码不一致';
		return;
	}
	if(empty($_POST['email'])){
		$GLOBALS['error_message'] = '请输入邮箱';
		return;
	}
	if(!(isset($_POST['agree'])&&$_POST['agree']==='on')){
		$GLOBALS['error_message'] = '必须同意注册协议';
		return;
	}
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$id = md5(uniqid(md5(microtime(true)),true));
	$conn = mysqli_connect('127.0.0.1','root','123456','vilivili');
	$conn->query("SET NAMES utf8");
	if (!$conn) {
		$GLOBALS['error_message'] = '连接数据库失败';
		return;
	}

	$queryun = mysqli_query($conn,"select * from user where name = '{$username}'");
	
	if(!$queryun){
		$GLOBALS['error_message'] = '查询过程失败';
		return;
	}
	$rowun = mysqli_affected_rows($conn);
	if ($rowun>0) {
		$GLOBALS['error_message'] = '用户名已存在';
		return;
	}
	$queryue = mysqli_query($conn,"select * from user where u_email = '{$email}'");
	
	if(!$queryue){
		$GLOBALS['error_message'] = '查询过程失败';
		return;
	}
	$rowue = mysqli_affected_rows($conn);
	if ($rowue>0) {
		$GLOBALS['error_message'] = '该邮箱已经被使用了';
		return;
	}
	$queryan = mysqli_query($conn,"select * from admin where name = '{$username}'");
	
	if(!$queryan){
		$GLOBALS['error_message'] = '查询过程失败';
		return;
	}
	$rowan = mysqli_affected_rows($conn);
	if ($rowan>0) {
		$GLOBALS['error_message'] = '用户名已存在';
		return;
	}
	


	$sql = "insert into user values('{$id}','{$username}','{$password}','{$email}')";
	$query = mysqli_query($conn,$sql);
	if(!$query){
		$GLOBALS['error_message'] = '用户查询过程失败';
		return;
	}
	
	$rows = mysqli_affected_rows($conn);

	if($rows<1){
		$GLOBALS['error_message'] = '添加用户数据失败';
		return;
	}
	$sqlinf = "insert into inf (i_id,u_id,nickname,name,u_email)values('{$id}','{$id}','{$username}','{$username}','{$email}')";
	$queryinf = mysqli_query($conn,$sqlinf);
	if(!$queryinf){
		$GLOBALS['error_message'] = '信息查询过程失败';
		return;
	}
	$rowsinf = mysqli_affected_rows($conn);
	if($rowsinf<1){
		$GLOBALS['error_message'] = '添加信息数据失败';
		return;
	}

	
	mysqli_close($connection);
  	header('Location: login.php');

	}

	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		upload();
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Vilivili视频共享网站用户注册</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/loginRegister.css">
	<link rel="stylesheet" href="css/common.css">

</head>
<body>
	<div class="title-line">
		<span class="tit">注册</span>
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
				<input class="text box_com" type="text" placeholder="用户名" name="username" id="username">
			</div>
		</div>
		<div class="login-hidden-gruop" id="usernameerr">

		</div>
		<div class="login-hidden-gruop">
			
		</div>
		<div class="form-group">
			<div class="el-input">
				<input class="text box_com" type="password" placeholder="密码（6-16个字符组成，区分大小写）" name="password" id="password">
			</div>
		</div>
		<div class="login-hidden-gruop" id="passworderr">

		</div>
		<div class="form-group">
			<div class="el-input">
				<input class="text box_com" type="password" placeholder="确认密码" name="confirm" id="confirm">
			</div>
		</div>
		<div class="login-hidden-gruop" id="confirmerr">

		</div>
		<div class="form-group">
			<div class="el-input">
				<input class="text box_com" type="text" placeholder="填写常用邮箱" name="email" id="email">
			</div>
		</div>
		<div class="login-hidden-gruop" id="emailerr">
			
		</div>
		


		<div class="login-hidden-gruop">
			<label><input type="checkbox" name="agree" style="position: absolute; left: 0;"><a style="position: absolute; left: 20px;">同意协议</a></label>
		</div>
		
		


		<br>	
		<button class="regist_btn box_com" type="submit">注册</button>
		<br>
		<div class="login-hidden-gruop">
			<a href="login.php" class="login_back">已有账号，直接登录></a>
		</div>
		
	</form>
	</div>
</body>
<script src="js/jquery-1.8.2.min.js"></script>
<script src="js/registlogin.js"></script>
</html>