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
    $page = intval($_GET["p"], 10);
    if($page < 1) $page = 1;
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

$resultsTable = new ResultsFormatter($results);

$ucTitle = urlencode($title);

include("view.php");