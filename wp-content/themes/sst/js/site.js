// @codekit-prepend "rAF.js";
// @codekit-prepend "fitText.js";

var ticking = false;
var header = document.getElementById('js-header');

function checkIfShouldSwitch() {
	if ( (document.documentElement.scrollTop || document.body.scrollTop) < 5) {
		header.classList.remove('whiter');
	}else{
		header.classList.add('whiter');
	}
}

window.addEventListener('scroll', function() {
	if(ticking === false) {
		ticking = true;
		setTimeout( function(){
			requestAnimationFrame( checkIfShouldSwitch );
			ticking = false;
		}, 200);
	}
}, false);

// kick-off before any scroll
checkIfShouldSwitch();


// FAQs

var faqs = document.getElementsByClassName('faq');

if ( faqs.length ) {
	for (var i = 0; i < faqs.length; i++) {
		faqs[i].firstElementChild.addEventListener('click', function() {
			var otherExpand = document.getElementsByClassName('opened')[0];

			if (otherExpand && otherExpand !== this) {
				otherExpand.classList.remove('opened');
			}
			this.classList.toggle('opened');
		}, false);
	}
}

// Responsive, single line text size
// depends on fitText.js

var responsiveText = document.getElementsByClassName('rsp');

if (responsiveText.length ) {
	for (var i = 0; i < responsiveText.length; i++ ) {
		window.fitText( responsiveText[i], 1 );
	}
}

// responsive menu event handling

var menuButton = document.getElementById('js-menu-button');
var mainMenu = document.getElementById('js-main-menu');

function toggleMenuOpen() {
	mainMenu.classList.toggle('menu-open');
	menuButton.classList.toggle('menu-button-open');
}

menuButton.addEventListener('click', toggleMenuOpen, false);
//menuButton.addEventListener('touchdown', toggleMenuOpen, false);
