<?php

$news = new NewsDB();
$items = $news->getNews();

if (!empty($items)) {
 $errMsg = 'Hot news!!!';
}
if (!empty($items)) {
foreach ($items as $item) {
    $dt = date("Y-M-D h:m:s", $item['datetime']);
    $id = $item['id'];
    //news output
    echo "<h3>" . $item['title'] . "</h3>";
    echo "<h4>" . $item['description'] . "</h4>";
    echo "<h4>" . 'Category - ' . $item['category'] . "</h4>";
    echo "<h4>" . $item['source'] . ' @ ' . $dt . "</h4>";

    echo "<p>
            <a href=delete_news.inc.php?delete=$id method='get'>delete</a>
          </p>";
    }
}
