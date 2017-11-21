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

$id="kanri";
$stmt = $db -> prepare("INSERT INTO kanri (id, passwd) VALUES (:id, :passwd)");
$stmt->bindParam(':id', $id, PDO::PARAM_STR);
$stmt->bindValue(':passwd', 4649, PDO::PARAM_INT);
$stmt->execute();

$db = null;

?> 
</body>
</html>