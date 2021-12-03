<?php

//include class NewsDB
function myAutoloadSaveNews ($cName)
{
    include $cName . ".php";
}
spl_autoload_register("myAutoloadSaveNews");

if (!empty($_POST['title']) && !empty($_POST['category']) && !empty($_POST['description']) && !empty($_POST['source'])) {

    $newsDB = new NewsDB();
    $mysqli = $newsDB->dbConnect();
    $mysqli = $newsDB->_db;
        //cheking data
    $title = $mysqli->real_escape_string(strip_tags(trim($_POST['title'])));
    $category = abs((int)$_POST['category']);
    $description = $mysqli->real_escape_string(strip_tags(trim($_POST['description'])));
    $source = $mysqli->real_escape_string(strip_tags(trim($_POST['source'])));
        //save post in DB
    $newsDB->saveNews($title, $category, $description, $source);
    header('Location: /news.php');
}
