<?php
class DB{
    public function connect(){
        $pdo = new PDO("mysql:dbname=lesson01;host=localhost;", "root", "");
        return $pdo;
    }

    public function insert(){
        return "insert into login_mypage(name,mail,password,picture,comments)values(?,?,?,?,?)";
    }
}

?>