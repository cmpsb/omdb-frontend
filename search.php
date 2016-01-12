<?php

require_once("request.php");
require_once("detail.php");
require_once("results.php");

if(isset($_GET["t"])) {
    $title = $_GET["t"];
}
else {
    $title = "The Room";
}

if(isset($_GET["p"])) {
    $page = $_GET["p"];
}
else {
    $page = 1;
}

$search = new OMDBSearch($title, $page);
$results = $search->sendRequest();

foreach($results as $result) {
    $details = new OMDBDetail($result->imdbID);
    $result->details = $details->sendRequest();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Search results for "<?= $title ?>"</title>
        <meta charset="UTF-8" />
    </head>
    <body>
        <?= (new ResultsFormatter($results))->getHTML() ?>
    </body>
</html>