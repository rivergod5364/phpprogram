<html>
<head><title>PHP TEST</title></head>
<body>
<form>
<input type="button" value="マイページ" onclick="location.href='keijiban.php'">
</form>
<?php
$no = $_POST['no'];
$name = $_POST['name'];
$text = $_POST['text'];
$dsn = 'データベース名';
$user = 'ユーザー名';
$password = 'パスワード';
try{
    $db = new PDO($dsn, $user, $password);

}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}


$sql = "update log1 set name =:name, text = :text where no = :no";
$stmt = $db -> prepare($sql);
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':text', $text, PDO::PARAM_STR);
$stmt->bindParam(':no',$no , PDO::PARAM_INT);
$stmt->execute();

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
