var playground = document.getElementById("playground");
var play = playground.getContext("2d");

var pcone = new Image();
var pcone_x = playground.width/2-40;
var pcone_y = playground.height-180;
var pcone_move_x = 2;
var pcone_move_y = -2;
var pcone_width;
var pcone_height;

var paddle_width = 300;
var paddle_height = 10;
var paddle_x = (playground.width-paddle_width)/2;
var paddle_y = playground.height-paddle_height;

var brick = new Image();
var brick_x=20;
var brick_y=20;
var brick_width;
var brick_height;
var brick_row_count = 4;
var brick_column_count = 5;
var brick_padding_top = 40;
var brick_padding_left = 18;
var brick_top = 30;
var brick_left = 30;

var bricks = [];
var col;
var row;
for(col = 0; col < brick_column_count; col++)
{
	bricks[col] = [];
	for(row = 0; row < brick_row_count; row++)
	{
		bricks[col][row] = {x:0 , y:0 , status:1};
	}
}

var score = 0;
var user_score = 0;
var coupon_word = '';
var coupon_type = 0;
var interval;

function start()
{
	play.clearRect(0,0,playground.width,playground.height);
	play.drawImage(pcone,pcone_x,pcone_y);
	for(col = 0; col < brick_column_count; col++)
	{
		for(row = 0; row < brick_row_count; row++)
		{
			if(bricks[col][row].status == 1)
			{
				brick_x = (col * (brick_width + brick_padding_left)) + brick_left;
				brick_y = (row * (brick_height + brick_padding_top)) + brick_top;
				bricks[col][row].x = brick_x;
				bricks[col][row].y = brick_y;
				play.drawImage(brick, brick_x, brick_y);
			}
		}
	}
	drawPcone();
	drawPaddle();
	drawScore();

	for(col = 0; col < brick_column_count; col++)
	{
		for(row = 0; row < brick_row_count; row++)
		{
			if(bricks[col][row].status == 1)
			{
				brick_x = (col*(brick_width+brick_padding_left))+brick_left;
				brick_y = (row*(brick_height+brick_padding_top))+brick_top;
				bricks[col][row].x = brick_x;
				bricks[col][row].y = brick_y;

				drawBricks();
				collision();
			}
		}
	}

	pcone_x += pcone_move_x;
	pcone_y += pcone_move_y;

	if(pcone_x + pcone_move_x < 0 || pcone_x + pcone_move_x > playground.width+15 - pcone_width)
	{
		pcone_move_x = -pcone_move_x;
	}

	if(pcone_y + pcone_move_y < 0)
	{
		pcone_move_y = -pcone_move_y;
	}
	else if(pcone_y + pcone_move_y > playground.height - pcone_height) //paddle
	{
		if(pcone_x >= paddle_x-100 && pcone_x <= paddle_x + paddle_width)
		{
			pcone_move_y = -pcone_move_y ;
		}
	}

	if(pcone_y + pcone_move_y > playground.height - pcone_height)
	{
		coupon();
		document.location.reload();
		clearInterval(interval);
	}

	if(score == brick_row_count * brick_column_count * 100)
	{
		coupon();
		document.location.reload();
		clearInterval(interval);
	}
}

function drawPcone()
{
	pcone.onload = function ()
	{
		play.drawImage(pcone,pcone_x,pcone_y);
	};
	pcone.src = "Hit_bricks_pcone.png";

	pcone_width = pcone.width;
	pcone_height = pcone.height;
}

function drawPaddle()
{
	play.beginPath();
	play.rect(paddle_x,paddle_y,paddle_width,paddle_height);
	play.fillStyle = "#3C3C3C";
	play.fill();
	play.closePath();
}

function mouseMovePaddle(mouse)
{
	var mouse_x = mouse.clientX;
	if(mouse_x > 0 && mouse_x < playground.width-100)
	{
		paddle_x = mouse_x - paddle_width/2+50;
	}
}

function drawBricks()
{
	brick.onload = function ()
	{
		play.drawImage(brick,brick_x,brick_y);
	};
	brick.src = "Hit_Bricks_brick.png";

	brick_width = brick.width;
	brick_height = brick.height;
}

function collision()
{
	if(bricks[col][row].status == 1)
	{
		if(pcone_x > bricks[col][row].x && pcone_x < bricks[col][row].x + brick_width
			&& pcone_y > bricks[col][row].y && pcone_y < bricks[col][row].y + brick_height)
		{
			pcone_move_y = - pcone_move_y;
			bricks[col][row].status = 0;
			score+=100;
		}
	}
}

function drawScore()
{
	/*play.font = "16px Arial";
	play.fillStyle = "#0095DD";
	play.fillText("Score: " + score ,50,50);*/
	document.getElementById("score").innerText = score;
}

function start_game()
{
	document.getElementById('start_game').style.display='none';
	interval = setInterval(start,5);
}

function coupon()
{
	user_score = score;
	if(user_score >=1500)
	{
		coupon_type = 85;
		coupon_word = coupon_type +Math.random().toString(36).substring(5);
		alert("SCORE： " + user_score + " !恭喜獲得85折折價券!您的折價券代碼如下：" + coupon_word);
	}
	else if(user_score >= 1000 && user_score <1500)
	{
		coupon_type = 90;
		coupon_word = coupon_type +Math.random().toString(36).substring(5);
		alert("SCORE： " + user_score + " !恭喜獲得9折折價券!您的折價券代碼如下：" + coupon_word);
	}
	else if(user_score >= 0 && user_score < 1000)
	{
		coupon_type = 95;
		coupon_word = coupon_type +Math.random().toString(36).substring(5);
		alert("SCORE： " + user_score + " !恭喜獲得95折折價券!您的折價券代碼如下：" + coupon_word);
	}
	submit_user_score();
}

function submit_user_score()
{
	document.getElementById("game_type").value = 3;
	document.getElementById("user_score").value = user_score;
	document.getElementById("coupon_type").value = coupon_type;
	document.getElementById("coupon").value = coupon_word;
	console.log("game_type="+document.getElementById("game_type").value);
	console.log("user_score="+document.getElementById("user_score").value);
	console.log("coupon_type="+document.getElementById("coupon_type").value);
	console.log("coupon="+document.getElementById("coupon").value);
	document.getElementById("user_game").submit();
}

document.addEventListener("mousemove",mouseMovePaddle,false);