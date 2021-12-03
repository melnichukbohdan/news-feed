<?php

//include class NewsDB
function myAutoloadNews ($cName)
{
    include_once $cName . ".php";
}
spl_autoload_register("myAutoloadNews");


$news = new NewsDB();
$errMsg = 'None news';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'save_news.inc.php';
}

if (isset($_GET['delete'])) {
    include 'delete_news.inc.php';
}
?>

<!DOCTYPEHTML>
    <head>
        <title>Latest news</title>
    </head>
    <body>
        <h1>Latest news</h1>
            <form id="news" action="/save_news.inc.php" method="post">
            <label for="title">title</label><br>
            <input id="title" name="title" type="text" required><br><br>

            <label for="category">category</label><br>
            <select id="category" name="category" form="news">
                <option label="Politics" value="1" selected>Politics</option>
                <option label="Culture" value="2">Culture</option>
                <option label="Sport" value="3">Sport</option>
            </select><br><br>

            <label for="description">description</label><br>
            <textarea id="description" name="description" form="news" required
                      style="width: 173px;
                             height: 200px;">

            </textarea><br><br>

            <label for="source">source</label><br>
            <input id="source" name="source" type="text" required><br><br>

            <input type="submit" value="submit">
        </form>
    </body>

<?php

echo "<br>" . "<h3>$errMsg</h3>" ;

include 'get_news.inc.php';