<?php

require_once 'DB.php';

$myfile = simplexml_load_string(file_get_contents("https://www.delfi.lt/rss/feeds/lithuania.xml"), 'SimpleXMLElement', LIBXML_NOCDATA);


foreach ($myfile->channel->item as $a) {
    
    $sql = "INSERT INTO articles (title, description, link, guid, comments, pubDate)
  VALUES ('$a->title', '$a->description', '$a->link', '$a->guid', '$a->comments', '$a->pubDate')";
    
    try {
        $conn->exec($sql);
    } catch (Exception $e){

    }

}

header('Location: index.php');