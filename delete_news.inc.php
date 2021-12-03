<?php
//include class NewsDB
function myAutoloadNewsDel ($cName)
{
    include_once $cName . ".php";
}
spl_autoload_register("myAutoloadNewsDel");

$news = new NewsDB();
$id = abs((int)$_GET['delete']);
$news->deleteNews($id);
header('Location: /news.php');
