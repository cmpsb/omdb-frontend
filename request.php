<?php

class OMDBSearch {
    private $requestURL = "http://www.omdbapi.com/?type=movie&v=1";

    private $title;
    private $page;

    private $results = array();

    public function __construct($title, $page) {
        $this->title = $title;
        $this->page = $page;
    }

    public function sendRequest() {
        $this->requestURL .= "&s=" . urlencode($this->title) . "&page=" . urlencode($this->page);

        $response = file_get_contents($this->requestURL);

        $data = json_decode($response);

        if(property_exists($data, "Search")) {
            $this->results = $data->Search;
        }

        return $this->results;
    }

    public function getNumResults() {
        return count($this->results);
    }
}