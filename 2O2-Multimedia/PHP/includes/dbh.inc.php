<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "2o2-multimedia";

/*$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);*/

try
{
 $conn = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsername, $dbPassword);
}
catch(PDOException $e)
 {
    echo  $e->getMessage();
 }
?>