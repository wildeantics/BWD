<?php

$host       = "localhost";
$username   = "root";
$password   = "root";
$dbname     = "wilde_bwd"; 
$dsn        = "mysql:host=$host;dbname=$dbname"; 
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );
  /* Attempt to connect to MySQL database */
try{
  $pdo_connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e){
  die("ERROR: Could not connect. " . $e->getMessage());
}
?>