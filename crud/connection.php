<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ongraph';

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
	die('connnection Failed' . mysqli_connect_error());
}