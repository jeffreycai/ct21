<?php
define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'wwwct21comau');
define('MYSQL_PASS', 'PPvNdDaKQJyeErsK');
define('MYSQL_DB', 'wwwct21comau');

//-- initialize MySQL
global $mysqli;
$mysqli = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
if ($mysqli->connect_errno) {
  printf("Connect failed: %s", $mysqli->connect_error);
  exit;
}
