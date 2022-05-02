<?php

require_once 'DB.php';

// $sql = " CREATE TABLE IF NOT EXISTS alfa
//  (id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
//  title TEXT NOT NULL UNIQUE,
//  description TEXT NOT NULL,
//  link TEXT NOT NULL UNIQUE,
//  guid TEXT NOT NULL
//  )";

// $conn->exec($sql);

$myfile = simplexml_load_string(file_get_contents("https://rss.app/feeds/Nm57XBNUL9ozuFBR.xml"), 'SimpleXMLElement', LIBXML_NOCDATA);

foreach ($myfile->channel->item as $a) {
    $sql = "INSERT INTO alfa (title, description, link, guid)
  VALUES ('$a->title', '$a->description', '$a->link', '$a->guid')";
    
    try {
        $conn->exec($sql);
    } catch (Exception $e){

    }

}

header('Location: index.php');