<?php
$a= "aaaaaa";
$b= "thank you";
$handle = fopen( "a.txt", 'w');
	fwrite( $handle, $a);
	fclose( $handle );


print $b;
?>