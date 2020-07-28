<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>松果小遊戲</title>
        <link rel="stylesheet" href="homepage.css" type="text/css">
    </head>
    <body>
        <div class="wrapper">
            <header>
                <a href="https://www.pcone.com.tw/">
                    <img src="logo_pc_180614.png" class="logo" id="pcone">
                </a>
                <?php
                    if(!isset($_SESSION['tmp_TID']))
                    {
                        echo "<div class=\"user\">
                            <img src=\"user.png\" class=\"user_pic\">
                            <a href=\"user_login.html\">
                                <div class=\"user_coupon\"></div>
                            </a>
                            <p class=\"user_ID\">登入/加入會員</p>
                            </div>";
                    }
                    else
                    {
                        $t_ID = $_SESSION['tmp_TID'];
                        echo "<div class=\"user\">
                            <img src=\"user.png\" class=\"user_pic\">
                            <ul class=\"user_list\">
                            <li><div style=\"opacity: 0;\"><a href=\"#\">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</div></a>
                                <ul>
                                    <li><a href=\"user_coupon.php\">我的折價券</a></li>
                                    <li><a href=\"user_logout.php\">登出</a></li>
                                </ul>
                            </li>
                            </ul>
                            <p class=\"user_ID\">";
                        echo  $t_ID;
                        echo  "▾</p></div>";
                    }
                ?>
            </header>
            <main>
                <a href="Hit_Squirrel.php">
                    <img src="homepage_button_test.png" class="button1">
                        <img src="Hit_Squirrel.png" class="hit_squirrel">
                            <img src="Hit_Squirrel_word.png" class="hit_squirrel_word">
                </a>
                <a href="Squirrel_128_test.php">
                    <img src="homepage_button_test.png" class="button2">
                        <img src="Squirrel_128.png" class="squirrel_128">
                            <img src="Squirrel_128_word.png" class="squirrel_128_word">
                </a>
                <a href="Hit_Bricks.php">
                    <img src="homepage_button_test.png" class="button3">
                        <img src="Hit_Bricks.png" class="hit_bricks">
                            <img src="Hit_Bricks_word.png" class="hit_bricks_word">
                </a>
            </main>
            <footer>
                <img src="homepage_welcome.png" class="welcome">
                <img src="Squirrel_1.png" class="squirrel_1">
                <img src="Squirrel_2.png" class="squirrel_2">
            </footer>
        </div>
    </body>
</html>