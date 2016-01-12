<?php

class ResultsFormatter {
    private $html = "";

    public function __construct($results) {
        foreach($results as $movie) {
            $poster = ($movie->Poster == "N/A")? "missing-poster.png": $movie->Poster;
            if($movie->details->imdbRating != "N/A") {
                $hue = $movie->details->imdbRating * 12;
                $rating = "<span style=\"color: hsl(" . $hue . ",100%,40%); font-weight: bold;\">"
                        .   $movie->details->imdbRating
                        . "</span>"
                        . "<br />"
                        . "<span style=\"color: DarkGray; font-size: 80%;\">/ 10</span>";
            }
            else $rating = "<span style=\"color: DarkGray; font-size: 80%;\">N/A</span>";

            $this->html .= "<tr class=\"movie\">"
                        .    "<td class=\"poster hidden-xs\">"
                        .      "<a href=\"http://www.imdb.com/title/" . $movie->imdbID . "\">"
                        .        "<img src=\"" . $poster . "\" alt=\"poster\" class=\"poster\"/>"
                        .      "</a>"
                        .    "</td>"
                        .    "<td class=\"title\">"
                        .      "<a href=\"http://www.imdb.com/title/" . $movie->imdbID . "\">"
                        .        htmlspecialchars($movie->Title)
                        .      "</a>"
                        .    "</td>"
                        .    "<td class=\"plot\">"
                        .      htmlspecialchars($movie->details->Plot)
                        .    "</td>"
                        .    "<td class=\"rating\">"
                        .      $rating
                        .    "</td>"
                        .  "</tr>";
        }
    }

    public function getHTML() {
        return $this->html;
    }
}