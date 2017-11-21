<html>
<head><title>掲示板</title></head>
<body>

<p>掲示板</p>

<form method="post" action="kadai2_15.php">
<p>投稿番号</p>
<input type="text" name="num">
<p>名前</p>
<input type="text" name="personal_name">
<p>内容</p>
<textarea name="contents" rows="8" cols="40">
</textarea>
<p>パスワード</p>
<input type="text" name="pas">
<input type="submit" value="投稿する">
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

$sql = 'SELECT * FROM log';
$result = $db->query($sql);

foreach($result as $row){
echo $row['no'].',';
echo $row['name'].',';
echo $row['text'].',';
echo $row['time'].',';
echo $row['passwd'].'<br>';
}
if ($_POST['num'] == ""
     || $_POST['personal_name'] == ""
     || $_POST['contents'] == ""
     || $_POST['pas'] == ""
    ){
die("全ての項目を入力してください");
}

$num = $_POST['num'];
$personal_name = $_POST['personal_name'];
$contents = $_POST['contents'];
$time = date('Y-m-d');
$pas = $_POST['pas'];







$stmt = $db -> prepare("INSERT INTO log (no, name, text, time, passwd) VALUES (:no, :name,:text,:time,:passwd)");
$stmt->bindParam(':no',$num , PDO::PARAM_INT);
$stmt->bindParam(':name', $personal_name, PDO::PARAM_STR);
$stmt->bindParam(':text', $contents, PDO::PARAM_STR);
$stmt->bindParam(':time', $time, PDO::PARAM_STR);
$stmt->bindParam(':passwd', $pas, PDO::PARAM_INT);
$stmt->execute();



$db = null;

?>
</body>
</html>