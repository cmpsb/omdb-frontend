<?php

class ResultsFormatter {
    private $html = "<table>";

    public function __construct($results) {
        foreach($results as $movie) {
            $this->html .= "<tr>"
                        .    "<td class=\"poster\">"
                        .      "<img src=\"" . $movie->Poster . "\" alt=\"poster\" width=\"100px\"/>"
                        .    "</td>"
                        .    "<td class=\"title\">"
                        .      "<a href=\"http://www.imdb.com/title/" . $movie->imdbID . "\">"
                        .        $movie->Title
                        .      "</a>"
                        .    "</td>"
                        .    "<td class=\"plot\">"
                        .      $movie->details->Plot
                        .    "</td>"
                        .    "<td class=\"rating\">"
                        .      $movie->details->imdbRating
                        .    "</td>"
                        .  "</tr>";
        }
    }

    public function getHTML() {
        return $this->html . "</table>";
    }
}