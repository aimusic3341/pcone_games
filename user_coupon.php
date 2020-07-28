<!DOCTYPE html>
<?php
session_start();
require 'config.php';
$connect = mysqli_connect($host,$user,$pass) or die("connect_error".mysqli_error());
mysqli_select_db($connect,$dbname)or die("connect_error".mysqli_error());

mysqli_query($connect,"set name utf8");
mysqli_query($connect,"SET collate Chinese_PRC_CI_AS");

$t_ID = $_SESSION['tmp_TID'];
$data = mysqli_query($connect,"SELECT * FROM `user_game` WHERE ID = '$t_ID' ORDER BY game_type");
mysqli_close($connect);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>會員專區</title>
    <link rel="stylesheet" href="user_coupon.css" type="text/css">
</head>
<body>
<div class="wrapper">
    <header>
        <a href="https://www.pcone.com.tw/">
            <img src="logo_pc_180614.png" class="logo" id="pcone">
        </a>
        <div class="user">
            <img src="user.png" class="user_pic">
            <ul class="user_list">
                <li><div style="opacity: 0;"><a href="#">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</div></a>
                    <ul>
                        <li><a href="user_logout.php">登出</a></li>
                    </ul>
                </li>
            </ul>
            <p class="user_ID"><?php echo $t_ID?>▾</p>
        </div>
    </header>
    <main>
        <div class="title">
            <img src="coupon_title.png" height="140" width="400">
        </div>
        <?php
            $coupon_number = mysqli_num_rows($data);
        ?>
        <div>
            <table>
                <?php
                if($coupon_number != 0)
                {
                    for($i=1;$i<=$coupon_number;$i++)
                    {
                        if($i == 1)
                        {
                            $coupon = mysqli_fetch_row($data);
                            $game_type = $coupon[1];
                            $coupon_type = $coupon[3];
                            $coupon_word = $coupon[4]; //85+8碼

                            if($game_type == 1)
                            {
                                printf(" <tr><td><img src=\"Hit_Squirrel_logo.png\" class=\"game_pic\"></td>");

                            }
                            elseif ($game_type == 2)
                            {
                                printf("<tr><td><img src=\"Squirrel_128_logo.png\" class=\"game_pic\"></td>");
                            }
                            elseif ($game_type == 3)
                            {
                                printf("<tr><td><img src=\"Hit_Bricks_logo.png\" class=\"game_pic\"></td>");
                            }
                            printf("<td>&emsp;&emsp;</td>");
                            if($coupon_number == 1)
                            {
                                printf("<td><div class=\"coupon_word1_1\">");
                            }
                            elseif ($coupon_number == 2)
                            {
                                printf("<td><div class=\"coupon_word1_2\">");
                            }
                            else
                            {
                                printf("<td><div class=\"coupon_word1\">");
                            }
                            echo $coupon_word;
                            if($coupon_type == 85)
                            {
                                printf("</div><img src=\"coupon_85.png\" class=\"coupon_pic\"></td></tr>");
                            }
                            elseif ($coupon_type == 90)
                            {
                                printf("</div><img src=\"coupon_9.png\" class=\"coupon_pic\"></td></tr>");
                            }
                            elseif ($coupon_type == 95)
                            {
                                printf("</div><img src=\"coupon_95.png\" class=\"coupon_pic\"></td></tr>");
                            }

                            if($coupon_number == 2 || $coupon_number ==3)
                            {
                                printf("<tr>
                                    <td>&emsp;&emsp;</td>
                                    <td>&emsp;&emsp;</td>
                                    <td>&emsp;&emsp;</td>
                                </tr>");
                            }
                        }

                        if($i == 2)
                        {
                            $coupon = mysqli_fetch_row($data);
                            $game_type = $coupon[1];
                            $coupon_type = $coupon[3];
                            $coupon_word = $coupon[4];

                            if ($game_type == 2)
                            {
                                printf("<tr><td><img src=\"Squirrel_128_logo.png\" class=\"game_pic\"></td>");
                            }
                            elseif ($game_type == 3)
                            {
                                printf("<tr><td><img src=\"Hit_Bricks_logo.png\" class=\"game_pic\"></td>");
                            }
                            printf("<td>&emsp;&emsp;</td>");
                            if($coupon_number == 2)
                            {
                                printf("<td><div class=\"coupon_word2_2\">");
                            }
                            else
                            {
                                printf("<td><div class=\"coupon_word2\">");
                            }
                            echo $coupon_word;
                            if($coupon_type == 85)
                            {
                                printf("</div><img src=\"coupon_85.png\" class=\"coupon_pic\"></td></tr>");
                            }
                            elseif ($coupon_type == 90)
                            {
                                printf("</div><img src=\"coupon_9.png\" class=\"coupon_pic\"></td></tr>");
                            }
                            elseif ($coupon_type == 95)
                            {
                                printf("</div><img src=\"coupon_95.png\" class=\"coupon_pic\"></td></tr>");
                            }

                            if($coupon_number ==3)
                            {
                                printf("<tr>
                                    <td>&emsp;&emsp;</td>
                                    <td>&emsp;&emsp;</td>
                                    <td>&emsp;&emsp;</td>
                                </tr>");
                            }
                        }

                        if($i == 3)
                        {
                            $coupon = mysqli_fetch_row($data);
                            $game_type = $coupon[1];
                            $coupon_type = $coupon[3];
                            $coupon_word = $coupon[4];

                            printf("<tr><td><img src=\"Hit_Bricks_logo.png\" class=\"game_pic\"></td>");
                            printf("<td>&emsp;&emsp;</td>");
                            printf("<td><div class=\"coupon_word3\">");
                            echo $coupon_word;
                            if($coupon_type == 85)
                            {
                                printf("</div><img src=\"coupon_85.png\" class=\"coupon_pic\"></td></tr>");
                            }
                            elseif ($coupon_type == 90)
                            {
                                printf("</div><img src=\"coupon_9.png\" class=\"coupon_pic\"></td></tr>");
                            }
                            elseif ($coupon_type == 95)
                            {
                                printf("</div><img src=\"coupon_95.png\" class=\"coupon_pic\"></td></tr>");
                            }
                        }
                    }
                }
                 else
                 {
                     echo "<div>
                                <img src=\"coupon_zero.png\" class=\"coupon_zero\">
                            </div>";
                 }
                ?>
            </table>
        </div>
    </main>
    <footer>
        <?php
        if($coupon_number != 0)
        {
            echo "<a href=\"homepage.php\">
                    <img src=\"back_to_homepage.png\" class=\"back\">
                </a>";
        }
        else
        {
            echo "<a href=\"homepage.php\">
                    <img src=\"back_to_homepage.png\" class=\"back_zero\">
                </a>";
        }
        ?>
    </footer>
</div>
</body>
</html>