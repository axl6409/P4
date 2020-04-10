
<div class="hero" style="background-image: url('public/assets/<?= $optionImage->name; ?>')">
    <div class="hero-overlay"></div>
    <div class="hero-container">
        <h1>Contactez moi</h1>
    </div>
</div>

<div class="container contact-container">
    <div class="row">

        <div class="col-md-12">
            <div class="contact-head">
                <p>Vous avez une question, une proposition de partenariat, ou autre ? Vous pouvez me contacter en remplissant le formualire si dessous !</p>
            </div>
        </div>

        <div class="col-md-6">
            <form method="post">
                <?= $form->input('nom', 'Nom') ;?>
                <?= $form->input('nom', 'Prénom') ;?>
                <?= $form->input('nom', 'Mail') ;?>
                <?= $form->input('nom', 'Message', ['type' => 'textarea']) ;?>
                <?= $form->submit('Envoyer'); ?>
            </form>
        </div>
        <div class="col-md-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d16138.768535132325!2d-1.4694244971404247!3d43.492835380297024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1586450598578!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>

    </div>
</div>

