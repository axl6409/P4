        </main><!-- /.container -->

        <footer class="footer">
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
                            <a class="" href="index.php?p=users.login">Login</a>
                        </li>
                        <li class="footer-nav-item">
                            <a class="" href="index.php?p=users.signIn">SignIn</a>
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
                <div class="footer-infos">
                    <ul>
                        <li class="footer-nav-item">
                            <i class="fas fa-balance-scale"></i>
                            <a href="#">Mentions Légales</a>
                        </li>
                        <li class="footer-nav-item">
                            <i class="fas fa-book"></i>
                            <a href="#">RGPD</a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="footer-copyright">
                <p>2020 - Site Développed By <a href="#">Alexandre Celier</a> | <a href="#">VectorWeb</a></p>
                <p></p>
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/478ea9f976.js" crossorigin="anonymous"></script>
        <!-- Include the ckeditor -->
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === '1') { ?>
            <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
        <?php } else { ?>
            <script src="https://cdn.ckeditor.com/4.14.0/basic/ckeditor.js"></script>
        <?php } ?>
        <script src="public/js/main.js"></script>
        <script>
            CKEDITOR.replace( 'editor1', {
                language: 'fr',
                uiColor: '#d5dcd6',
                width: '100%',
                height: '100%'
            });
        </script>
    </body>
</html>
