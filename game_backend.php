<?php
    require 'config.php';
    $connect = mysqli_connect($host,$user,$pass) or die("connect_error".mysqli_error());
    mysqli_select_db($connect,$dbname)or die("connect_error".mysqli_error());

    mysqli_query($connect,"set name utf8");
    mysqli_query($connect,"SET collation_connection =utf8_general_ci");

    $game_type = $_POST['game_type'];
    $score = $_POST['user_score'];
    $coupon_type = $_POST['coupon_type'];
    $coupon = $_POST['coupon'];

    session_start();

    if(isset($_SESSION['tmp_TID']))
    {
        $t_ID = $_SESSION['tmp_TID'];

        echo $t_ID;
        echo $game_type;
        echo $score;
        echo $coupon_type;
        echo $coupon;

        $check_score_new = "SELECT * FROM user_game WHERE ID = '$t_ID' AND game_type = '$game_type'";
        $check_score_new_result = mysqli_query($connect,$check_score_new)or die('Error'.mysqli_error());
        $check_score_new_number = mysqli_num_rows($check_score_new_result);

        if($check_score_new_number != 0) //score exist
        {
            $check_score_new_data = mysqli_fetch_row($check_score_new_result);
            $score_new = $check_score_new_data[2];

            if($score > $score_new)
            {
                $update_score = "UPDATE user_game SET score = '$score',coupon_type = '$coupon_type', coupon = '$coupon' WHERE ID = '$t_ID'AND game_type = '$game_type'";
                $update_score_result = mysqli_query($connect,$update_score)or die('Error'.mysqli_error());
            }
        }
        else
        {
            $insert_score_new = "INSERT INTO user_game(ID,game_type,coupon_type,coupon,score) VALUES ('$t_ID','$game_type','$coupon_type','$coupon','$score')";
            $insert_score_new_result = mysqli_query($connect,$insert_score_new)or die('Error'.mysqli_error());
        }

        echo "<script>history.go(-1);</script>";
    }
    else
    {
        echo "<script>history.go(-1);</script>";
    }
?>