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
$name="aaaa";
$text="bbbbb";
$no =2;
$sql = "update log set name =:name, text = :text where no = :no";
$stmt = $db -> prepare($sql);
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':text', $text, PDO::PARAM_STR);
$stmt->bindParam(':no', $no, PDO::PARAM_INT);
$stmt->execute();


$db = null;
?> 
</body>
</html>