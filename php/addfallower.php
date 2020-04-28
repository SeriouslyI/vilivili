<?php 
if (empty($_GET['up_name'])) {
  	exit("<h1>up</h1>");
}
if (empty($_GET['u_name'])) {
    echo "<script>history.back();</script>";
    return;
}
$id = uniqid();
$up_name = $_GET['up_name'];
$u_name = $_GET['u_name'];
$conn = mysqli_connect('127.0.0.1','root','123456','vilivili');
$conn->query("SET NAMES utf8");
    if(!$conn){
   		$GLOBALS['error_message'] = '连接数据库失败';
    }
    $sql = "insert into follower values('{$id}','{$u_name}','{$up_name}')";
    $query = mysqli_query($conn,$sql);
    if(!$query){
    	$GLOBALS['error_message'] = '查询过程失败';
    }
    mysqli_close($conn);
    echo "<script>history.back();</script>";