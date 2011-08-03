function goRandomly(count) {
	location.href = '/' + Math.floor(Math.random() * count);
}

function loadScript(script) {
	var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	po.src = script;
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
}

// Facebook Async
// http://developers.facebook.com/docs/reference/javascript/FB.init/
window.fbAsyncInit = function () {
	FB.init({
		appId: '250973958259954',
		xfbml: true
	});
};

// StatCounter variables
var sc_project = 7101600; 
var sc_invisible = 1; 
var sc_security = '0fb08c89';

(function() {
	// Twitter button.
	loadScript('http://platform.twitter.com/widgets.js');
	
	// Google +1 button.
	loadScript('https://apis.google.com/js/plusone.js');
	
	// Facebook
	loadScript('http://connect.facebook.net/en_US/all.js');
	
	// StatCounter
	loadScript('http://www.statcounter.com/counter/counter.js');
})();