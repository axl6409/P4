
<div class="container admin-container">
    <div class="row">
        <h1>My Account</h1>

        <div class="row">

            <div class="col-md-6">

                <div>
                    <img src="public/img/<?= $user->image ;?>" alt="image de profil de l'utilisateur">
                </div>

                <p><?= $user->username ;?></p>

                <p><?= $user->mail ;?></p>

            </div>

            <div class="col-md-6">
                <a href="index.php?p=users.update&id=<?= $_SESSION['auth']; ?>">Modifier</a>
            </div>

        </div>

    </div>
</div>
