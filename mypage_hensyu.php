<?php
mb_internal_encoding("utf8");
session_start();

//mypage.phpからの導線以外はログインエラーへリダイレクト

if(empty($_POST['from_mypage'])){
    header('Location: https://localhost/login_mypage/login_error.php');
}

?>

<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>マイページ編集</title>
    <link rel="stylesheet" type="text/css" href="mypage_hensyu.css">
</head>

<body>
    <header>
        <img src="4eachblog_logo.jpg">
        <div class="login"><a href="login.php">ログイン</a> <a href="log_out.php">ログアウト</a></div>
    </header>
    <main>
    <form action="mypage_update.php" method="post" >
    <div class="confirm">
        <h2>会員情報</h2>
        <p>こんにちは！<?php echo $_SESSION['name']; ?>さん</p>
        <div class="picture">
            <img src="<?php echo $_SESSION['picture']; ?>">
        </div>
        <div class="date">
            <div class="name">
                氏名： <input type="text" value="<?php echo $_SESSION['name']; ?>" name="name"  required  >
            </div>
            <div class="mail">
                メールアドレス:<input type="text" value="<?php echo $_SESSION['mail']; ?>"name="mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required >
            </div>
            <div class="password">
                パスワード:<input type="text" value="<?php echo $_SESSION['password']; ?>" name="password" pattern="^[a-zA-Z0-9]{6,}$"  required >
            </div>
        </div>
        
        <div class="comments">            
        <textarea rows="5" cols="45" name="comments"><?php echo $_SESSION['comments']; ?></textarea>
        </div>
        <input type="submit" value="この内容に変更する" class="submit" >
    </div>
    </form>
    </main>
    <footer>
        ©2018 InterNous.inc. All rights reserved
    </footer>
</body>

</html>