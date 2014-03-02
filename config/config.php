<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'football_clubs';
$connect = mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db($dbname);
?>