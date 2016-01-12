<?php

class OMDBDetail {
    private $requestURL = "http://www.omdbapi.com/?type=movie&v=1";

    private $imdbID;

    public function __construct($imdbID) {
        $this->imdbID = $imdbID;
    }

    public function sendRequest() {
        $this->requestURL .= "&i=" . urlencode($this->imdbID);

        $response = file_get_contents($this->requestURL);

        $data = json_decode($response);

        return $data;
    }
}