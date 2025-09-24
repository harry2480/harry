<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="http://kadaiken.html.xdomain.jp/css/contact.css">
<title>入力内容の確認｜メール送信フォーム</title>
</head>
<body>

<?php
/*******************************
 データの受け取り
*******************************/
/* データの受け取り */
$name = $_POST["name"]; //お名前
$email = $_POST["email"]; //メールアドレス
$game = $_POST["game"]; //ゲーム
$webarticle = $_POST["webarticle"]; //Web記事
$website = $_POST["website"]; //Webサイト
$naiyou = $_POST["naiyou"]; //お問合せ内容

//危険な文字列を入力された場合にそのまま利用しない対策
$name	= htmlspecialchars($name, ENT_QUOTES);
$email	= htmlspecialchars($email, ENT_QUOTES);
$naiyou	= htmlspecialchars($naiyou, ENT_QUOTES);

/*******************************
 未入力チェック
*******************************/
$errmsg = '';	//エラーメッセージを空にしておく
if ($name == '') {
	$errmsg = $errmsg.'<p>お名前が入力されていません。</p>';
}
if ($email == '') {
	$errmsg = $errmsg.'<p>メールアドレスが入力されていません。</p>';
}
if ($naiyou == '') {
	$errmsg = $errmsg.'<p>お問い合せ内容が入力されていません。</p>';
}

/*******************************
 入力内容の確認
*******************************/
if ($errmsg != '') {
	//エラーメッセージが空ではない場合には、エラーメッセージを表示する
	echo $errmsg;

//[前のページへ戻る]ボタンを表示する
	echo '<form method="post" action="http://kadaiken.html.xdomain.jp/contact_general.html">';
	echo '<input type="submit" name="backbtn" value="前のページへ戻る">';
	echo '</form>';
} 
else {
	//エラーメッセージが空の場合には、入力された内容を画面表示する
	echo '<h3>入力内容を確認します</h3>';
	echo '<dl>';
	echo '<dt>【お名前】</dt><dd>'.$name.'</dd>';
	echo '<dt>【メールアドレス】</dt><dd>'.$email.'</dd>';
	echo '<dt>【お問い合わせ内容】</dt><dd>'.nl2br($naiyou).'</dd>';
	echo '</dl>';

//[上記内容で送信する]ボタンを表示する
	echo '<form method="post" action="http://kadaiken.php.xdomain.jp/mailpost_general.php">';
	echo '<input type="submit" name="okbtn" value="上記内容で送信する">';
	echo '</form>';
}

?>

</body>
</html>