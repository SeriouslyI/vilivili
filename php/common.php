<?php
  session_start();
if(empty($_SESSION['who'])){
    $GLOBALS['dl'] = '<div class="profile-m" style="display: none">
            <div class="header-u-info1">
              <div class="header-uname1">
                <d style="font-size: 14px">登录使用更多功能</d>
              </div>
            </div>
            <div class="member-bottom">
              
            </div>
          </div>';

  }else {
    
    who();
  }
  function who(){
    
    $who = $_SESSION['who'];

    $conn = mysqli_connect('127.0.0.1','root','123456','vilivili');
    $conn->query("SET NAMES utf8");
    if(!$conn){
      $GLOBALS['error_message'] = '连接数据库失败';
    return;
  }
    $sqlu = "select u_id from user where name = '{$who}' limit 1;";
    $queryu = mysqli_query($conn,$sqlu);
    if(!$queryu){
      $GLOBALS['error_message'] = '查询过程失败1';
      return;
  }
    $rowsu = mysqli_affected_rows($conn);
    if($rowsu==1){
      $row = mysqli_fetch_assoc($queryu);
      $id = $row['u_id'];

      $sql = "select*from inf where u_id = '{$id}' limit 1;";
      $query = mysqli_query($conn,$sql);
      
    if (!$query) {
      $GLOBALS['error_message'] = '查询过程失败3';
      return;
    }
    $rowi = mysqli_fetch_assoc($query);
    if(empty($rowi['avatar'])){
      $GLOBALS['avatar'] = 'imgs/icon/noface.gif';
    }
    else{
      $GLOBALS['avatar'] = $rowi['avatar'];
    }
    $GLOBALS['rowi']=$rowi;
    $GLOBALS['id'] = $id;
    $GLOBALS['utable'] = '
    <div class="profile-m" style="display: none">
            <div class="header-u-info">
              <div class="header-uname">
                <d style="font-size: 14px">'.$rowi['nickname'].'</d>
              </div>
              
            </div>
            <div class="member-menu">
                <ul class="clearfix">
                  <li><a href="information.php">个人中心</a></li>
                  <li><a href="myvideo.php">我的投稿</a></li>
                </ul>
              </div>
            <div class="member-bottom">
              <a href="php\logout.php" class="logout" id="logout">退出</a>
            </div>
          </div>';
    mysqli_close($conn);
    return;
  }else{
    
    $sqla = "select a_id from admin where name='{$who}' limit 1;";
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

      $row = mysqli_fetch_assoc($querya);
      $id = $row['a_id'];
      $sql = "select*from inf where a_id = '{$id}' limit 1;";
      $query = mysqli_query($conn,$sql);
      if (!$query) {
      $GLOBALS['error_message'] = '查询过程失败3';
      return;
    }
    $rowi = mysqli_fetch_assoc($query);
    if(empty($rowi['avatar'])){
      $GLOBALS['avatar'] = 'imgs/icon/noface.gif';
    }
    else{
      $GLOBALS['avatar'] = $rowi['avatar'];
    }
    $GLOBALS['rowi'] = $rowi;
    $GLOBALS['id'] = $id;
    $GLOBALS['atable'] = '
  <div class="profile-m" style="display: none">
            <div class="header-u-info">
              <div class="header-uname">
                <d style="font-size: 14px">'.$rowi['nickname'].'</d>
              </div>
              
            </div>
            <div class="member-menu">
                <ul class="clearfix">
                  <li><a href="information.php">个人中心</a></li>
                  <li><a href="myvideo.php">我的投稿</a></li>
                  <li><a href="backstage.php">进入后台</a></li>
                </ul>
              </div>
            <div class="member-bottom">
              <a href="php\logout.php" class="logout">退出</a>
            </div>
          </div>
  ';
  mysqli_close($conn);

  }

  
}