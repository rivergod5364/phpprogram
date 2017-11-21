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
        var flag = confirm ( "送信してもよろしいですか？\n\n送信したくない場合は[キャンセル]ボタンを押して下さい");
        /* send_flg が TRUEなら送信、FALSEなら送信しない */
        return flag;
    }
</script>

<h1>管理者削除ページ</h1>
<form>
<input type="button" value="戻る" onclick="location.href='kanridisplay.php'">
</form>

<form method="post" action="alldelete.php" onsubmit="return submitChk()">
<p>番号</p>
<input type="text" name="delete" >
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

$sql = 'DELETE FROM log where no = :no';
$stmt = $db -> prepare($sql);
$stmt -> bindParam(':no', $no, PDO::PARAM_INT);
$stmt -> execute();

$db = null;
echo "削除が完了しました";

?>
</body>
</html>