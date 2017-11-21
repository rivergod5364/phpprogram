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

$sql = 'SHOW TABLES';
$result = $db->query($sql);

foreach($result as $row){
echo $row[0];
echo '<br>';
}

$db = null;

?> 
</body>
</html>