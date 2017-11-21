<?php
mb_language("ja");
mb_internal_encoding("UTF-8");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>kadai1_5</title>
</head>
<body>
<?php
$data = $_POST['toukou'];
print ("次のデータを受け取りました<br />");
print ("名前：$toukou<br />");
$fp = fopen("kadai1-5.txt", "a");
fwrite($fp, $data);
fclose($fp);
?>
<form action="kadai1_5.php" method="post">
  <input type="text" name="toukou" size="30" value="" /><br />

  <input type="submit" value="register" /><br />
</form>

</body>
</html>


