$(function() {
	setTimeout(function(){
		$('.start-inner').fadeIn(1600);
	},500); //0.5秒後にロゴをフェードイン!
	setTimeout(function(){
		$('.start').fadeOut(500);
	},1500); //1.5秒後にロゴ含め真っ白背景をフェードアウト！
});

class MobileMenu {
	constructor() {
		this.DOM = {}
		this.DOM.btn = document.querySelector('.mobile-menu__btn');
		this.DOM.cover = document.querySelector('.mobile-menu__cover');
		this.DOM.container = document.querySelector('#global-container');
		this.eventType = this._getEventType();
		this._addEvent();
	}

	// スマホかPCかの切り分け
	_getEventType(){
		return window.ontouchstart ? 'touchstart' : 'click';
	}
	_toggle() {
		this.DOM.container.classList.toggle('menu-open');
	}

	_addEvent() {
		this.DOM.btn.addEventListener(this.eventType, this._toggle.bind(this));
		this.DOM.cover.addEventListener(this.eventType, this._toggle.bind(this));
	}
}

new MobileMenu();