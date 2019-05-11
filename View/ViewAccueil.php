<?php
  $titre = WEBSITE_TITLE.' - Accueil';
?>

<?php ob_start(); ?>
  <h1><?php echo $bonjour; ?><sup>&#42;</sup></h1>
  <p><sup>&#42;</sup>Bonjour et bienvenue en <?php echo $bonjour_l; ?></p>
  <p><?php echo $souvenirLastVisite; ?></p>
  <h3>Présentation : </h3>
  <p>Ce site a pour pour but essentiellement de présenter mon parcours ainsi que mes comp&eacute;tences.</p>
  <p>Toutes les pages de ce site ont &eacute;t&eacute; &eacute;crites en HTML5/PHP7 et mises en formes en CSS3 en
    utilisant Bootstrap et Javascript/Jquery.</p>
  <!--[if lt IE 9]>
  <p style="color:#FF1212;">Pour une navigation optimale sur ce site, je vous invite à mettre à jour votre navigateur
    Internet Explorer.</p>
  <![endif]-->
  <a href="page-parcours.html" class="button">Voir mon parcours</a>
  <?php $contenu = ob_get_clean(); ?>

<?php
  $donnees_vue = array(
    "titre" => $titre,
    "contenu" => $contenu
  );
