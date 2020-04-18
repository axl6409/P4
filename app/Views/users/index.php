<!--
 -- Public ****************
 -- Main users page
 -->

<div class="container admin-container"> <!-- Container -->
    <div class="row"> <!-- Row -->

        <!-- Main Title -->
        <h1 class="admin-title">Mon Compte</h1>

        <div class="col-md-12 user-account-container">

            <div class="user-account-image">
                <img src="public/img/<?= $user->image ;?>" alt="image de profil de l'utilisateur">
            </div>

            <div class="user-account-infos">
                <p>Pseudo : <?= $user->username ;?></p>

                <p>Mail : <?= $user->mail ;?></p>
            </div>

            <div class="user-account-btn">
                <a class="btn btn-outline-success" href="index.php?p=users.update&id=<?= $_SESSION['auth']; ?>">Modifier</a>
            </div>

        </div>

    </div> <!-- End Row -->
</div> <!-- End Container -->
