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
        <link href="public/sass/global.scss" rel="stylesheet">
    </head>

    <body>
        <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="index.php">JF</a>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
                    </li>

                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === '1') { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?p=admin.posts.index">Admin<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?p=admin.comments.index">Commentaires</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= ucfirst($_SESSION['name']); ?></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                    <?php } elseif (isset($_SESSION['role']) && $_SESSION['role'] === '2') { ?>
                        <a class="nav-link" href="index.php?p=users.index&id=<?= $_SESSION['auth']; ?>">Mon Compte</a>
                        <span class="sr-only">(current)</span>
                    <?php } else { ?>
                        <a class="nav-link" href="index.php?p=users.login">Login</a>
                        <span class="sr-only">(current)</span>
                        <a class="nav-link" href="index.php?p=users.signIn">SignIn</a>
                        <span class="sr-only">(current)</span>
                    <?php } ?>

                </ul>
                <?php if(isset($_SESSION['auth'])) { ?>
                    <a class="btn btn-outline-danger" href="index.php?p=users.logout">Déconnexion</a>
                    <span class="sr-only">(current)</span>
                <?php } ?>
            </div>
        </nav>

        <main role="main">
