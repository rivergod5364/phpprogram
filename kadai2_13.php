<html>
<head><title>PHP TEST</title></head>
<body>

<?php
$dsn = '�f�[�^�x�[�X��';
$user = '���[�U�[��';
$password = '�p�X���[�h';

try{
    $db = new PDO($dsn, $user, $password);

    print('�ڑ��ɐ������܂����B<br>');  
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}
$name="aaaa";
$text="bbbbb";
$no =2;
$sql = "update log set name =:name, text = :text where no = :no";
$stmt = $db -> prepare($sql);
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':text', $text, PDO::PARAM_STR);
$stmt->bindParam(':no', $no, PDO::PARAM_INT);
$stmt->execute();


$db = null;
?> 
</body>
</html>