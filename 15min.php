<?php

require_once 'DB.php';

$myfile = simplexml_load_string(file_get_contents("https://www.15min.lt/rss"), 'SimpleXMLElement', LIBXML_NOCDATA);
// https://www.15min.lt/rss
echo '<pre>';
// var_dump($myfile);
foreach ($myfile->channel->item as $a) {
    var_dump($a);
}