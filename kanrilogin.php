<html>
<head>
<title>管理者ログイン</title>

</head>
<body>

<h1>管理者用ログイン</h1>
<form>
<input type="button" value="topに戻る" onclick="location.href='TOPlogin.php'">
</form>

<form method="post" action="kanrilogin.php">
<p>id</p>
<input type="text" name="personid" >
<p>パスワード</p>
<input type="text" name="pas">
<input type="submit" value="確認">
</form>


<?php
//編集機能
$personid = $_POST['personid'];
$pas = $_POST['pas'];
session_start();

if ($_POST['personid'] == ""
     || $_POST['pas'] == ""
    ){
die("全ての項目を入力してください");
}
$dsn = 'データベース名';
$user = 'ユーザー名';
$password = 'パスワード';

try{
    $db = new PDO($dsn, $user, $password);

     
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}



$sql = 'SELECT * FROM kanri';
$result = $db->query($sql);

foreach($result as $row){
if(($row['id'] == $personid)&& ($row['passwd'] == $pas)){
header("Location:kanridisplay.php");
}
}

?>

</body>
</html>