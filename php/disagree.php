<?php 
if (empty($_GET['id'])) {
	exit("<h1>没有传入参数</h1>");
}
if (empty($_GET['v_url'])) {
	exit("<h1>没有传入url参数</h1>");
}
$id = $_GET['id'];
$v_url = $_GET['v_url'];
  if(!unlink("../{$v_url}")){
  	exit("<h1>删除视频失败</h1>");
  }
  $conn = mysqli_connect('127.0.0.1','root','123456','vilivili');
  $conn->query("SET NAMES utf8");
  if(!$conn){
    exit("<h1>数据库连接失败</h1>");
  }
  $sql = "update up_video set v_type = 2 where v_id = '{$id}'";
  $query = mysqli_query($conn,$sql);
  if(!$query){
  	exit("<h1>查询过程失败</h1>");
  }
  echo "<script>history.back();</script>";