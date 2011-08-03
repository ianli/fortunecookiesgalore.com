<?php rafting('content'); ?>
	<div id="fortune"><?= raft('fortune'); ?></div>
	<div id="fortune-share">
		<!-- Twitter -->
		<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal"></a>
		<!-- Google +1 -->
		<g:plusone size="medium"></g:plusone>
		<!-- Facebook -->
		<div id="fb-root"></div>
		<!-- <script src="http://connect.facebook.net/en_US/all.js#appId=250973958259954&amp;xfbml=1"></script> -->
		<fb:like href="" send="false" layout="button_count" width="90" show_faces="false" font=""></fb:like>
	</div>
<?php end_rafting('content'); ?>

<?php rafting('js'); ?>
	<script type="text/javascript" src="/js/buttons.js"></script>
<?php end_rafting('js'); ?>

<?php
	$raft['title'] = raft('fortune') . ' / Fortune Cookies Galore!';
	include('_layouts/_layout.php'); 
?>