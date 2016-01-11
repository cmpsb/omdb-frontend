<?php
require_once("request.php");

$req = new OMDBRequest();

$movies = $req->sendRequest();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>OMDb Dummy</title>
        <meta charset="UTF-8" />
    </head>
    <body>
        <h2>Search results</h2>
        <table>
            <tr>
                <th>Title</th>
                <th>Year</th>
            </tr>
            <?php foreach($movies as $movie): ?>
                <tr>
                    <td><a href="http://www.imdb.com/title/<?= $movie->imdbID ?>">
                        <?= $movie->Title ?>
                    </a></td>
                    <td><?= $movie->Year ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>