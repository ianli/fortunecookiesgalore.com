// Facebook Async
// http://developers.facebook.com/docs/reference/javascript/FB.init/
window.fbAsyncInit = function () {
	FB.init({
		appId: '250973958259954',
		xfbml: true
	});
};

(function() {
	// Twitter button.
	loadScript('http://platform.twitter.com/widgets.js');
	
	// Google +1 button.
	loadScript('https://apis.google.com/js/plusone.js');
	
	// Facebook
	loadScript('http://connect.facebook.net/en_US/all.js');
})();