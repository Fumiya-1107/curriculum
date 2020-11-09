<?php

$testFile = "test.txt";
$contents = "シワもニオイもとる「服のミスト」スキっと気持ちよく着られる香りが残らないタイプ";

if (is_writable($testFile)) {
    $fp = fopen($testFile,"w");
    fwrite($fp,$contents);
    fclose($fp);

    echo "書き込み成功";
} else {
    echo "書き込み失敗";

    exit;
}

?>