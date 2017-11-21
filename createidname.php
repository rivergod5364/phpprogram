
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


$sql = 'CREATE TABLE idname(
  name VARCHAR(80),
  id  VARCHAR(80),
  passwd INT(4)
);';

if($sql){
 echo"成功";
}

$result = $db -> query($sql);

$db = null;
?> 
</body>
</html>

