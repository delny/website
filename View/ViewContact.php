<?php
  $titre = WEBSITE_TITLE.' - Contact';
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
      <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" required class="form-control" name="nom" id="nom" value="<?php echo $form->getNom(); ?>">
      </div>
      <div class="form-group">
        <label for="courriel">Courriel</label>
        <input type="email" required class="form-control" name="courriel" id="courriel" value="<?php echo $form->getCourriel(); ?>">
      </div>
      <div class="form-group">
        <label for="sujet">Sujet</label>
        <input type="text" required class="form-control" name="sujet" id="sujet" value="<?php echo $form->getSujet(); ?>">
      </div>
      <div class="form-group">
        <label for="message">Message</label>
        <textarea class="form-control" name="message" id="message" rows="3"><?php echo $form->getMessage(); ?></textarea>
      </div>
      <div class="g-recaptcha" data-sitekey="6LegOF8UAAAAAFreeB8B4V7FviOfkS1z5Kt8EZwZ"></div>
      <div class="form-check">
        <label class="form-check-label">
          <input type="checkbox" required name="accept" id="accept" class="form-check-input">
          J'accepte que mes données soit transmises<br />
          et que mon courriel/e-mail soit utilisé pour &ecirc;tre recontact&eacute;
        </label>
      </div>
      <button type="submit" class="btn btn-primary">Envoyer votre message</button>
    </form>
    <?php else : ?>
    <form class="contact" method="post" action="page-contact.html">
      <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" required class="form-control" name="nom" id="nom" placeholder="Votre nom">
      </div>
      <div class="form-group">
        <label for="courriel">Courriel</label>
        <input type="email" required class="form-control" name="courriel" id="courriel" placeholder="Votre e-mail">
      </div>
      <div class="form-group">
        <label for="sujet">Sujet</label>
        <input type="text" required class="form-control" name="sujet" id="sujet" placeholder="Le sujet de votre mesage">
      </div>
      <div class="form-group">
        <label for="message">Message</label>
        <textarea class="form-control" name="message" id="message" rows="3"></textarea>
      </div>
      <div class="g-recaptcha" data-sitekey="6LegOF8UAAAAAFreeB8B4V7FviOfkS1z5Kt8EZwZ"></div>
      <div class="form-check">
        <label class="form-check-label">
          <input type="checkbox" required name="accept" id="accept" class="form-check-input">
          J'accepte que mes données soit transmises<br />
          et que mon courriel/e-mail soit utilisé pour &ecirc;tre recontact&eacute;
        </label>
      </div>
      <button type="submit" class="btn btn-primary">Envoyer votre message</button>
    </form>
  <?php endif; ?>

<?php $contenu = ob_get_clean(); ?>

<?php
  $donnees_vue = array(
    "titre" => $titre,
    "contenu" => $contenu
  );
