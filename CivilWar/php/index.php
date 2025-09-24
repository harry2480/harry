<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>お問合せ内容の入力｜メール送信フォーム</title>
</head>
<body>

<?php
/*******************************
 確認ページから戻ってきた場合のデータの受け取り 
*******************************/
if (isset($_POST["backbtn"])) {
	//確認ページ（confirm.php）から戻ってきた場合にはデータを受け取る
	$name		= $_POST["name"];		//お名前
	$email	= $_POST["email"];	//メールアドレス
	$naiyou		= $_POST["naiyou"];		//お問合せ内容

	//危険な文字列を入力された場合にそのまま利用しない対策
	$name		= htmlspecialchars($name, ENT_QUOTES);
	$email	= htmlspecialchars($email, ENT_QUOTES);
	$naiyou		= htmlspecialchars($naiyou, ENT_QUOTES);
} else {
	//確認ページから戻ってきた場合でなければ、変数の値は必ず空となる
	$name		= '';				//お名前
	$email	= '';				//メールアドレス
	$naiyou		= '';				//お問合せ内容
}
?>

<form method="post" action="confirm.php">
<p><label>お名前：<br>
<input type="text" maxlength="255" name="namae" value="<?=$name?>">
</label></p>

<p><label>メールアドレス：<br>
<input type="email" size="30" maxlength="255" name="mailaddress" value="<?=$email?>">
</label></p>

<p><label>お問合せ内容：<br>
<textarea name="naiyou" cols="40" rows="5"><?=$naiyou?></textarea>
</label></p>

<p><input type="submit" value="入力内容を確認する"></p>
</form>
</body>
</html>