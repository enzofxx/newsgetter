<?php

require_once 'DB.php';

// $sql = " CREATE TABLE IF NOT EXISTS 15min
//  (id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
//  title TEXT NOT NULL UNIQUE,
//  link TEXT NOT NULL UNIQUE,
//  description TEXT NOT NULL,
//  author TEXT NOT NULL,
//  category TEXT NOT NULL,
//  pubDate TEXT NOT NULL,
//  guid TEXT NOT NULL
//  )";

// $conn->exec($sql);

$myfile = simplexml_load_string(file_get_contents("https://www.15min.lt/rss"), 'SimpleXMLElement', LIBXML_NOCDATA);
// https://www.15min.lt/rss
// echo '<pre>';
// var_dump($myfile);
foreach ($myfile->channel->item as $a) {
    var_dump($a);
}

foreach ($myfile->channel->item as $a) {
    $sql = "INSERT INTO 15min (title, link, description, author, category, pubDate, guid)
  VALUES ('$a->title', '$a->link', '$a->description', '$a->author','$a->category', '$a->pubDate', '$a->guid')";
    
    try {
        $conn->exec($sql);
    } catch (Exception $e){

    }
}

// header('Location: index.php');