<?php

class OMDBRequest {
    private $requestURL = "http://www.omdbapi.com/?type=movie&v=1";

    public function __construct($title = "The Room", $page = 1) {
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