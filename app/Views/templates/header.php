<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">

        <title><?= App::getInstance()->title; ?></title>

        <style>
            main {
                padding-top: 150px;
            }

            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link href="public/sass/global.css" rel="stylesheet">
        <script src="https://www.google.com/recaptcha/api.js?render=6Lf1pegUAAAAAIgBXbP59G9g6Ljak4ZvVe5bD10d"></script>
    </head>

    <body>
        <header>
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] === '1') { ?>
                <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                        <ul class="navbar-nav mr-auto">

                            <li class="nav-item">
                                <a class="nav-link" href="index.php?p=admin.posts.index">Histoires<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?p=admin.comments.index">Commentaires</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?p=admin.images.index">Images</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?p=admin.users.index">Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?p=admin.options.index">Options</a>
                            </li>

                        </ul>

                        <a class="btn btn-outline-danger" href="index.php?p=users.logout">Déconnexion</a>
                        <span class="sr-only">(current)</span>
                    </div>
                </nav>
            <?php } ?>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === '1') { ?>
            <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top public-bar">
                <?php } else {?>
                <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
                    <?php } ?>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <a class="navbar-brand" href="index.php">JF</a>

                    <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php?p=posts.index">Chapitres</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php?p=contact.index">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === '2') { ?>
                        <a class="btn btn-outline-success account-btn" href="index.php?p=users.index&id=<?= $_SESSION['auth']; ?>">Mon Compte</a>
                        <span class="sr-only">(current)</span>
                        <a class="btn btn-outline-danger account-btn" href="index.php?p=users.logout">Déconnexion</a>
                        <span class="sr-only">(current)</span>
                    <?php } elseif (isset($_SESSION['role']) && $_SESSION['role'] === '1') { ?>
                        <a class="nav-link log-link disp-none" href="index.php?p=users.login">Login</a>
                        <span class="sr-only">(current)</span>
                    <?php } else { ?>
                        <a class="nav-link log-link" href="index.php?p=users.login">Login</a>
                        <span class="sr-only">(current)</span>
                    <?php } ?>
                </nav>
        </header>


        <main role="main">
