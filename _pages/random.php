<?php
	$raft['title'] = 'Random Fortune Cookie - Fortune Cookies Galore!';
	
	rafting('js');
?>
	<script type="text/javascript">
		// When page loads, go to a random fortune cookie immediately.
		goRandomly(<?= raft('fortunes_count') ?>);
	</script>
<?php
	end_rafting('js');
?>
