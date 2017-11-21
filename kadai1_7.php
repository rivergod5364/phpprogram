<?php

  $file_name = "kadai1-6.txt";
  $ret_array = file( $file_name );
  for( $i = 0; $i < count($ret_array); ++$i ) {
    echo( $ret_array[$i] . "<br />\n" );
  }
?>