<?php
$hostname = 'localhost';
$database = 'user';
$username = 'newuser';
$password = 'password';

try{
  $db = new PDO("mysql:dbname=$database;host=$hostname",$username,$password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Connection failed: " . $e->getMessage();
}

