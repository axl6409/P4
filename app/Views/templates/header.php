<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Alexandre Celier">
        <meta name="og:title" content="Jean Forteroche - Écrivain français passionné">
        <meta name="og:url" content="https://www.projets.alexandre-celier.fr/P4">
        <meta name="og:description" content="Jean Forteroche est un écrivain français, passionné par l'écriture et la puissance des mots, il publie son nouveau roman gratuitement en ligne">
        <meta name="og:image" content="https://projets.alexandre-celier.fr/P4/public/assets/writer-machine.jpg">
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
        <!-- Custom SASS Stylesheets  -->
        <link href="public/sass/global.css" rel="stylesheet">
        <link rel="icon" href="public/assets/logojf.png">
        <!-- Google ReCaptcha V3 API -->
        <script src="https://www.google.com/recaptcha/api.js?render=6Lf1pegUAAAAAIgBXbP59G9g6Ljak4ZvVe5bD10d"></script>
    </head>

    <body>

        <!-- Header -->
        <header>

            <!-- Admin NavBar -->
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] === '1') { ?>
                <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse admin-bar">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <a class="navbar-brand" href="index.php?p=admin.posts.index">Chapitres</a>

                    <div class="collapse navbar-collapse resp-collapse" id="navbarsExampleDefault">
                        <ul class="navbar-nav mr-auto">

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

                        <a class="btn btn-outline-success account-btn" href="index.php?p=users.index&id=<?= $_SESSION['auth']; ?>">Mon Compte</a>
                        <span class="sr-only">(current)</span>
                        <a class="btn btn-outline-danger logout-btn" href="index.php?p=users.logout">Déconnexion</a>
                        <span class="sr-only">(current)</span>
                    </div>
                </nav>
            <?php } ?>

            <!-- Regular User NavBar -->
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === '1') { ?>
            <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse public-bar admin-bar-active">
                <?php } else {?>
                <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse public-bar">
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
                        <a class="nav-link log-link disp-none" href="index.php?p=users.login">Connexion</a>
                        <span class="sr-only">(current)</span>
                        <a class="nav-link log-link disp-none" href="index.php?p=users.signIn">Inscription</a>
                        <span class="sr-only">(current)</span>
                    <?php } else { ?>
                        <a class="nav-link log-link" href="index.php?p=users.login">Connexion</a>
                        <span class="sr-only">(current)</span>
                        <a class="nav-link log-link" href="index.php?p=users.signIn">Inscription</a>
                        <span class="sr-only">(current)</span>
                    <?php } ?>
                </nav>
            </nav>

        </header>


        <main role="main">
