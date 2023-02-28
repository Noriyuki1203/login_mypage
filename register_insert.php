<?php
mb_internal_encoding("utf8");

//DB接続
require "DB.php";
$db=new DB();
$pdo=$db->connect();

//prepared statementでSQL文の型を作る
$stmt = $pdo->prepare($db->insert());
//bindValueメソッドでパラメータをセット
$stmt->bindValue(1, $_POST['name']);
$stmt->bindValue(2, $_POST['mail']);
$stmt->bindValue(3, $_POST['password']);
$stmt->bindValue(4, $_POST['path_filename']);
$stmt->bindValue(5, $_POST['comments']);

//executeでクエリを実行
$stmt->execute();
$pdo = NULL;

header('Location:after_register.html');