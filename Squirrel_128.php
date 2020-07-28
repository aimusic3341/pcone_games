<html>
<?php
session_start();
require 'config.php';
$connect = mysqli_connect($host,$user,$pass) or die("connect_error".mysqli_error());
mysqli_select_db($connect,$dbname)or die("connect_error".mysqli_error());

mysqli_query($connect,"set name utf8");
mysqli_query($connect,"SET collate Chinese_PRC_CI_AS");

$data = mysqli_query($connect,"SELECT * FROM `user_game` WHERE game_type='2' ORDER BY score DESC ");
?>
<head>
	<meta charset="UTF-8">
	<title>128~松~</title>
	<link rel="stylesheet" href="Squirrel_128.css" type="text/css">
	<script type="text/javascript" src="Squirrel_128.js"></script>
    <style>
        .ranking_pic{
            position: fixed;
            top: 25%;
            left: 8%;
            height: 90px;
            width: 270px;
        }
        table{
            background-color: #f8ff97;
            position: fixed;
            top: 35%;
            left: 8%;
            height: 300px;
            width: 270px;
            border: 2px #b5431b solid;
            text-align: center;
            font-family: "Microsoft JhengHei";
            font-size: 20px;
            color: #ff341e;
        }
        .logo_s{
            position: fixed;
            top: 25%;
            left: 75%;
            height: 250px;
            width: 200px;
        }
        .rule{
            position: fixed;
            top: 63%;
            left: 73.5%;
            height: 120px;
            width: 250px;
        }
        .user_pic{
            position: fixed;
            left: 80%;
            height: 40px;
            width: 40px;
        }
        .user_ID{
            position: fixed;
            left: 83%;
            top: -1.5%;
            font-family: "Microsoft JhengHei";
            font-size: 18px;
            font-weight: bold;
            color: #ffe6dc;
            z-index: 1;
        }
        .user_list{
            position: fixed;
            left: 77.5%;
            top: -2%;
            height: 50px;
            width: 150px;
            z-index: 2;
        }
        ul >li{
            position: relative;
            float: left;
            list-style: none;
        }
        ul >li a{
            display: block;
            padding: 10px 20px;
            background-color: black;
            text-decoration: none;
        }
        ul li ul{
            display: none;
            float: left;
            position: absolute;
            margin: 0;
            padding: 0;
        }
        ul li:hover > ul {
            display: block;
        }
        ul li ul a{
            width: 132px;
            padding: 10px 12px;
            color: #FF5100;
            background: #FFFFFF;
            font-family: "Microsoft JhengHei";
            font-weight: bold;
        }
        ul li ul a:hover{
            color: #FFF;
            background: #FFA042;
        }
    </style>
</head>

<body>
<div class="wrapper">
	<header>
		<a href="https://www.pcone.com.tw/">
			<img src="logo_pc_180614.png" class="logo_p" id="pcone">
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
		<div class="container">
			<div class="scoreBar">
				<label id="score" style="color: #FF5100">2</label>
			</div>
			<div id="stage"></div>
		</div>
        <div>
            <div>
                <img src="Squirrel_128_logo.png" class="logo_s">
                <img src="Squirrel_128_rule.png" class="rule">
            </div>
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
	</footer>
</div>
</body>
</html>