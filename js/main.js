(function() {
	// Load Twitter button.
	var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	po.src = 'http://platform.twitter.com/widgets.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	
	// Load Google +1 button.
	var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	po.src = 'https://apis.google.com/js/plusone.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();

function goRandomly(count) {
	location.href = '/' + Math.floor(Math.random() * count);
}