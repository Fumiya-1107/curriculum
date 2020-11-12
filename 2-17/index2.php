<?php

$timezone = mt_rand(0, 24);

if ($timezone <= 3) {
	echo "今".$timezone."時台です";
	echo '<br>';
	echo "こんばんは";
} elseif ($timezone >= 3 && $timezone <= 9) {
	echo "今".$timezone."時台です";
	echo '<br>';
	echo "おはようございます";
} elseif ($timezone >= 9 && $timezone <= 18) {
	echo "今".$timezone."時台です";
	echo '<br>';
	echo "こんにちは";
} elseif ($timezone >= 18 && $timezone <= 24) {
	echo "今".$timezone."時台です";
	echo '<br>';
	echo "こんばんは";
} else {
	echo "時計の針を合わせてください。";
}

?>