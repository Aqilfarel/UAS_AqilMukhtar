<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "tutorialci";

$con = mysqli_connect($host, $user, $pass, $db) or die(mysqli_connect_error());

mysqli_select_db($con, $db);
