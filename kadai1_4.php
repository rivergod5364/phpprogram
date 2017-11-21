<?php
mb_language("ja");
mb_internal_encoding("UTF-8");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>kadai1_4</title>
</head>
<body>
<?php
  $name = $_POST['name'];
  print ("次のデータを受け取りました<br />");
  print ("名前：$name<br />");
?>
<form action="kadai1_4.php" method="post">
  <input type="text" name="name" size="30" value="" /><br />

  <input type="submit" value="register" /><br />
</form>

</body>
</html>