<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=parser", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  die;
}

$sql = " CREATE TABLE IF NOT EXISTS articles
 (id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
 title TEXT NOT NULL UNIQUE,
 description TEXT NOT NULL,
 link TEXT NOT NULL UNIQUE,
 guid TEXT NOT NULL,
 comments TEXT NOT NULL,
 pubDate TEXT NOT NULL
 )";

$conn->exec($sql);