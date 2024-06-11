<?php
  include('./dbconn.php');

  $id = $_POST['id'];
  $pw = $_POST['pw'];

  $sql = "select * from users where id='$id'";
  $result = mysqli_query($conn, $sql);

  if(!$result){
    echo "<scraipt>alert('존재하지 않는 아이디입니다.');</scraipt>";
    echo "<script>history.go(-1);</script>";
    exit;
  }else{
    $row = mysqli_fetch_assoc($result);
    if(!password_verify($pw, $row['password'])){
      echo "<script>alert('비밀번호가 일치하지 않습니다.');</script>";
      echo "<script>history.go(-1);</script>";
      exit;
    }
  }

  $_SESSION['ss_mb_id'] = $id;
  mysqli_close($conn);

  if(isset($_SESSION['ss_mb_id'])){
    echo "<script>alert('로그인 되었습니다.');</script>";
    echo "<script>location.replace('./index.html');</script>";
  }
?>