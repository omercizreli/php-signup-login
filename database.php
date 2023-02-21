<?php
mysqli_report(MYSQLI_REPORT_OFF);
$username='root';
$hostname='localhost';
$password='';
$dbname='login_db';

$mysqli = new mysqli($hostname,$username,$password,$dbname);

if($mysqli->connect_error){
    die('Connection error');
}
return $mysqli;
