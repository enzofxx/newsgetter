<?php

require_once 'DB.php';

// $sql = " CREATE TABLE IF NOT EXISTS delfi
//  (id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
//  title TEXT NOT NULL UNIQUE,
//  description TEXT NOT NULL,
//  link TEXT NOT NULL UNIQUE,
//  guid TEXT NOT NULL,
//  comments TEXT NOT NULL,
//  pubDate TEXT NOT NULL
//  )";

// $conn->exec($sql);

$myfile = simplexml_load_string(file_get_contents("https://www.delfi.lt/rss/feeds/lithuania.xml"), 'SimpleXMLElement', LIBXML_NOCDATA);


foreach ($myfile->channel->item as $a) {
    $sql = "INSERT INTO delfi (title, description, link, guid, comments, pubDate)
  VALUES ('$a->title', '$a->description', '$a->link', '$a->guid', '$a->comments', '$a->pubDate')";
    
    try {
        $conn->exec($sql);
    } catch (Exception $e){

    }

}

header('Location: index.php');