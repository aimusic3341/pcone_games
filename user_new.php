<?php
    require 'config.php';
    $connect = mysqli_connect($host,$user,$pass) or die("connect_error".mysqli_error());
    mysqli_select_db($connect,$dbname)or die("connect_error".mysqli_error());

    mysqli_query($connect,"set name utf8");
    mysqli_query($connect,"SET collation_connection =utf8_general_ci");

    $ID = $_POST['ID'];
   $password = $_POST['password'];

   $check = "SELECT * FROM user_info WHERE ID = '$ID'"; //確認帳號是否存在
   $check_result = mysqli_query($connect,$check)or die('ERROR'.mysqli_error());
   $check_line = mysqli_num_rows($check_result);
   if($check_line >= 1)
   {
        echo "<script>alert(\"此帳號已經有人註冊囉!\"); history.go(-1);</script>";
        die;
   }

    $query = "INSERT INTO user_info(ID,password) VALUES ('$ID','$password')"; //新增帳號
    $result = mysqli_query($connect,$query)or die("Error".mysqli_error());

    $find_query = "SELECT * FROM user_info WHERE ID ='$ID'"; //顯示加入
    $find_result = mysqli_query($connect,$find_query)or die('Error'.mysqli_error());
    $find_result_check_line = mysqli_num_rows($find_result);

    if($find_result_check_line != 0)
    {
        session_start();
        $_SESSION['tmp_TID']=$ID;
        echo "<script>alert(\"註冊成功!歡迎您的加入!\"); parent.location.href='homepage.php'; </script>";
    }
?>