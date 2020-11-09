<?php

	$testFile = "test2.txt";

	if (is_readable($testFile)) {
		$fp = fopen($testFile,"r");
		while ($line = fgets($fp)) {
			echo $line.'<br>';
		}
		fclose($fp);
		exit;
	}

?>