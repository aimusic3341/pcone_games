//1 先獲取到所有的坑(圖片)
var image = document.getElementsByName("hit");
var ranK;
var t;
var s;
var v;
var d;
var countdown;
var user_score = 0;
var coupon_word = '';
var coupon_type = 0;
//倒計時事件
function settime() {
	if (countdown == 0) {
		//倒計時結束停止遊戲
		stop();
	} else {
		//每次遞減每秒遞歸執行輸出顯示
		document.getElementById("lastTime").innerText = countdown;
		countdown--;
		d = setTimeout(function() {
			settime()
		}, 1000)
	}
}
//開始按鈕事件
function start() {
	//遍歷每個圖片失敗事件
	for (var i = 0; i < 25; i++) {
		image[i].setAttribute("onclick", "fail()");
	}
	//啓用控件狀態
	document.getElementById("startGame").setAttribute("disabled", true);
	document.getElementById("stopTime").setAttribute("disabled", true);
	document.getElementById("spaceTime").setAttribute("disabled", true);
	document.getElementById("gameTime").setAttribute("disabled", true);
	//獲取遊戲總時間秒數
	countdown = Number(document.getElementById("gameTime").value) * 60;
	//開始遊戲
	chulai();
	//開始倒計時
	settime();

}
//1讓老鼠隨機出現在25中的一個坑裏
function chulai() {
	//隨機值25格
	ranK = Math.floor(Math.random() * 25);
	image[ranK].src = "Hit_Squirrel_squirrel_test.png";
	image[ranK].width = "140";
	image[ranK].height = "87";
	//遍歷每個圖片失敗事件
	image[ranK].removeAttribute("onclick", "fail()");
	image[ranK].setAttribute("onclick", "die()");
	//停留時間觸發執行paole（）
	s = setTimeout("paole()", Number(document.getElementById("stopTime").value) * 1000);

}
//2 老鼠回去了
function paole() {
	//初始化圖片
	image[ranK].src = "Hit_Squirrel_pcone.png";
	image[ranK].width = "55";
	image[ranK].height = "70";
	image[ranK].removeAttribute("onclick");
	image[ranK].setAttribute("onclick", "fail()");
	v = setTimeout("chulai()", Number(document.getElementById("spaceTime").value) * 1000);
}
//3 老鼠被打死了
function die() {
	//切換圖片	
	image[ranK].src = "Hit_Squirrel_hit.png";
	image[ranK].width = "80";
	image[ranK].height = "85";
	//移除失敗點擊事件
	image[ranK].removeAttribute("onclick");
	//積分加100
	document.getElementById("account").innerText = Number(document.getElementById("account").innerText) + 100;
}
//4點擊失敗的每格扣取100
function fail() {
	document.getElementById("account").innerText = Number(document.getElementById("account").innerText) - 50;
	if ( document.getElementById("account").innerText < 0)
		document.getElementById("account").innerText = 0;
}
//5倒計時 先彈出積分  清空stop()
function stop() {
	user_score = document.getElementById("account").innerText;
	//清除所有計時器
	clearTimeout(t);
	clearTimeout(s);
	clearTimeout(v);
	clearTimeout(d);
	//啓用控件狀態
	document.getElementById("stopTime").value = "1";
	document.getElementById("spaceTime").value = "1";
	document.getElementById("gameTime").value = "0.5";
	document.getElementById("lastTime").innerText = "0";
	document.getElementById("account").innerText = "0";
	document.getElementById("startGame").removeAttribute("disabled");
	document.getElementById("stopTime").removeAttribute("disabled");
	document.getElementById("spaceTime").removeAttribute("disabled");
	document.getElementById("gameTime").removeAttribute("disabled");
	//初始化所有圖片事件
	for (var i = 0; i < 25; i++) {
		image[i].removeAttribute("onclick", "fail()");
		image[i].src = "Hit_Squirrel_pcone.png";
		image[i].width = "55";
		image[i].height = "70";
	}

	coupon();
}

function coupon()
{
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
	document.getElementById("game_type").value = 1;
	document.getElementById("user_score").value = user_score;
	document.getElementById("coupon_type").value = coupon_type;
	document.getElementById("coupon").value = coupon_word;
	console.log("game_type="+document.getElementById("game_type").value);
	console.log("user_score="+document.getElementById("user_score").value);
	console.log("coupon_type="+document.getElementById("coupon_type").value);
	console.log("coupon="+document.getElementById("coupon").value);
	document.getElementById("user_game").submit();
}