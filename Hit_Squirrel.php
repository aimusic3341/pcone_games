<!DOCTYPE html>
<?php
session_start();
require 'config.php';
$connect = mysqli_connect($host,$user,$pass) or die("connect_error".mysqli_error());
mysqli_select_db($connect,$dbname)or die("connect_error".mysqli_error());

mysqli_query($connect,"set name utf8");
mysqli_query($connect,"SET collate Chinese_PRC_CI_AS");

$data = mysqli_query($connect,"SELECT * FROM `user_game` WHERE game_type='1' ORDER BY score DESC ");
?>
<html>
	<head>
		<meta charset="utf-8" />
		<title>打松鼠</title>
		<link rel="stylesheet" href="Hit_Squirrel.css" type="text/css">
		<script type="text/javascript" src="Hit_Squirrel.js"></script>
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

		<div id="all">
			<div id="all2" style = "position:relative; margin-top:138px;">
				<div id="tool" align=center>
					<p><input type="hidden" value="0.5" id="gameTime"/><label></label></p>
					<p><input type="hidden" value="0.5" id="spaceTime"/><label></label></p>
					<p class="time">計時倒數：<label id="lastTime">30</label>&nbsp &nbsp 秒</p>
					<p><input type="text" value="1" id="stopTime" style="display:none"/><label></label></p>
					<p class="score">得分情況：<label id="account">0</label>&nbsp &nbsp 分</p>
				</div>
			</div>
			<table border = "3" id="tables" align=center width = 50%; height = 50% class = "mouse" style="border:3px #FFD382 dashed; table-layout:fixed; margin-top:35px">
				<tr height=95px>
					<td align=center><img src="Hit_Squirrel_pcone.png" width = "55" height = "70" name="hit"></td>
					<td align=center><img src="Hit_Squirrel_pcone.png" width = "55" height = "70" name="hit"></td>
					<td align=center><img src="Hit_Squirrel_pcone.png" width = "55" height = "70" name="hit"></td>
					<td align=center><img src="Hit_Squirrel_pcone.png" width = "55" height = "70" name="hit"></td>
					<td align=center><img src="Hit_Squirrel_pcone.png" width = "55" height = "70" name="hit"></td>
				</tr>
				<tr height=95px>
					<td align=center><img src="Hit_Squirrel_pcone.png" width = "55" height = "70" name="hit"></td>
					<td align=center><img src="Hit_Squirrel_pcone.png" width = "55" height = "70" name="hit"></td>
					<td align=center><img src="Hit_Squirrel_pcone.png" width = "55" height = "70" name="hit"></td>
					<td align=center><img src="Hit_Squirrel_pcone.png" width = "55" height = "70" name="hit"></td>
					<td align=center><img src="Hit_Squirrel_pcone.png" width = "55" height = "70" name="hit"></td>
				</tr>
				<tr height=95px>
					<td align=center><img src="Hit_Squirrel_pcone.png" width = "55" height = "70" name="hit"></td>
					<td align=center><img src="Hit_Squirrel_pcone.png" width = "55" height = "70" name="hit"></td>
					<td align=center><img src="Hit_Squirrel_pcone.png" width = "55" height = "70" name="hit"></td>
					<td align=center><img src="Hit_Squirrel_pcone.png" width = "55" height = "70" name="hit"></td>
					<td align=center><img src="Hit_Squirrel_pcone.png" width = "55" height = "70" name="hit"></td>
				</tr>
				<tr height=95px>
					<td align=center><img src="Hit_Squirrel_pcone.png" width = "55" height = "70" name="hit"></td>
					<td align=center><img src="Hit_Squirrel_pcone.png" width = "55" height = "70" name="hit"></td>
					<td align=center><img src="Hit_Squirrel_pcone.png" width = "55" height = "70" name="hit"></td>
					<td align=center><img src="Hit_Squirrel_pcone.png" width = "55" height = "70" name="hit"></td>
					<td align=center><img src="Hit_Squirrel_pcone.png" width = "55" height = "70" name="hit"></td>
				</tr>
				<tr height=95px>
					<td align=center><img src="Hit_Squirrel_pcone.png" width = "55" height = "70" name="hit"></td>
					<td align=center><img src="Hit_Squirrel_pcone.png" width = "55" height = "70" name="hit"></td>
					<td align=center><img src="Hit_Squirrel_pcone.png" width = "55" height = "70" name="hit"></td>
					<td align=center><img src="Hit_Squirrel_pcone.png" width = "55" height = "70" name="hit"></td>
					<td align=center><img src="Hit_Squirrel_pcone.png" width = "55" height = "70" name="hit"></td>
				</tr>
			</table>
			<div id = "Center" align=center>
				<a href="homepage.php">
					<img src="back_to_homepage.png" style="margin-left: 1%;height: 50px;width: 125px;">
				</a>
				<input type="button" onclick="start()" id="startGame" style="background-image:url('Hit_Squirrel_play.png');width:120px;height:50px;border:2px blue none;background-color:#ffd4c7;margin-left: 100px;">
			</div>
		</div>
		<div>
			<img src="Hit_Squirrel_logo.png" class="logo_s">
            <img src="Hit_Squirrel_rule.png" class="rule">
		</div>
		<div>
            <img src="ranking_pic.png" class="ranking_pic">

            <table border="2" class="ranking_table">
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
	</div>
	</body>
</html>