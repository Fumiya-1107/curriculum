<?php

function getRectangular ($vertical , $side , $height) {
	$area = ($vertical * $side * $height);
	echo "直方体の体積は".$area."です";
}

// 直方体体積 = 縦×横×高さ
getRectangular (5,10,8);

?>