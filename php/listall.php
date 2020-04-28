<?php
listall();
function listall(){
  global $rowi;
  $conn = mysqli_connect('127.0.0.1','root','123456','vilivili');
  $conn->query("SET NAMES utf8");
    if(!$conn){
    $GLOBALS['error_message'] = '连接数据库失败';
    return; 
    }
  $sqll = "select*from up_video where v_class = 1 and v_type = 1 limit 6";
  $queryl = mysqli_query($conn,$sqll);
  $GLOBALS['queryl'] = $queryl;
  if(!$queryl){
    $GLOBALS['error_message'] = '查询过程失败';
    return;
  }
  $sqltj = "select*from up_video where v_class = 1 and v_type = 1 limit 9";
  $querytj = mysqli_query($conn,$sqltj);
  $GLOBALS['querytj'] = $querytj;
  if(!$querytj){
    $GLOBALS['error_message'] = '查询过程失败';
    return;
  }
  $sqldh = "select*from up_video where v_class = 1 and v_type = 1 limit 14";
  $querydh = mysqli_query($conn,$sqldh);
  $GLOBALS['querydh'] = $querydh;
  if(!$querydh){
    $GLOBALS['error_message'] = '查询过程失败';
    return;
  }
  $sqlfj = "select*from up_video where v_class = 2 and v_type = 1 limit 14";
  $queryfj = mysqli_query($conn,$sqlfj);
  $GLOBALS['queryfj'] = $queryfj;
  if(!$queryfj){
    $GLOBALS['error_message'] = '查询过程失败';
    return;
  }
  $sql = "select*from up_video where v_class = 3 and v_type = 1 limit 18";
  $query = mysqli_query($conn,$sql);
  $GLOBALS['query'] = $query;
  if(!$query){
    $GLOBALS['error_message'] = '查询过程失败';
    return;
  }

}