<?php
	$raft['title'] = 'Fortune Cookies Galore!';
?>

<div id="home">
	<p class="large">
		<b>Fortune Cookies Galore!</b> 
		is a collection of <?= raft('fortunes_count'); ?> fortune cookie quotes.
		Visit to get your daily dose of fortune cookies.
	</p>
	
	<div class="span-8">
		<a href="/random" class="pad" onclick="goRandomly(<?= raft('fortunes_count') ?>);return false;">
			Get a random fortune cookie.
		</a>
	</div>
	<div class="span-8">
		<a href="/page1" class="pad">
			Browse thousands of fortune cookies.
		</a>
	</div>
	<div class="span-8 last">
		<a href="/random" class="pad" onclick="goRandomly(<?= raft('fortunes_count') ?>);return false;">
			Share fortune cookies with others.
		</a>
	</div>
	<hr class="space" />
	<hr class="space" />

	<h3>Who created the site?</h3> 
	<p> 
		This site was developed and designed by 
		<a href="http://ianli.com">Ian Li</a>,
		who is very fond of fortune cookies.
		He has been collecting fortunes since he was in high school,
		which was a long time ago.
		His collection is stored in a fortune jar, 
		but many remain scattered on his desk, in drawers, 
		and in his shirt pockets. 
	</p> 

	<h3>Colophon</h3> 
	<p> 
		The font for the logo is <a href="http://www.google.com/webfonts/specimen/Arvo">Arvo</a> created by Anton Koovit.
		The layout is built on top of <a href="http://blueprintcss.org/">Blueprint CSS</a>.
		The code is written in <a href="http://www.php.net/">PHP</a>.
	</p>
</div>