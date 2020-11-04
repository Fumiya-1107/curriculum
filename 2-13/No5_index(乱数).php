<!-- 1 〜 25 ：大当たり -->
<!-- 26〜 75 ：小当たり -->
<!-- 76〜 100：ハズレ　 -->

<?php

$probability = mt_rand(1, 100);
	if ($probability <= 25) {
		echo "大当たり";
	} elseif ($probability >= 26 && $probability <= 75) {
		echo "小当たり";
	} elseif ($probability >= 76 && $probability <= 100) {
		echo "ハズレ";
	}

?>