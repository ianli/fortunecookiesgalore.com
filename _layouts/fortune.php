<? rafting('content'); ?>

	<div id="fortune"><?= raft('fortune'); ?></div>

	<!-- Twitter -->
	<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal"></a>
	<!-- Facebook -->
	<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=250973958259954&amp;xfbml=1"></script><fb:like href="" send="false" layout="button_count" width="90" show_faces="false" font=""></fb:like>
	<!-- Google +1 -->
	<g:plusone size="medium"></g:plusone>

<? end_rafting('content'); ?>
<?php
	$raft['title'] = raft('fortune');
	include('_layouts/_layout.php'); 
?>