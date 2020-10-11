$(function() {
	setTimeout(function(){
		$('.start-inner').fadeIn(1600);
	},500); //0.5秒後にロゴをフェードイン!
	setTimeout(function(){
		$('.start').fadeOut(500);
	},1500); //2.0秒後にロゴ含め真っ白背景をフェードアウト！
});