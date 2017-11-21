<html>
<head><title>PHP TEST</title></head>
<body>

<p>掲示板</p>

<form method="post" action="kadai2_3.php">
<p>名前</p>
<input type="text" name="personal_name"><br><br>
<p>内容</p>
<textarea name="contents" rows="8" cols="40">
</textarea><br><br>
<p>パスワード</p>
<input type="text" name="pas"><br><br>
<input type="submit" value="投稿する">
</form>

<?php

$personal_name = $_POST['personal_name'];
$contents = $_POST['contents'];
$time = date('Y-m-d');
$pas = $_POST['pas'];

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
fwrite($fp,"<>");
fclose($fp);

$fp = fopen("log.txt", "a");
fwrite($fp,$pas);
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
echo $element[3];
echo $element[4]."<br>\n";
}


?>
</body>
</html>