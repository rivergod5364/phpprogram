<html>
<head><title>新規登録</title></head>
<body>

<h1>新規登録</h1><form>
<input type="button" value="ログインページ" onclick="location.href='TOPlogin.php'">
</form>
<form method="post" action="newregister.php">
<p>名前</p>
<input type="text" name="personal_name">
<p>パスワード</p>
<input type="text" name="pas"><br><br>
<input type="submit" value="新規登録">
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


if ( $_POST['personal_name'] == ""
     || $_POST['pas'] == ""
    ){
die("全ての項目を入力してください");
}


$personal_name = $_POST['personal_name'];
$pas = $_POST['pas'];
$personid = mt_rand(100,999);


$stmt = $db -> prepare("INSERT INTO idname (name, id, passwd) VALUES (:name,:id,:passwd)");
$stmt->bindParam(':name', $personal_name, PDO::PARAM_STR);
$stmt->bindParam(':id', $personid, PDO::PARAM_STR);
$stmt->bindParam(':passwd', $pas, PDO::PARAM_INT);
$stmt->execute();

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