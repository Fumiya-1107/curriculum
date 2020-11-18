<?php 
	$name = $_POST['name'];

	$question = $_POST['port'];//ラジオボタンの内容を受け取る
	$question2 = $_POST['language'];//ラジオボタンの内容を受け取る
	$question3 = $_POST['command'];//ラジオボタンの内容を受け取る


	$answer = $_POST['reply'];//正解の内容を受け取る
	$answer2 = $_POST['reply2'];//正解の内容を受け取る
	$answer3 = $_POST['reply3'];//正解の内容を受け取る

	if ($question == $answer) {
		$result = "正解！";
	} else {
		$result = "残念・・・";
	}

	if ($question2 == $answer2) {
		$result2 = "正解！";
	} else {
		$result2 = "残念・・・";
	}

	if ($question3 == $answer3) {
		$result3 = "正解！";
	} else {
		$result3 = "残念・・・";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>2章チェックテスト解答</title>
	<link rel="stylesheet" href="css/common.css">
</head>
<body>
<div class="kaitou">
	<p><?php echo $name; ?>さんの結果は・・・？</p>
	<p>①の答え</p>
	<?php echo $result; ?><!--作成した関数を呼び出して結果を表示-->

	<p>②の答え</p>
	<?php echo $result2; ?><!--作成した関数を呼び出して結果を表示-->

	<p>③の答え</p>
	<?php echo $result3; ?><!--作成した関数を呼び出して結果を表示-->
</div>
</body>
</html>