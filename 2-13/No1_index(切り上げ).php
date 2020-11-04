<!-- ceil -->
<?php

// 重量
$weight = 80.23;
// 個数
$quantity = 3;
// 合計 
$total = $weight * $quantity;

echo "合計".$total."です。";

echo "切り上げすると".ceil($total)."です。";

?>