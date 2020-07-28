<!DOCTYPE html>
<?php
session_start();
require 'config.php';
$connect = mysqli_connect($host,$user,$pass) or die("connect_error".mysqli_error());
mysqli_select_db($connect,$dbname)or die("connect_error".mysqli_error());

mysqli_query($connect,"set name utf8");
mysqli_query($connect,"SET collate Chinese_PRC_CI_AS");

$data = mysqli_query($connect,"SELECT * FROM `user_game` WHERE game_type='3' ORDER BY score DESC ");

?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>打松果</title>
		<link rel="stylesheet" href="Hit_Bricks.css" type="text/css">
    </head>
    <body>
        <div class="wrapper">
            <header>
                <a href="https://www.pcone.com.tw/">
                    <img src="logo_pc_180614.png" class="logo" id="pcone">
                </a>
                <?php
                if(isset($_SESSION['tmp_TID']))
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
                    echo $t_ID;
                    echo "▾</p></div>";
                }
                ?>
            </header>
            <main>
                <p class="score">SCORE：<label id="score">0</label></p>
                <canvas id="playground" width="1440" height="960"></canvas>
                <div>
                    <img src="Hit_Bricks_logo.png" class="logo_s">
                    <img src="Hit_Bricks_rule.png" class="rule">
                </div>
                <div>
                    <img src="ranking_pic.png" class="ranking_pic">

                    <table border="2">
                        <tr>
                            <td style="font-weight: bold">排名</td>
                            <td style="font-weight: bold">ID</td>
                            <td style="font-weight: bold">分數</td>
                        </tr>
                        <?php
                        $table = mysqli_fetch_row($data);
                        $ID = $table[0];
                        $score = $table[2];
                        ?>
                        <tr>
                            <td>1</td>
                            <td><?php echo $ID?></td>
                            <td><?php echo $score?></td>
                        </tr>
                        <?php
                        $table = mysqli_fetch_row($data);
                        $ID = $table[0];
                        $score = $table[2];
                        ?>
                        <tr>
                            <td>2</td>
                            <td><?php echo $ID?></td>
                            <td><?php echo $score?></td>
                        </tr>
                        <?php
                        $table = mysqli_fetch_row($data);
                        $ID = $table[0];
                        $score = $table[2];
                        ?>
                        <tr>
                            <td>3</td>
                            <td><?php echo $ID?></td>
                            <td><?php echo $score?></td>
                        </tr>
                        <?php
                        $table = mysqli_fetch_row($data);
                        $ID = $table[0];
                        $score = $table[2];
                        ?>
                        <tr>
                            <td>4</td>
                            <td><?php echo $ID?></td>
                            <td><?php echo $score?></td>
                        </tr>
                        <?php
                        $table = mysqli_fetch_row($data);
                        $ID = $table[0];
                        $score = $table[2];
                        ?>
                        <tr>
                            <td>5</td>
                            <td><?php echo $ID?></td>
                            <td><?php echo $score?></td>
                        </tr>
                    </table>
                </div>
                <div>
                    <form action="game_backend.php" method="post" name="user_game" id="user_game">
                        <input type="hidden" id="game_type" name="game_type" value="0">
                        <input type="hidden" id="user_score" name="user_score" value="0">
                        <input type="hidden" id="coupon_type" name="coupon_type" value="0">
                        <input type="hidden" id="coupon" name="coupon" value="0">
                    </form>
                </div>
            </main>
            <footer>
                <a href="homepage.php">
                    <img src="back_to_homepage.png" class="back">
                </a>
                <button onclick="start_game()" class="start" id="start_game">START</button>
            </footer>
        </div>
        <script type="text/javascript" src="Hit_Bricks.js"></script>
    </body>
</html>