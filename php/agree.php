<?php  
if (empty($_GET['id'])) {
	exit("<h1>没有传入参数</h1>");
}
$id = $_GET['id'];
$conn = mysqli_connect('127.0.0.1','root','123456','vilivili');
$conn->query("SET NAMES utf8");
  if(!$conn){
    exit("<h1>数据库连接失败</h1>");
  }
  $sql = "update up_video set v_type = 1 where v_id = '{$id}'";
  $query = mysqli_query($conn,$sql);
  if(!$query){
  	exit("<h1>查询过程失败</h1>");
  }
  mysqli_close($conn);
  echo "<script>history.back();</script>";
