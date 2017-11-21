<html>
<head><title>掲示板</title></head>
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

<h1>掲示板</h1>
<?php
session_start();
echo $_SESSION['personname'];
echo "さん。ようこそ";
$person = $_SESSION['personname'];
$_SESSION['pass2'] = $person;
?>
<form>
<input type="button" value="戻る" onclick="location.href='TOPlogin.php'">
<input type="button" value="削除" onclick="location.href='delete.php'">
<input type="button" value="編集" onclick="location.href='edit.php'">
<input type="button" value="表示" onclick="location.href='display.php'">
</form>

<form method="post" action="keijiban.php" onsubmit="return submitChk()">
<input type="hidden" name="personal_name" value="<?php echo $person; ?>">
<p>内容</p>
<input type="text" name="contents" >
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


if ( $_POST['contents'] == ""
    ){
die("全ての項目を入力してください");
}

$personal_name = $_POST['personal_name'];
$contents = $_POST['contents'];
$time = date('Y-m-d');


$file='num.txt';
$fp=fopen($file,"r+");
$num=fgets($fp);
fclose($fp);

session_start();

$sql = 'SELECT * FROM idname';
$result = $db->query($sql);
foreach($result as $row){
if($row['name'] == $personal_name){
$pas = $row['passwd'];
$_SESSION['pass1'] = $pas;
}
}


$stmt = $db -> prepare("INSERT INTO log1 (no,name,text,time,passwd) VALUES (:no,:name,:text,:time,:passwd)");
$stmt->bindParam(':no',$num , PDO::PARAM_INT);
$stmt->bindParam(':name', $personal_name, PDO::PARAM_STR);
$stmt->bindParam(':text', $contents, PDO::PARAM_STR);
$stmt->bindParam(':time', $time, PDO::PARAM_STR);
$stmt->bindParam(':passwd', $pas, PDO::PARAM_INT);
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
$num=$num+1;
$fp = fopen("num.txt", "w");
fwrite($fp,$num);
fclose($fp);

?>
</body>
</html>