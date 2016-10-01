<?php
$host = "localhost";
$username = "root";
$password = "root";
$dbname = "kuchikomi";

$mysqli = new mysqli($host, $username, $password, $dbname);
if ($mysqli->connect_error) {
  error_log($mysqli->connect_error);
  exit;
}
