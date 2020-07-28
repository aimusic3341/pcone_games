<?php
    require 'config.php';
    $connect = mysqli_connect($host,$user,$pass) or die("connect_error".mysqli_error());
    mysqli_select_db($connect,$dbname)or die("connect_error".mysqli_error());

    mysqli_query($connect,"set name utf8");
    mysqli_query($connect,"SET collation_connection =utf8_general_ci");

    $ID = $_POST['ID'];
   $password = $_POST['password'];

    $check = "SELECT * FROM user_info WHERE ID = '$ID'";
    $check_result = mysqli_query($connect,$check)or die('ERROR'.mysqli_error());
    $check_line = mysqli_num_rows($check_result);
    if($check_line == 0)
    {
        echo "<script>alert(\"此帳號尚未註冊哦!\"); history.go(-1);</script>";
        die;
    }

   $query = "SELECT ID FROM user_info WHERE ID ='$ID' AND password = '$password'";

   $result = mysqli_query($connect,$query)or die('Error');
   $result_check_line = mysqli_num_rows($result);

   if($result_check_line != 0)
   {
       session_start();
       $_SESSION['tmp_TID']=$ID;
       echo "<script>alert(\"登入成功!\");  parent.location.href='homepage.php';</script>";
   }
   else
   {
       echo "<script>alert(\"帳號或密碼錯誤!\"); history.go(-1);</script>";
       die;
   }
?>