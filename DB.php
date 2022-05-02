<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=parser", $username, $password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  die;
}

$sql = " CREATE TABLE IF NOT EXISTS delfi
 (id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
 title TEXT NOT NULL UNIQUE,
 description TEXT NOT NULL,
 link TEXT NOT NULL UNIQUE,
 guid TEXT NOT NULL,
 comments TEXT NOT NULL,
 pubDate TEXT NOT NULL
 )";

$conn->exec($sql);

$sql = " CREATE TABLE IF NOT EXISTS 15min
 (id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
 title TEXT NOT NULL UNIQUE,
 link TEXT NOT NULL UNIQUE,
 description TEXT NOT NULL,
 author TEXT NOT NULL,
 category TEXT NOT NULL,
 pubDate TEXT NOT NULL,
 guid TEXT NOT NULL
 )";

$conn->exec($sql);

$sql = " CREATE TABLE IF NOT EXISTS alfa
 (id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
 title TEXT NOT NULL UNIQUE,
 description TEXT NOT NULL,
 link TEXT NOT NULL UNIQUE,
 guid TEXT NOT NULL
 )";

$conn->exec($sql);
