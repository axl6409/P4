<!--
Public
Main page for Contact
 -->

<?php if (isset($msg)) { ?>
    <div class="submit-message" id="formPopup">
        <button id="closePopup">X</button>
        <p><?= $msg; ?></p>
    </div>
<?php } ?>

<div class="hero" style="background-image: url('public/assets/<?= $optionImage->name; ?>')"> <!-- Hero -->
    <div class="hero-overlay"></div>
    <div class="hero-container">
        <h1>Contactez moi</h1>
    </div>
</div> <!-- End Hero -->

<div class="container contact-container"> <!-- Container -->
    <div class="row"> <!-- Row -->

        <div class="col-md-12">
            <div class="contact-head">
                <p>Vous avez une question, une proposition de partenariat, ou autre ? Vous pouvez me contacter en remplissant le formulaire si dessous !</p>
            </div>
        </div>

        <?php if (array_key_exists('errors', $_SESSION)) : ?>
            <div class="alert alert-danger col-md-12">
                <?= implode('<br>', $_SESSION['errors']);?>
            </div>
        <?php unset($_SESSION['errors']);endif; ?>

        <div class="col-md-6 contact-form">
            <form method="post" id="contactForm" action="index.php?p=contact.send">
                <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                <input type="hidden" name="action" value="validate_captcha">
                <?= $form->input('name', 'Nom', '', true) ;?>
                <?= $form->input('firstname', 'Prénom', '', true) ;?>
                <?= $form->input('mail', 'Mail', '', true) ;?>
                <?= $form->input('message', 'Message', ['type' => 'message'], true) ;?>
                <?= $form->submit('Envoyer'); ?>
            </form>
        </div>

        <div class="col-md-6 contact-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d16138.768535132325!2d-1.4694244971404247!3d43.492835380297024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1586450598578!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>

    </div> <!-- End Row -->
</div> <!-- End Container -->

