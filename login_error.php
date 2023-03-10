<?php
session_start();
//ログイン時にアクセスした場合はマイページへリダイレクト
if(isset($_SESSION['id'])){
    header("Location:mypage.php");
}
?>
<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ログインエラー</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>
    <header>
        <img src="4eachblog_logo.jpg">
        <div class="login"><a href="login.php">ログイン</a></div>
    </header>
    <main>
   
        <form action="mypage.php" method="post">
            <div class="form_contents">
                <p>メールアドレスまたはパスワードが間違っています。</p>
                <div class="mail">
                    <label>メールアドレス</label><br>
                    <input type="text" class="formbox" size="40" name="mail">
                </div>
                <div class="password">
                    <label>パスワード</label><br>
                    <input type="password" class="formbox" size="40" name="password">
                </div>
                <div class="login_check">
                    <label><input type="checkbox" class="formbox" size="40" name="login_keep" value="login_keep">ログイン状態を保持する</label>
                </div>


                <div class="loginbutton">
                    <input type="submit" class="submit_button" size="35" value="ログイン">
                </div>
        </form>
    </main>
    <footer>
        ©2018 InterNous.inc. All rights reserved
    </footer>
</body>