<html>
<head>
<title>編集</title>
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
<p>編集ページ</p>
<form>
<input type="button" value="投稿" onclick="location.href='keijiban.php'">
<input type="button" value="削除" onclick="location.href='delete.php'">
<input type="button" value="表示" onclick="location.href='display.php'">
</form>
<?php
session_start();
echo $_SESSION['pass2'];
echo "さん";
$passw = $_SESSION['pass1'];
?>
<form method="post" action="edit.php">
<p>投稿番号を入力してください</p>
<input type="text" name="edit" >
<input type="hidden" name="pas" value="<?php echo $passw; ?>">
<input type="submit" value="編集">
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
//編集機能
$edit = $_POST['edit'];
$pas = $_POST['pas'];

if ($_POST['edit'] == ""
    ){
die("全ての項目を入力してください");
}


$sql = 'SELECT * FROM log1';
$result = $db->query($sql);

foreach($result as $row){
if(($row['no'] == $edit)&& ($row['passwd'] == $pas)){
echo $row['no'].',';
echo $row['name'].',';
echo $row['text'].',';
echo $row['time'].',';
echo $row['passwd'].'<br>';
$result1=$row['name'];
$result2=$row['text'];
$result3=$row['no'];
}
} //foreach文のカッコ
unset($l);

$db = null;
?>

<form method="POST" action="editconf.php" onsubmit="return submitChk()">
<input type="text" name="name" value="<?php echo $result1; ?>"><br>
<input type="text" name="text" value="<?php echo $result2; ?>">
<input type="hidden" name="no" value="<?php echo $result3; ?>">
<input type="submit" value="上書きする">
</form>	


</body>
</html>