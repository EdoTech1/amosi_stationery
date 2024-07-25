<?php
define("webserver","localhost");
define("user","root");
define("password","");
define("db","amosi");
$con=mysqli_connect(webserver,user,password,db) or die("connection fail");
?>