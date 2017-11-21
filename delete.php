<html>
<head>
<title>PHP TEST</title>
</head>
<body>
<script>
    /**
     * 確認ダイアログの返り値によりフォーム送信
    */
    function submitChk () {
        /* 確認ダイアログ表示 */
        var flag = confirm ( "削除してもよろしいですか？\n\n削除したくない場合は[キャンセル]ボタンを押して下さい");
        /* send_flg が TRUEなら送信、FALSEなら送信しない */
        return flag;
    }
</script>
<h1>削除ページ</h1>
<form>
<input type="button" value="投稿" onclick="location.href='keijiban.php'">
<input type="button" value="表示" onclick="location.href='display.php'">
<input type="button" value="編集" onclick="location.href='edit.php'">
</form>
<?php
session_start();
echo $_SESSION['pass1'];
$passw = $_SESSION['pass1'];
?>
<form method="post" action="delete.php" onsubmit="return submitChk()">
<p>番号</p>
<input type="text" name="delete" >
<input type="hidden" name="pas" value="<?php echo $passw; ?>">
<input type="submit" value="削除">
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

$no = $_POST['delete'];
$pas = $_POST['pas'];

$sql = 'SELECT * FROM log1';
$result = $db->query($sql);
$error = 2;

foreach($result as $row){
if(($row['no'] == $no) && ($row['passwd'] == $pas)){
$error = 1;
}
}
if($error ==1){
$sql = 'DELETE FROM log1 where no = :no';
$stmt = $db -> prepare($sql);
$stmt -> bindParam(':no', $no, PDO::PARAM_INT);
$stmt -> execute();

$db = null;
echo "削除が完了しました";
}else{
echo "番号が違います";
}


?>
</body>
</html>