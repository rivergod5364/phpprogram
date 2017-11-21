<?php
$dsn = 'データベース名';
$user = 'ユーザー名';
$password = 'パスワード';

try{
    $db = new PDO($dsn, $user, $password);

    print('接続に成功しました。<br>');  
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

CREATE TABLE image(
  `id` int UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(255) NOT NULL COMMENT 'ファイル名',
  `type` tinyint(2) NOT NULL COMMENT 'IMAGETYPE定数',
  `raw_data` mediumblob NOT NULL COMMENT '原寸大データ',
  `thumb_data` blob NOT NULL COMMENT 'サムネイルデータ',
  `date` datetime NOT NULL COMMENT '日付'
);';

if($sql){
 echo"成功";
}

$result = $db -> query($sql);

$db = null;