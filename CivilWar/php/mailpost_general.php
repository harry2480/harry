<!DOCTYPE HTML>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
メール送信完了｜メール送信フォーム
  </title>


  <meta name="viewport" content="width=device-width">
  <meta name="keywords" content="歴史、FPS、3D、シューティング、城">
  <meta name="description" content="城の頂上のゴールを目指すゲーム「CivilWar」の公式サイトです">
  <link rel="stylesheet" href="http://kadaiken.html.xdomain.jp/css/sp.css">
  <link rel="stylesheet" href="http://kadaiken.html.xdomain.jp//css/pc.css">
　<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<!--==============レイアウトを制御する独自のCSSを読み込み===============-->
<link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/reset.css">
<link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/9-2-2/css/9-2-2.css">
<link rel="stylesheet" type="text/css" href="http://kadaiken.html.xdomain.jp/css/tabmenu.css">
<!--<link rel="stylesheet" type="text/css" href="http://kadaiken.html.xdomain.jp/css/humburger.css">-->
<link rel="stylesheet" href="http://kadaiken.html.xdomain.jp/css/sam.css">
</head>


	
<!--ブラウザ用アイコン画像 -->
<!--⇒png画像の場合-->
<link rel="icon" href="favicon.ico">
<link rel="icon" type="image/png" href="http://kadaiken.html.xdomain.jp/image/eto.png">　

<!--iPhone用のアイコン設定-->
<link rel="apple-touch-icon" sizes="180x180" href="http://kadaiken.html.xdomain.jp/eto.png">
<!--Android用のアイコン設定-->
<link rel="apple-touch-icon" sizes="180x180" href="http://kadaiken.html.xdomain.jp/eto.png">

<!--<link rel="icon" type="image/gif" href="/favicon.gif">　⇒gif画像の場合
  <!--[if lt IE 9]>
<script src="js/html5.js"></script>S
<script src="js/css3-mediaqueries.js"></script>
<![endif]-->
	
<!--Webページ内検索-->

<!--ハンバーガーメニュー-->
 <!-- <div class="header-logo-menu">
<!--  <div id="nav-drawer">
  <!--    <input id="nav-input" type="checkbox" class="nav-unshown">
 <!--     <label id="nav-open" for="nav-input"><span></span></label>
 <!--     <label class="nav-unshown" id="nav-close" for="nav-input"></label>
 <!--   <div id="nav-content-header">ヘッダー</div>
 <!--       <ul><br>
       <!-- <li><a href="http://kadaiken.html.xdomain.jp/civilwar.html#introduction" style="text-decoration:none;">はじめに</a></li>
<!--
    <!--  </ul>
<!--      </div>

<!--<script>
<!--$(function() {
 <!-- $('#nav-content li a').on('click', function(event) {
    <!--$('#nav-input').prop('checked', false);
<!--  });
<!--});
<!--</script>

 <!--</div>
 <!--<div class="logo-area"></div>
 <!-- </div>
<!--ハンバーガーメニュー-->




<!--ページ読み込み-->


<!--ページ読み込みここまで-->


<!-- 検索ボックス -->
<div style="display:inline-flex;">
  <button type="button" title="サイト内検索" onclick="document.querySelector('#wrap-site-search').style.display=(document.querySelector('#wrap-site-search').style.display==='none')?'inline-block':'none';document.querySelector('#wrap-site-search input').focus();" style="background:transparent;cursor:pointer;border:0px solid transparent;">🔍</button>
  <div id="wrap-site-search" style="display: none;">
    <input type="text" placeholder="サイト内検索" onkeyup="if(event.keyCode===13)location.href=`http://kadaiken.html.xdomain.jp/civilwar.html?q=site%3A${location.host}+${encodeURIComponent(event.currentTarget.value)}`">
  </div>
</div>
<!--Webページ内検索ここまで-->



</head>

<body>

  <!-- メイン -->

  <div id="main">


    <!-- ヘッダー -->


    <div id="header">

      <h1>
        CivilWar
      </h1>


      <div id="header_inner" class="clearfix">
        <div id="h_logo">
          <h2><a href="http://kadaiken.html.xdomain.jp/civilwar.html" style="text-decoration:none;">CivilWar</a>
          </h2>
          <p class="h_sub">

          </p>
        </div>
        <div id="h_nav">
          <ul>
            <li><a href="#introduction">
                はじめに
	    <li><a href="http://kadaiken.html.xdomain.jp/civilwar.html#synopsis">あらすじ</a></li>
            <li><a href="http://kadaiken.html.xdomain.jp/civilwar.html#news">最新情報</a></li>
	    <li><a href="http://kadaiken.html.xdomain.jp/article.html">新着記事</a></li>
	</ul>
        </div>
      </div>

    </div>



    <!-- SPナビアイコン ここから -->
    <!-- <button type="button" class="nav_icon" onclick="location.href='#footer'">
      <span class=""></span>
      <span class="bar2"></span>
      <span class="bar3"></span>
    </button>
    <!-- SPナビアイコン ここまで -->



    <!-- ヘッダー終わり -->



    <!-- メイン画像 ここから -->


    <!-- メイン画像 ここまで -->



    <!-- コンテンツ -->

    <!-- メインコンテンツ -->




<?php
/*******************************
 データの受け取り
*******************************/
$name		= $_POST["name"];		//お名前
$email	        = $_POST["mail"];	        //メールアドレス
$naiyou		= $_POST["naiyou"];		//お問合せ内容

