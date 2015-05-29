// @codekit-prepend "rAF.js";

var ticking = false;
var header = document.getElementById('js-header');

function checkIfShouldSwitch() {
	if ( (document.documentElement.scrollTop || document.body.scrollTop) < 5) {
		header.classList.remove('whiter');
		console.log('< 5');
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