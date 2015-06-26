// @codekit-prepend "fitText.js";


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
var subnav = document.getElementsByClassName('subnav')[0];

function toggleMenuOpen() {
	mainMenu.classList.toggle('menu-open');
	menuButton.classList.toggle('menu-button-open');
	
	if (subnav) {
		subnav.classList.toggle('slide-down');
	}
}

function touchToggleMenuOpen(e) {
	e.preventDefault(); // prevent click event from occuring
	toggleMenuOpen();
}

menuButton.addEventListener('click', toggleMenuOpen, false);
menuButton.addEventListener('touchstart', touchToggleMenuOpen, false);


// slide in rows on home page on visibility 

// sorts 2-D array by the index supplied
function sortNumber(a,b) {
	return a[0] - b[0];
}
	
function getGridItemTopPos(elms) {
	var itemTops = [];
	for (var i = 0; i < elms.length; i++) {
		itemTops.push( elms[i].offsetTop + elms[i].offsetParent.offsetTop + elms[i].offsetParent.offsetParent.offsetTop );
	}
	
	for (var j = 0; j < elms.length; j++) {
		var pair = [itemTops[j], elms[j] ];
		gridItemsAndTops.push(pair);
	}
	
	gridItemsAndTops.sort( sortNumber );
}

function isScrolledIntoView(index) {
	var elemTop = gridItemsAndTops[index][0];
	
	var isVisible = (elemTop >= 0) && (elemTop <= ( (document.body.scrollTop || document.documentElement.scrollTop) + window.innerHeight - 54) );
	return isVisible;
}

function checkVisibility() {
	if (ticking) { return; }
	
	if ( counter !== counterMax ) {
		ticking = true;
		
		if ( isScrolledIntoView(counter) ) {			
			gridItemsAndTops[counter][1].classList.add('isVisible');
			counter++;
			ticking = false;
		}else{
			ticking = false;
		}
	}else{
		document.removeEventListener('scroll', checkVisibility);
		window.removeEventListener('resize', getGridItemTopPos);
		console.log('de-scrolled');
	}
}

function initialCheckVisibility() {
	for (var i = 0; i < gridItemsAndTops.length; i++) {
		if ( isScrolledIntoView(i) ) {
			if ( !gridItemsAndTops[i][1].classList.contains('isVisible') ) {
				gridItemsAndTops[i][1].classList.add('isVisible');
				counter++;			
			}
			if (counter === counterMax) {
				document.removeEventListener('scroll', checkVisibility);
				window.removeEventListener('resize', getGridItemTopPos);
				console.log('de-scrolled');
				return;
			}
		}
	}
}

var gridItems = document.querySelectorAll('.row > div'); // temp for merging with itemTops into gridItemsAndTops

if ( gridItems.length ) {
	var counter 			= 0;
	var counterMax 			= gridItems.length;
	var ticking				= false;
	var gridItemsAndTops	= [];
	
	document.addEventListener('scroll', checkVisibility, false);
	window.addEventListener('resize', getGridItemTopPos, false);

	// kick-off 
	getGridItemTopPos(gridItems);
	initialCheckVisibility();
	window.onload = function() { initialCheckVisibility(); };
}
