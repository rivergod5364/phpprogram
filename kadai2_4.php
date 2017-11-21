<html>
<head><title>PHP TEST</title></head>
<body>

<p>掲示板</p>

<form method="post" action="kadai2_4.php">
<input type="text" name="personal_name"><br><br>
<textarea name="contents" rows="8" cols="40">
</textarea><br><br>
<input type="submit" value="投稿する">
</form>
<form method="post" action="kadai2_0.php">
<input type="text" name="delete">
<input type="submit" value="削除">
</form>
<?php

$personal_name = $_POST['personal_name'];
$contents = $_POST['contents'];
$time = date('Y-m-d');

$file='num.txt';
$fpa=fopen($file,"r+");
$num=fgets($fpa);
fclose($fpa);

$fp = fopen("log.txt", "a");
fwrite($fp,$num);
fclose($fp);		



$fp = fopen("log.txt", "a");
fwrite($fp,"<>");
fclose($fp);

$fp = fopen("log.txt", "a");
fwrite($fp,$personal_name);
fclose($fp);

$fp = fopen("log.txt", "a");
fwrite($fp,"<>");
fclose($fp);

$fp = fopen("log.txt", "a");
fwrite($fp,$contents);
fclose($fp);

$fp = fopen("log.txt", "a");
fwrite($fp,"<>");
fclose($fp);

$fp = fopen("log.txt", "a");
fwrite($fp,$time);
fclose($fp);

$fp = fopen("log.txt", "a");
fwrite($fp,"\n");
fclose($fp);

$num=$num+1;
$fpa = fopen("num.txt", "w");
fwrite($fpa,$num);
fclose($fpa);


$lines = file("log.txt");
foreach ($lines as $l){
$element = explode("<>",$l);
echo $element[0];
echo $element[1];
echo $element[2];
echo $element[3]."<br>\n";
}
//削除機能
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
}

?>
</body>
</html>