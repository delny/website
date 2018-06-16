<?php
  $titre = 'Anthony Delgado - erreur';
?>

<?php ob_start(); ?>
  <h1>Page non trouv&eacutee !</h1>
  <p>La page que vous demandez n'existe pas ou plus</p>
  <p><a href="/">Retourner &agrave; la page d'accueil</a></p>
  <img src="View/img/PhpError.png" alt="erreur-404" title="erreur-404" />
<?php $contenu = ob_get_clean(); ?>

<?php
  $donnees_vue = array(
    "titre" => $titre,
    "contenu" => $contenu
  );
?>

<?php
  
  require('View/template.php');
