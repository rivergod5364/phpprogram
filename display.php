<html>
<head><title>掲示板</title></head>
<body>

<h1>全ての投稿を表示</h1>
<p>上手く表示されないときはページを更新してください</p>
<form>
<input type="button" value="投稿" onclick="location.href='keijiban.php'">
<input type="button" value="削除" onclick="location.href='delete.php'">
<input type="button" value="編集" onclick="location.href='edit.php'">
<input type="button" value="表示" onclick="location.href='display.php'">
</form>

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


$sql = 'SELECT * FROM log1';
$result = $db->query($sql);

foreach($result as $row){
echo $row['no'].',';
echo $row['name'].',';
echo $row['text'].',';
echo $row['time'].',';
echo $row['passwd'].'<br>';
}


$db = null;

?>
</body>
</html>