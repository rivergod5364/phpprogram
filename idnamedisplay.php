<html>
<head><title>掲示板</title></head>
<body>

<p>登録者一覧</p>
<p>名前、ID、パスワードの順</p>

<?php
$dsn = 'データベース名';
$user = 'ユーザー名';
$password = 'パスワード';

try{
    $db = new PDO($dsn, $user, $password);
  
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

$sql = 'SELECT * FROM idname';
$result = $db->query($sql);

foreach($result as $row){
echo $row['name'].',';
echo $row['id'].',';
echo $row['passwd'].'<br>';
}

$db = null;


?>
</body>
</html>