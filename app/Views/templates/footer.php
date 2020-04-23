<!--
Main Footer
-->
        </main><!-- /.container -->

        <footer class="footer"> <!-- Footer -->
            <div class="footer-lists-container">

                <div class="footer-nav">
                    <h3>Plan du site</h3>
                    <ul>
                        <li class="footer-nav-item">
                            <a class="" href="index.php">Home<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="footer-nav-item">
                            <a class="" href="index.php?p=posts.index">Chapitres</a>
                        </li>
                        <li class="footer-nav-item">
                            <a class="" href="index.php?p=contact.index">Contact</a>
                        </li>
                        <li class="footer-nav-item">
                            <a class="" href="index.php?p=users.login">Connexion</a>
                        </li>
                        <li class="footer-nav-item">
                            <a class="" href="index.php?p=users.signIn">Inscription</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-socials">
                    <h3>Mes réseaux</h3>
                    <ul>
                        <li class="footer-nav-item">
                            <i class="fab fa-facebook-square"></i>
                            <a href="#">Facebook</a>
                        </li>
                        <li class="footer-nav-item">
                            <i class="fab fa-twitter-square"></i>
                            <a href="#">Twitter</a>
                        </li>
                        <li class="footer-nav-item">
                            <i class="fab fa-instagram-square"></i>
                            <a href="#">Instagram</a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="footer-copyright">
                <p>2020 - Site Développed By <a href="https://alexandre-celier.fr">Alexandre Celier</a> | <a href="https://vectorweb.fr">VectorWeb</a></p>
                <p></p>
            </div>
        </footer> <!-- End Footer -->

        <!-- CDNs -->
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/478ea9f976.js" crossorigin="anonymous"></script>

        <!-- Google - ReCaptcha V3 -->
        <script>
            grecaptcha.ready(function() {
                // do request for recaptcha token
                // response is promise with passed token
                grecaptcha.execute('6Lf1pegUAAAAAIgBXbP59G9g6Ljak4ZvVe5bD10d', {action:'validate_captcha'})
                    .then(function(token) {
                        // add token value to form
                        document.getElementById('g-recaptcha-response').value = token;
                    });
            });
        </script>

        <!-- Include the ckeditor standard cdn -->
        <!-- For Admin -->
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === '1') { ?>
            <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
        <!-- For Regular Users -->
        <?php } else { ?>
            <script src="https://cdn.ckeditor.com/4.14.0/basic/ckeditor.js"></script>
        <?php } ?>
        <!-- Insert ckeditor in HTML -->
        <script>
            CKEDITOR.replace( 'editor1', {
                language: 'fr',
                uiColor: '#d5dcd6',
                width: '100%',
                height: '100%'
            });
        </script>
        <!-- Main JS Custom Script -->
        <script src="public/js/main.js"></script>

    </body>
</html>
