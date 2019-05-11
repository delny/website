<?php
$titre = WEBSITE_TITLE . ' - Contact';
?>

<?php ob_start(); ?>
  <h1>Vous pouvez me contacter à l'aide de ce formulaire : </h1>
<?php
if (isset($_SESSION['reponse_contact'])) {
  echo '<div class="alert alert-success">' . $_SESSION['reponse_contact'] . '</div>';
  unset($_SESSION['reponse_contact']);
} elseif (isset($erreur)) {
  echo '<div class="alert alert-danger">' . $erreur . '</div>';
}

if ($formulaire) : ?>
  <form class="contact" method="post" action="page-contact.html">
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="medium-9 cell">
          <label for="nom">
            Nom
            <input type="text" required name="nom" id="nom" value="<?php echo $form->getNom(); ?>">
          </label>
        </div>
        <div class="medium-9 cell">
          <label for="courriel">
            Courriel
            <input type="email" required name="courriel" id="courriel"
                   value="<?php echo $form->getCourriel(); ?>">
          </label>
        </div>
        <div class="medium-9 cell">
          <label for="sujet">
            Sujet
            <input type="text" required name="sujet" id="sujet"
                   value="<?php echo $form->getSujet(); ?>">
          </label>
        </div>
        <div class="medium-9 cell">
          <label for="message">
            Message
            <textarea name="message" id="message"
                      rows="3"><?php echo $form->getMessage(); ?></textarea>
          </label>
        </div>
        <div class="medium-9 cell">
          <label for="accept">
            J'accepte que mes données soit transmises<br/>
            et que mon courriel/e-mail soit utilisé pour &ecirc;tre recontact&eacute;
          </label>
          <input id="accept" required name="accept" type="checkbox">
        </div>
        <div class="g-recaptcha" data-sitekey="6LegOF8UAAAAAFreeB8B4V7FviOfkS1z5Kt8EZwZ"></div>
          <input type="submit" class="button" value="Envoyer votre message">
      </div>
    </div>
  </form>
<?php else : ?>
  <form class="contact" method="post" action="page-contact.html">
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="medium-9 cell">
          <label for="nom">
            Nom
            <input type="text" required name="nom" id="nom" placeholder="Votre nom">
          </label>
        </div>
        <div class="medium-9 cell">
          <label for="courriel">
            Courriel
            <input type="email" required name="courriel" id="courriel" placeholder="Votre e-mail">
          </label>
        </div>
        <div class="medium-9 cell">
          <label for="sujet">
            Sujet
            <input type="text" required name="sujet" id="sujet"
                   placeholder="Le sujet de votre mesage">
          </label>
        </div>
        <div class="medium-9 cell">
          <label for="message">
            Message
            <textarea name="message" id="message" rows="3"></textarea>
          </label>
        </div>
        <div class="medium-9 cell">
          <label for="accept">
            J'accepte que mes données soit transmises<br/>
            et que mon courriel/e-mail soit utilisé pour &ecirc;tre recontact&eacute;
          </label>
          <input id="accept" required name="accept" type="checkbox">
        </div>
        <div class="g-recaptcha medium-9" data-sitekey="6LegOF8UAAAAAFreeB8B4V7FviOfkS1z5Kt8EZwZ"></div>
          <input type="submit" class="button" value="Envoyer votre message">
      </div>
    </div>
  </form>
<?php endif; ?>

<?php $contenu = ob_get_clean(); ?>

<?php
$donnees_vue = array(
  "titre" => $titre,
  "contenu" => $contenu
);
