function loadScript(script) {
	var po = document.createElement('script');
	po.type = 'text/javascript';
	po.async = true;
	po.src = script;
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(po, s);
}

function goRandomly(count) {
	location.href = '/' + Math.floor(Math.random() * count);
}

// StatCounter variables
var sc_project = 7101600; 
var sc_invisible = 1; 
var sc_security = '0fb08c89';

(function() {
	// StatCounter
	loadScript('http://www.statcounter.com/counter/counter.js');
})();