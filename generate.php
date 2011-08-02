<?php
	include_once('_php/raft.php');
	include_once('_php/Minify_HTML.php');
	
	// Removes files and non-empty directories.
	// http://www.php.net/manual/en/function.copy.php#104020
	function rrmdir($dir) {
		if (is_dir($dir)) {
			$files = scandir($dir);
			foreach ($files as $file)
				if ($file != "." && $file != "..") rrmdir("$dir/$file");
			rmdir($dir);
		} else if (file_exists($dir)) {
			unlink($dir);
		}
	}

	// Copies files and non-empty directories.
	// http://www.php.net/manual/en/function.copy.php#104020
	function rcopy($src, $dst) {
		if (file_exists($dst)) rrmdir($dst);
		if (is_dir($src)) {
			mkdir($dst);
			$files = scandir($src);
			foreach ($files as $file)
				if ($file != "." && $file != "..") rcopy("$src/$file", "$dst/$file"); 
		} else if (file_exists($src)) {
			copy($src, $dst);
		}
	}
	
	function get_fortunes() {
		$fortunes = array();

		$handle = @fopen('fortunes.csv', 'r');
		if ($handle) {
			while (($buffer = fgets($handle)) !== false) {
				array_push($fortunes, $buffer);
			}

			if (!feof($handle)) {
				echo "Error: unexpected fgets() fail\n";
			}

			fclose($handle);
		}
		
		return $fortunes;
	}
	
	function generate_fortune_pages($fortunes) {
		global $raft;
		
		$raft['count'] = $n = count($fortunes);
		for ($i = 0; $i < $n; $i++) {
			$fortune = $fortunes[$i];

			$raft['fortune'] = $fortune;

			ob_start();
			include("_layouts/fortune.php");
			$html = ob_get_contents();
			ob_end_clean();
			
			$html = Minify_HTML::minify($html);
			
			file_put_contents("_site/$i.html", $html);
		}
	}
	
	function generate_fortune_paginations($fortunes) {
		global $raft;
		
		$raft['count'] = $n = count($fortunes);
		$fortunes_per_page = 100;
		$page_count = ceil($n / $fortunes_per_page);	
		
		for ($i = 0; $i < $page_count; $i++) {
			$page = $i + 1;
			$offset = $i * $fortunes_per_page;
			$paginated_fortunes = array_slice($fortunes, $offset, $fortunes_per_page);
			
			ob_start();
			include('_layouts/pagination.php');
			$html = ob_get_contents();
			ob_end_clean();
			
			$html = Minify_HTML::minify($html);
				
			file_put_contents("_site/page$page.html", $html);
		}
	}
	
	$fortunes = get_fortunes();
	
	rrmdir('_site');
	mkdir('_site');
	
	generate_fortune_pages($fortunes);
	generate_fortune_paginations($fortunes);
	
	rcopy('css', '_site/css');
	rcopy('js', '_site/js');
?>