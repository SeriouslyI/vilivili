<?php 
	if(empty($_POST['message'])||$_POST['message']==''){
		echo "<script>history.back();</script>";
		return;
	}

	if(empty($_GET['name'])){
		exit("404");
	}
	if(empty($_GET['v_id'])){
		exit("404");
	}
	if(empty($_GET['nickname'])){
		exit("404");
	}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    sendmessage();
  }
function sendmessage(){
	$message = $_POST['message'];
	$id = uniqid();
	$name = $_GET['name'];
	$v_id = $_GET['v_id'];
	$nickname = $_GET['nickname'];
	$avatar = $_GET['avatar'];
	$conn = mysqli_connect('127.0.0.1','root','123456','vilivili');
	$conn->query("SET NAMES utf8");
	if(!$conn){
    $GLOBALS['error_message'] = '连接数据库失败';
    return; 
    }
    $sql = "insert into message values('{$id}','{$message}','{$name}','{$v_id}','{$nickname}','{$avatar}')";
    $query = mysqli_query($conn,$sql);
    if(!$query){
    	$GLOBALS['error_message'] = '查询过程失败';
    	return;
    }
    mysqli_close($conn);
    echo "<script>history.back();</script>";
}