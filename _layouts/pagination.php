<?php rafting('content'); ?>
	<h2>Page <?= $page ?></h2>
	<ul id="fortunes-list">
		<?php
			$_n = count($paginated_fortunes);
			for ($j = 0; $j < $_n; $j++) {
				$fortune = $paginated_fortunes[$j];
				
				$fortune_ordinal = $offset + $j;
				
				echo "<li><a href=\"/$fortune_ordinal\">$fortune</a></li>";
			}
		?>
	</ul>
		
	<div id="pagination">
		<? 
			if ($page > 1) {
				$prev = $page - 1;
				echo "<a href=\"/page$prev\" class=\"_prev\">&laquo; Previous</a>";
			} else {
				echo "<span class=\"_prev\">&laquo; Previous</span>";
			}
			
			echo " ";
			
			if ($page < $page_count) { 
				$next = $page + 1;
				echo "<a href=\"/page$next\" class=\"_next\">Next &raquo;</a>";
			} else {
				echo "<span class=\"_next\">Next &raquo;</a>";
			}
		?>
	</div>
<?php end_rafting('content'); ?>
<?php
	$raft['title'] = "Page $page / Fortune Cookies Galore!";
	include('_layouts/_layout.php'); 
?>