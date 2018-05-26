<?php
  $titre = 'Anthony Delgado : sytèmes et réseaux informatiques';
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
  
  if ($formulaire) {
    ?>
    <form class="contact" method="post" action="index.php?action=contact">
      <input type="text" required name="nom" id="nom" value="<?php echo $_POST['nom'] ?>" placeholder="Votre nom"/>
      <input type="email" required name="courriel" id="courriel" value="<?php echo $_POST['courriel'] ?>"
             placeholder="Votre e-mail"/>
      <input type="text" required name="sujet" id="sujet" value="<?php echo $_POST['sujet'] ?>"
             placeholder="Le sujet de votre mesage"/>
      <textarea name="message" id="message"
                placeholder="Ecrivez votre message ici"><?php echo $_POST['message'] ?></textarea>
      <div class="g-recaptcha" data-sitekey="6Ldn8QcTAAAAAJovh4gNcTkmdNoLjX1hI_xEMtXA"></div>
      <input type="submit" value="Envoyer votre message"/>
    </form>
    <?php
  } else {
    ?>
    <form class="contact" method="post" action="index.php?action=contact">
      <input type="text" required name="nom" placeholder="Votre nom"/>
      <input type="email" required name="courriel" placeholder="Votre e-mail"/>
      <input type="text" required name="sujet" placeholder="Le sujet de votre mesage"/>
      <textarea name="message" placeholder="Ecrivez votre message ici"></textarea>
      <div class="g-recaptcha" data-sitekey="6Ldn8QcTAAAAAJovh4gNcTkmdNoLjX1hI_xEMtXA"></div>
      <input type="submit" value="Envoyer votre message"/>
    </form>
  <?php } ?>

<?php $contenu = ob_get_clean(); ?>

<?php
  $donnees_vue = array(
    "titre" => $titre,
    "contenu" => $contenu
  );
