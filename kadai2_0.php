<html>
<head><title>PHP TEST</title></head>
<body>

<p>掲示板</p>

<form method="post" action="kadai2_0.php">
<input type="text" name="delete" value="数字">
<input type="submit" value="削除">
</form>


<?php
$delete = $_POST['delete'];
if($delete != NULL){
$lines = file("log.txt");
$dnum = $delete -1;
unset($lines[$dnum]);
foreach ($lines as &$l){
$element = explode("<>",$l);

if($element[0] > $delete){
$element[0] = $element[0] -1;
	

$ele = implode("<>",$element);
	//array_push ($ele,'\n');
	$l = $ele;
}
}
unset($l);


// ファイルオープン

$fp = fopen("log.txt", 'w');
fwrite($fp,implode($lines));
fclose($fp);
}else{
echo '値を入力してください';
}
?>
</body>
</html>