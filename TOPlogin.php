<?php
$idcook = $_COOKIE["IDCookie"];
?>
<html>
<head>
<title>ログイン</title>

</head>
<body>
<script>
    /**
     * 確認ダイアログの返り値によりフォーム送信
    */
    function submitChk () {
        /* 確認ダイアログ表示 */
        var flag = confirm ( "送信してもよろしいですか？\n\n送信したくない場合は[キャンセル]ボタンを押して下さい");
        /* send_flg が TRUEなら送信、FALSEなら送信しない */
        return flag;
    }
</script>

<h1>掲示板へようこそ</h1>
<form>
<input type="button" value="新規ログイン" onclick="location.href='newregister.php'">
<input type="button" value="管理者ログイン" onclick="location.href='kanrilogin.php'">
</form>
<h2>ログイン</h2>
<form method="post" action="TOPlogin.php" onsubmit="return submitChk()">
<p>id</p>
<input type="text" name="personid" value="<?php echo $idcook; ?>" >
<p>パスワード</p>
<input type="text" name="pas">
<input type="submit" value="確認">
</form>


<?php
//編集機能
$personid = $_POST['personid'];
$pas = $_POST['pas'];
setcookie("IDCookie",$personid);
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



$sql = 'SELECT * FROM idname';
$result = $db->query($sql);

foreach($result as $row){
if(($row['id'] == $personid)&& ($row['passwd'] == $pas)){
$personname = $row['name'];
$_SESSION['personname'] = $personname;
header("Location:keijiban.php");
}
}

?>

</body>
</html>