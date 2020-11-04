<!-- round -->
<?php

// 値段
$price = 232.78;
// 個数
$tax = 1.1;
// 合計 
$total = $price * $tax;

echo "合計".$total."です。";

echo "四捨五入すると".round($total)."です。";

?>