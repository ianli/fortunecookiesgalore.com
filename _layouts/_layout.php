<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
	<title><?= raft('title') ?> / Fortune Cookie Galore!</title>
	
	<link rel="stylesheet" href="http://cdn.ianli.com/stylesheets/cw15gw20cc24/screen.css" type="text/css" media="screen, projection, print" />
	<!--[if lt IE 8]>
		<link rel="stylesheet" href="http://cdn.ianli.com/stylesheets/cw15gw20cc24/ie.css" type="text/css" media="screen, projection, print" />
	<![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css' />
	<link href='/css/main.css' rel='stylesheet' type='text/css' />
</head>
<body>

<div class="container">
	<div id="hd" class="span-24">
		<h1><a href="/">Fortune Cookies Galore!</a></h1>
	</div>
	<ul id="nav" class="span-24">
		<li><a href="#" onclick="goRandomly(<?= raft('count') ?>);return false;">Random</a></li>
		<li><a href="/page1">Browse</a></li>
		<li><a href="#">About</a></li>
	</ul>
	<div id="bd" class="span-24">
		<?= raft('content') ?>
	</div>
	<div id="ad" class="span-24">
		<? if ($raft["production"]) { ?>
			<script type="text/javascript">
			google_ad_client = "ca-pub-8286479041214949";
			/* Fortune Cookie Galore */
			google_ad_slot = "9376730976";
			google_ad_width = 728;
			google_ad_height = 90;
			</script>
			<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
		<? } ?>
	</div>
	<div id="ft" class="span-24">
		<a href="/">Fortune Cookies Galore!</a> <span class="pipe">|</span>
		<a href="#" onclick="goRandomly(<?= raft('count') ?>);return false;">Random</a> <span class="pipe">|</span>
		<a href="/page1">Browse</a> <span class="pipe">|</span>
		&copy; 2011 <a href="http://ianli.com">Ian Li</a>. All rights reserved.
	</div>
</div>

<script type="text/javascript" src="/js/main.js"></script>
</body>
</html>