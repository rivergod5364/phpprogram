﻿<html>
<head><title>PHP TEST</title></head>
<body>

<p>掲示板</p>

<form method="post" action="kadai2_6.php">
<p>番号</p>
<input type="text" name="edit" >
<p>パスワード</p>
<input type="text" name="pas">
<input type="submit" value="編集">
</form>


<?php
//編集機能
$edit = $_POST['edit'];
$pas = $_POST['pas'];
if($edit != NULL){
$lines = file("log.txt");
foreach ($lines as &$l){
$element = explode("<>",$l);
$tri = trim($element[4]);
if(($element[0] == $edit) && ($tri == $pas)){
echo '一致しています';
$result1=$element[1];
$result2=$element[2];
$result3=$element[0];
}
} //foreach文のカッコ
unset($l);

echo $result1;
echo $result2;

}else{ echo '値を入力してください';}
?>

<form method="POST" action="kadai2_6.php">
<input type="text" name="result1" value="<?php echo $result1; ?>"><br><br>
<input type="text" name="result2" value="<?php echo $result2; ?>">
<input type="hidden" name="result3" value="<?php echo $result3; ?>">
<br><br>
<input type="submit" value="上書きする">
</form>	
<?php
$result1 = $_POST['result1'];
$result2 = $_POST['result2'];
$result3 = $_POST['result3'];
echo $result1;
echo $result2;
echo $result3;
$lines = file("log.txt");
foreach ($lines as &$l){
$element = explode("<>",$l);
if($result3 == $element[0]){
$element[1]=$result1;
$element[2]=$result2;
$ele = implode("<>",$element);
	$l = $ele;
}
}
unset($l);

$fp = fopen("log.txt", 'w');
fwrite($fp,implode($lines));
fclose($fp);
?>

</body>
</html>