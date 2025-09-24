<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>メール送信完了｜メール送信フォーム</title>
</head>
<body>

<?php
/*******************************
 データの受け取り 
*******************************/
$company	= $_POST["company"];		//企業名
$busyo	        = $_POST["busyo"];	        //部署名
$tantousya	= $_POST["tantousya"];		//担当者名
$mailadress	= $_POST["mailadress"];		//メールアドレス
$shubetsu	= $_POST["syubetsu"];		//お問合せ種別
$naiyou		= $_POST["naiyou"];		//お問合せ内容

//危険な文字列を入力された場合にそのまま利用しない対策
$namae		= htmlspecialchars($namae, ENT_QUOTES);
$mailaddress	= htmlspecialchars($mailaddress, ENT_QUOTES);
$naiyou		= htmlspecialchars($naiyou, ENT_QUOTES);

/*******************************
 未入力チェック 
*******************************/
$errmsg = '';	//エラーメッセージを空にしておく
if ($company == '') {
	$errmsg = $errmsg.'<p>企業名が入力されていません。</p>';
}
if ($busyo == '') {
	$errmsg = $errmsg.'<p>部署名が入力されていません。</p>';
}
if ($tantousya == '') {
	$errmsg = $errmsg.'<p>担当者名が入力されていません。</p>';
}
if ($mailadress == '') {
	$errmsg = $errmsg.'<p>メールアドレスが入力されていません。</p>';
}
if ($syubetsu == '') {
	$errmsg = $errmsg.'<p>お問合せ種別が入力されていません。</p>';
}
if ($naiyou == '') {
	$errmsg = $errmsg.'<p>お問合せ内容が入力されていません。</p>';
}

/*******************************
 メール送信の実行
*******************************/
if ($errmsg != '') {
	//エラーメッセージが空ではない場合には、[前のページへ戻る]ボタンを表示する
	echo $errmsg;
	
	//[前のページへ戻る]ボタンを表示する
	echo '<form method="post" action="confirm_company.php">';
	echo '<input type="text" name="company" value="'.$company.'">';
	echo '<input type="text" name="busyo" value="'.$busyo.'">';
	echo '<input type="text" name="tantousya" value="'.$tantousya.'">';
	echo '<input type="email" name="emailadress" value="'.$emailadress.'">';
	echo '<input type="radio" name="syubetsu" value="'.$syubetsu.'">';
	echo '<input type="inputs" name="naiyou" value="'.$naiyou.'">';
	echo '<input type="submit" name="backbtn" value="前のページへ戻る">';
	echo '</form>';
} else {
	//エラーメッセージが空の場合には、メール送信処理を実行する
	//メール本文の作成
	$honbun = '';
	$honbun .= "メールフォームよりお問い合わせがありました。\n\n";
	$honbun .= "【企業名】\n";
	$honbun .= $company."\n\n";
	$honbun .= "【部署名】\n";
	$honbun .= $busyo."\n\n";
	$honbun .= "【担当者名】\n";
	$honbun .= $tantousya."\n\n";
	$honbun .= "【メールアドレス】\n";
	$honbun .= $emailadress."\n\n";
	$honbun .= "【お問い合わせ種別】\n";
	$honbun .= $syubetsu."\n\n";
	$honbun .= "【お問い合わせ内容】\n";
	$honbun .= $naiyou."\n\n";

	//エンコード処理
	mb_language("Japanese");
	mb_internal_encoding("UTF-8");

	//メールの作成
	$mail_to	= "kaken.xfree@gmail.com";			//送信先メールアドレス
	$mail_subject	= "メールフォームよりお問い合わせ";	//メールの件名
	$mail_body	= $honbun;				//メールの本文
	$mail_header	= "from:".$mailaddress;			//送信元として表示されるメールアドレス
	
	//メール送信処理
	$mailsousin	= mb_send_mail($mail_to, $mail_subject, $mail_body, $mail_header);
	
	//メール送信結果
	if($mailsousin == true) {
		echo '<p>お問い合わせメールを送信しました。</p>';
	} else {
		echo '<p>メール送信でエラーが発生しました。</p>';
	}
}
?>

</body>
</html>