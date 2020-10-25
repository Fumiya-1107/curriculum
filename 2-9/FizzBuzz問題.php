<?php

$num = 1;
while ($num < 101) {
	echo $num;
	echo '<br>';
	$num++;

	if ($num % 3 == 0 && $num % 5 == 0) {
		echo "FizzBuzz!";
		echo '<br>';
		$num++;

	} elseif ($num % 3 == 0) {
		echo "Fizz!";
		echo '<br>';
		$num++;

	} elseif ($num % 5 == 0) {
		echo "Buzz";
		echo '<br>';
		$num++;
	}
}
?>