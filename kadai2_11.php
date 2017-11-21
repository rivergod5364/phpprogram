<html>
<head><title>PHP TEST</title></head>
<body>

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

$name="kawaue";
$text="kaeritai";
$stmt = $db -> prepare("INSERT INTO info (no, name, text) VALUES (:no, :name,:text)");
$stmt->bindValue(':no', 3, PDO::PARAM_INT);
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':text', $text, PDO::PARAM_STR);
$stmt->execute();

$db = null;

?> 
</body>
</html>