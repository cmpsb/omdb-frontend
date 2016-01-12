<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?= htmlspecialchars($title) ?> - OMDb</title>

        <link rel="stylesheet" href="/res/bs/css/bootstrap.min.css">
        <link rel="stylesheet" href="/res/bs/css/bootstrap-theme.min.css">

        <style>
            img.poster {
                height: 144px;
                width: 100px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand">omdb-frontend</a>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <form action="search.php" method="get">
                    <div class="input-group">
                        <input class="form-control" type="search" name="t" value="<?= $title ?>">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
            <ul class="pager">
                <?php if($page > 1): ?>
                    <li class="previous">
                        <a href="?t=<?= $ucTitle ?>&p=<?= ($page - 1) ?>">Previous</a>
                    </li>
                <?php else: ?>
                    <li class="previous disabled">
                        <a href="#">Previous</a>
                    </li>
                <?php endif; ?>
                
                <?php if($search->getNumResults() == 10): ?>
                    <li class="next">
                        <a href="?t=<?= $ucTitle ?>&p=<?= ($page + 1) ?>">Next</a>
                    </li>
                <?php else: ?>
                    <li class="next disabled">
                        <a href="#">Next</a>
                    </li>
                <?php endif; ?>
            </ul>
            <?php if($page == 1 && $search->getNumResults() == 0): ?>
                <div class="alert alert-danger">
                    <strong>No movies found!</strong>
                    You must be into some really obscure movies then.
                </div>
            <?php elseif($page > 1 && $search->getNumResults() == 0): ?>
                <div class="alert alert-warning">
                    <strong>Whoops.</strong> There are no results left.
                    <br>
                    <small>The OMDb API does not give the total number of results, leaving the app 
                    to guess whether there are more pages. Turns out that the guess was wrong!
                    (Sorry about that.)</small>
                </div>
            <?php else: ?>
                <table class="table">
                    <?= $resultsTable->getHTML() ?>
                </table>
            <?php endif; ?>
            <ul class="pager">
                <?php if($page > 1): ?>
                    <li class="previous">
                        <a href="?t=<?= $ucTitle ?>&p=<?= ($page - 1) ?>">Previous</a>
                    </li>
                <?php else: ?>
                    <li class="previous disabled">
                        <a href="#">Previous</a>
                    </li>
                <?php endif; ?>
                
                <?php if($search->getNumResults() == 10): ?>
                    <li class="next">
                        <a href="?t=<?= $ucTitle ?>&p=<?= ($page + 1) ?>">Next</a>
                    </li>
                <?php else: ?>
                    <li class="next disabled">
                        <a href="#">Next</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </body>
</html>