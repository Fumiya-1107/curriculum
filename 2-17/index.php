<?php
$num = 0;
$times = 1;

while ($num <= 40) {
	$sai = mt_rand(1,6);
	echo $times."回目 = ".$sai;
	echo '<br>';
	$times++;
	$num+=$sai;;
	
	if ($num >= 40) {
		$times --;
		echo "合計".$times."回でゴールしました！";
		break;
	}
}

?>