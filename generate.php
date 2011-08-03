<?php
	include_once('_php/raft.php');
	include_once('_php/Minify_HTML.php');
	include_once('config.php');
	
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
		
		$n = count($fortunes);
		for ($i = 0; $i < $n; $i++) {
			$fortune = $fortunes[$i];

			$raft['fortune'] = $fortune;
			$raft['fortunes_count'] = $n;

			ob_start();
			include("_layouts/fortune.php");
			$html = ob_get_contents();
			ob_end_clean();
			
			$html = Minify_HTML::minify($html);
			
			// Fortune ids start with 1.
			$fortune_id = $i + 1;
			file_put_contents("_site/$fortune_id.html", $html);
		}
	}
	
	function generate_fortune_paginations($fortunes) {
		global $raft;
		
		$fortunes_count = count($fortunes);
		$fortunes_per_page = 100;
		$page_count = ceil($fortunes_count / $fortunes_per_page);	
		
		for ($i = 0; $i < $page_count; $i++) {
			$page = $i + 1;
			$offset = $i * $fortunes_per_page;
			$paginated_fortunes = array_slice($fortunes, $offset, $fortunes_per_page);
			
			$raft['fortunes_count'] = $fortunes_count;
			
			ob_start();
			include('_layouts/pagination.php');
			$html = ob_get_contents();
			ob_end_clean();
			
			$html = Minify_HTML::minify($html);
				
			file_put_contents("_site/page$page.html", $html);
		}
	}
	
	function generate_pages($fortunes) {
		global $raft;
		
		$raft['fortunes_count'] = count($fortunes);
		
		$dir = '_pages';
		
		if (!is_dir($dir))
			return;
		
		// $dir is a directory, scan it!
		$files = scandir($dir);
		foreach ($files as $file) {
			if ($file == "." || $file == "..")
				continue;
				
			$path_info = pathinfo($file);
			
			if ($path_info['extension'] == 'php') {
				ob_start();
				include("$dir/$file");
				$content = ob_get_contents();
				ob_end_clean();
				$raft['content'] = $content;
				
				ob_start();
				include('_layouts/_layout.php');
				$html = ob_get_contents();
				ob_end_clean();
				
				$html = Minify_HTML::minify($html);
				
				$filename = $path_info['filename'];
				file_put_contents("_site/$filename.html", $html);
			}
		}
	}
	
	$fortunes = get_fortunes();
	
	rrmdir('_site');
	mkdir('_site');
	
	generate_pages($fortunes);
	generate_fortune_pages($fortunes);
	generate_fortune_paginations($fortunes);
	
	rcopy('robots.txt', '_site/robots.txt');
	rcopy('google69fca91fe5a019cf.html', '_site/google69fca91fe5a019cf.html');
	rcopy('css', '_site/css');
	rcopy('js', '_site/js');
?>