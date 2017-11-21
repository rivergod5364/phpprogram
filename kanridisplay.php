<html>
<head><title>掲示板</title></head>
<body>

<h1>管理者ページ</h1>
<p>上手く表示されないときはページを更新してください</p>
<form>
<input type="button" value="削除" onclick="location.href='alldelete.php'">
<input type="button" value="topに戻る" onclick="location.href='TOPlogin.php'">
</form>
<p>利用者一覧の名前とID</p>
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
echo "<br><br>全ての掲示板の投稿 <br>";
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