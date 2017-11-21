<?php
$dsn = 'データベース名';
$user = 'ユーザー名';
$password = 'パスワード';

try{
    $db = new PDO($dsn, $user, $password);

    print('接続に成功しました。<br>');  
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}
$sql = 'DELETE FROM info where no = :no';
$stmt = $db -> prepare($sql);
$stmt -> bindValue(':no', 2, PDO::PARAM_INT);
$stmt -> execute();
?>