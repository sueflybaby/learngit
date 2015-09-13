<?php
$mysqli = new mysqli("localhost", "root", "", "app_yyqn");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$mysqli->set_charset("utf8");
//echo $mysqli->host_info . "\n";
?>