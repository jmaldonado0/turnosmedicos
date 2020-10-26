<?php

function Con()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "usbw";
 $db = "turnosmedicos";


 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>