<?php 
mb_internal_encoding("utf8");
session_start();

try {
    //try catch文、DBに接続できなければエラーメッセージを表示
    require "DB.php";
    $db=new DB();
    $pdo=$db->connect();
} catch (PDOException $e) {
    die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスが出来ません<br>
    しばらくしてから再度ログインをしてください</p>
    <a href='https://localhost/login_mypage/login.php'>ログイン画面へ</a>");
}

$stmt = $pdo->prepare("update login_mypage set name = ?,
mail= ?, password = ?, comments= ? where id = ?");


//bindValueメソッドでパラメータをセット
$stmt->bindValue(1, $_POST["name"]);
$stmt->bindValue(2, $_POST["mail"]);
$stmt->bindValue(3, $_POST["password"]);
$stmt->bindValue(4, $_POST["comments"]);
$stmt->bindValue(5, $_SESSION["id"]);

$stmt -> execute();

$stmt = $pdo->prepare("select * from login_mypage where mail = ? && password = ?");

$stmt->bindValue(1, $_POST["mail"]);
$stmt->bindValue(2, $_POST["password"]);

//executeでクエリを実行
$stmt -> execute();

//データベースを切断
$pdo = NULL;

//fetch・while文でデータを取得し、sessionに代入
while($row = $stmt->fetch()){
    $_SESSION['id'] = $row['id'];
    $_SESSION['name']= $row['name'];
    $_SESSION['mail'] = $row['mail'];
    $_SESSION['password']= $row['password'];
    $_SESSION['picture']=$row['picture'];
    $_SESSION['comments']=$row['comments'];   
}

header('Location: https://localhost/login_mypage/mypage.php');
?>