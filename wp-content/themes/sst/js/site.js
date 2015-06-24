// @codekit-prepend "fitText.js";
// @codekit-prepend "fastclick.js";

// FAQs

var faqs = document.getElementsByClassName('faq');

function toggleFAQ() {
	var otherExpand = document.getElementsByClassName('opened')[0];

	if (otherExpand && otherExpand !== this) {
		otherExpand.classList.remove('opened');
	}
	this.classList.toggle('opened');
}

if ( faqs.length ) {
	for (var i = 0; i < faqs.length; i++) {
		faqs[i].firstElementChild.addEventListener('click', toggleFAQ, false);
	}
}

// Responsive, single line text size
// depends on fitText.js

var responsiveText = document.getElementsByClassName('rsp');

if (responsiveText.length ) {
	for (var i = 0; i < responsiveText.length; i++ ) {
		window.fitText( responsiveText[i], 1.1 );
	}
}

// responsive menu event handling

var menuButton = document.getElementById('js-menu-button');
var mainMenu = document.getElementById('js-main-menu');

function toggleMenuOpen() {
	mainMenu.classList.toggle('menu-open');
	menuButton.classList.toggle('menu-button-open');
}

function touchToggleMenuOpen(e) {
	e.preventDefault(); // prevent click event from occuring
	toggleMenuOpen();
}

menuButton.addEventListener('click', toggleMenuOpen, false);
menuButton.addEventListener('touchstart', touchToggleMenuOpen, false);


// check if element is visible

var isHomepage = document.getElementsByClassName('home').length; 

if ( isHomepage ) {
	
	function rowTopPos(els) {
		for (var i = 0; i < els.length; i++) {
			rowTops.push( els[i].offsetTop + els[i].offsetParent.offsetTop );
		}
	}

	function isScrolledIntoView(el) {
		var elemTop = rowTops[counter]
		
		var isVisible = (elemTop >= 0) && (elemTop <= ( (document.body.scrollTop || document.documentElement.scrollTop) + window.innerHeight - 28) );
		return isVisible;
	}
	
	function checkVisibility() {
		if (ticking) { return };
		
		if ( counter < counterMax ) {
			ticking = true;
			debugger;
			if ( isScrolledIntoView( rowContainer[counter] ) ) {			
				rowContainer[counter].classList.add('isVisible');
				counter++;
				console.log('ticked');
				ticking = false;
			}else{
				ticking = false;
			}
		}else{
			document.removeEventListener('scroll', checkVisibility);
		}
	}
	
	var rowContainer = document.getElementsByClassName('row');
	
	if ( rowContainer.length ) {
		
		var counter 	= 0;
		var counterMax 	= rowContainer.length;
		var ticking 	= false;
		var rowTops 	= [];
		
		document.addEventListener('scroll', checkVisibility, false);

		// kick-off 
		rowTopPos(rowContainer);
		checkVisibility();
	}

}