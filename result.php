<?php
session_start();
require 'dbconfig/config.php';

// it will print whole json string, which you access after json_decocde in php
$myData = json_decode($_POST['myData']);
//print_r($myData->answer);
$array=$myData->answer;
      
print_r($array[1]);
?>
