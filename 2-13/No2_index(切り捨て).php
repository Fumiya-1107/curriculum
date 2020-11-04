<!-- floor -->
<?php

// 重量
$weight = 65.84;
// 個数
$quantity = 4;
// 合計 
$total = $weight * $quantity;

echo "合計".$total."です。";

echo "切り捨てすると".floor($total)."です。";

?>