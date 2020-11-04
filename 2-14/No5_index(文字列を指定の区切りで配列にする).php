<!-- explode -->
<?php
$members = ["doraemon", "nobita", "jyaian", "suneo", "dekisugi","sizuka"];
$result = implode("と", $members);
var_dump($result);

$re_members = explode("と", $result);
var_dump($re_members);
?>