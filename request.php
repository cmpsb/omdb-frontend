<?php

class OMDBSearch {
    private $requestURL = "http://www.omdbapi.com/?type=movie&v=1";

    private $title;
    private $page;

    public function __construct($title, $page) {
        $this->title = $title;
        $this->page = $page;
    }

    public function sendRequest() {
        $this->requestURL .= "&s=" . urlencode($this->title) . "&page=" . urlencode($this->page);

        $response = file_get_contents($this->requestURL);

        $data = json_decode($response);

        return $data->Search;
    }
}