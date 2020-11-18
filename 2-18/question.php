<?php
	$name = $_POST['name'];

	$question = array();
	$question = array('80','22','20','21');//①ネットワークのポート番号

	$question2 = array();
	$question2 = array('PHP','Python','JAVA','HTML');//②Webページを作成するための言語

	$question3 = array();
	$question3 = array('select','join','insert','update');//③MySQLで情報を取得するためのコマンド

	$answer = $question[0];//①の正解を設定
	$answer2 = $question2[0];//②の正解を設定
	$answer3 = $question3[0];//③の正解を設定

	shuffle($question);//配列の中身をシャッフル
	shuffle($question2);//配列の中身をシャッフル
	shuffle($question3);//配列の中身をシャッフル
?>

<!DOCTYPE html>
<html>
<head>
	<title>2章チェックテスト問題</title>
	<link rel="stylesheet" href="css/common.css">
</head>
<body>
<p>お疲れ様です。<?php echo $name; ?>さん！</p><!--POST通信で送られてきた名前を出力-->
<div class="mondai">
	<form action="answer.php" method="post">
		<h2>ネットワークのポート番号は何番？</h2>
		<?php foreach($question as $value){ ?>
		<input type="radio" name="port" value="<?php echo $value; ?>"/><?php echo $value; ?>
		<?php } ?>


		<h2>Webページを作成するための言語は？</h2>
		<?php foreach($question2 as $value2){ ?>
		<input type="radio" name="language" value="<?php echo $value2; ?>"/><?php echo $value2; ?>
		<?php } ?>


		<h2>MySQLで情報を取得するためのコマンドは？</h2>
		<?php foreach($question3 as $value3){?>
		<input type="radio" name="command" value="<?php echo $value3 ?>"/><?php echo $value3; ?>
		<?php } ?>

		<input type="hidden" name="name" value="<?php echo $name; ?>">
		<input type="hidden" name="reply" value="<?php echo $answer; ?>"/>
		<input type="hidden" name="reply2" value="<?php echo $answer2; ?>"/>
		<input type="hidden" name="reply3" value="<?php echo $answer3; ?>"/>
</div>

		<br>
		<br>
		<input type="submit" value="回答する">
	</form>
</body>
</html>