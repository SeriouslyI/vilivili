<?php 
if(empty($_GET['u_name'])){
	exit("<h1>没有传入参数</h1>");
}
if(empty($_GET['up_name'])){
    exit("<h1>没有传入参数</h1>");
}
$u_name = $_GET['u_name'];
$up_name = $_GET['up_name'];
$conn = mysqli_connect('127.0.0.1','root','123456','vilivili');
  $conn->query("SET NAMES utf8");
    if(!$conn){
    	exit("<h1>连接数据库失败</h1>");
    }
    $sql = "delete from follower where u_name = '{$u_name}' and up_name='{$up_name}'";
    $query = mysqli_query($conn,$sql);
    if(!$query){
    	exit("<h1>查询过程失败</h1>");
    }
    mysqli_close($conn);
    echo "<script>history.back();</script>";