//危険な文字列を入力された場合にそのまま利用しない対策
$name		= htmlspecialchars($name, ENT_QUOTES);
$email	        = htmlspecialchars($email, ENT_QUOTES);
$naiyou		= htmlspecialchars($naiyou, ENT_QUOTES);

/*******************************
 未入力チェック
*******************************/
//$errmsg = '';	//エラーメッセージを空にしておく
//if ($name == '') {
	//$errmsg = $errmsg.'<p>お名前が入力されていません。</p>';
//}
//if ($email == '') {
	//$errmsg = $errmsg.'<p>メールアドレスが入力されていません。</p>';
//}
//if ($naiyou == '') {
	//$errmsg = $errmsg.'<p>お問い合わせ内容が入力されていません。</p>';
//}

/*******************************
 メール送信の実行
*******************************/
if ($errmsg != '') {
	//エラーメッセージが空ではない場合には、エラーメッセージを表示する
	echo $errmsg;
	
	//[前のページへ戻る]ボタンを表示する
	echo '<form method="post" action="index.php">';
	//echo '<input type="text" name="name" value="'.$name.'">';
	//echo '<input type="text" name="email" value="'.$email.'">';
	//echo '<input type="text" name="naiyou" value="'.$naiyou.'">';
	echo '<input type="submit" name="backbtn" value="前のページへ戻る">';
	echo '</form>';
} 
else {
	//エラーメッセージが空の場合には、メール送信処理を実行する
//メール本文の作成
	$honbun = '';
	$honbun .= "メールフォームよりお問い合わせがありました。\n\n";
	$honbun .= "【お名前】\n";
	$honbun .= $name."\n\n";
	$honbun .= "【メールアドレス】\n";
	$honbun .= $email."\n\n";
	$honbun .= "【お問い合わせ内容】\n";
	$honbun .= $naiyou."\n\n";
	
	//エンコード処理
	mb_language("Japanese");
	mb_internal_encoding("UTF-8");

	//メールの作成
	$mail_to	= "kaken.xfree@gmail.com";			//送信先メールアドレス
	$mail_subject	= "メールフォームよりお問い合わせ";	//メールの件名
	$mail_body	= $honbun;				//メールの本文
	$mail_header	= "from:".$mailadress;			//送信元として表示されるメールアドレス
	
	//メール送信処理
	$mailsousin	= mb_send_mail($mail_to, $mail_subject, $mail_body, $mail_header);
	
	//メール送信結果
	if($mailsousin == true) {
		echo '<center><p>お問い合わせフォーム（送信完了）</p><center>
お問い合わせ頂き、誠にありがとうございました。
お問い合わせ内容を確認させていただき、後ほど担当者よりご回答をさせていただきます。
恐れ入りますが、今しばらくお待ちいただけますよう、宜しくお願い申し上げます。
3日程度経過してもメールが来ない場合は、よくあるご質問に掲載してあるメールアドレスからお願いいたします。なお、内容によっては返信できない場合もございます。ご了承ください。
<p>- 2022.1.26 課題研究「CivilWar」プロジェクトリーダー（PL）-</p>';
	} else {
		echo '<p>メール送信でエラーが発生しました。</p>';
	}
}

?>

<!-- 各種SNSにシェア -->
<p>＼各種SNSにシェア／</p>

<!-- 各種SNSにシェア -->
<p>Share on SNS</p>
<!-- Twitterにシェア -->
<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>


<!-- Fscebookにシェア -->
<head>
<!-- You can use Open Graph tags to customize link previews.
Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
<meta property="og:url"           content="https://www.your-domain.com/your-page.html" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Your Website Title" />
<meta property="og:description"   content="Your description" />
<meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" />
</head>

<body>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v12.0" nonce="UjsDRAAO"></script></body>
	

<!-- Your share button code -->
<div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">シェア</a></div>
	
<!-- LINEにシェア-->

<div class="line-it-button" data-lang="ja" data-type="share-a" data-env="REAL" data-url="https://developers.line.biz/ja/docs/line-social-plugins/install-guide/using-line-share-buttons/" data-color="default" data-size="small" data-count="true" data-ver="3" style="display: none;"></div>
<script src="https://www.line-website.com/social-plugins/js/thirdparty/loader.min.js" async="async" defer="defer"></script>  <br>

<!--<a href="https://social-plugins.line.me/lineit/share?url="><img src="../3年/課題研究/素材/SendLINE.png" width="80" height="20"></a>
<br>
<!-- 各種SNSにシェア -->



      <!-- フッター -->

      <div id="footer">

        <div class="footer_nav">
          <ul class="clearfix">
            <li><a href="http://kadaiken.html.xdomain.jp/privacy.html">プライバシーポリシー</a></li>
	    <li><a href="http://kadaiken.html.xdomain.jp/service.html">利用規約</a></li>
	    <li><a href="http://kadaiken.html.xdomain.jp/right.html">知的財産権に関して</a></li>
	    <li><a href="http://kadaiken.html.xdomain.jp/article.html">新着記事</a></li>
	    <li><a href="http://kadaiken.html.xdomain.jp/contact.html">よくあるご質問/お問い合わせ</a></li>
	　　<li><a href="http://kadaiken.html.xdomain.jp/sitemap.html">サイトマップ</a></li>
            
			<li></li>
          </ul>

          <p class="copy">
            © 2021 <a href="http://kadaiken.html.xdomain.jp/civilwar.html" style="text-decoration:none;">CivilWar</a>
          </p>

        </div>

      </div>



      <!-- フッター終わり -->

    </div>

    <!-- メイン終わり -->

</body>

</html>