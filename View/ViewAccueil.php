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
  <a href="page-parcours.html">Voir mon parcours</a>
  <ul id="mylistupdate" style="display: none;">
    <li>Mars 2017 : Mise à jour design, parcours et refonte du site en mod&egrave;le <a
              href="https://fr.wikipedia.org/wiki/Mod%C3%A8le-vue-contr%C3%B4leur" target="_blank">MVC</a></li>
    <li>
      Novembre 2016 :<br/>
      <ol>
        <li>Mise &agrave; jour <a href="/jeu">mini-jeu</a></li>
        <li>Mise en ligne du site <a target="_blank" href="http://www.ylys.fr">Ylys.fr</a></li>
      </ol>
    </li>
    <li>F&eacute;vrier 2016 : Base de donn&eacute;es g&eacute;n&eacute;alogique</li>
    <li>D&eacute;cembre 2015 : ajout d'un <a href="/jeu">mini-jeu</a> (b&ecirc;ta) de combat</li>
    <li>Octobre 2015 : <br/>Ajout d'un script + mise à jour du script "G&eacute;n&eacute;rer un formulaire de contact" +
      changements mineurs du design
    </li>
    <li>19 Mai 2015 : Mise à jour du design</li>
    <li>Ajout du 2 Mai 2015 : <br/> Ajout d'un nouveau script qui g&eacute;n&egrave;re des formulaires en html/php</li>
    <li>Ajout du 28 Avril 2015 : <br/> La page d'accueil vous indique votre premi&egrave;re visite sur ce site</li>
    <li>Ajout du 23 Février 2015 : <br/> Nouveau jeu pour s'entra&icirc;ner au calcul mental dans les Jeux PHP</li>
    <li>Nouveaut&eacute;s du 16 Février 2015 : Mises à jour mineures concernant la pr&eacute;sentation (CSS) et
      l'impression
    </li>
    <li>Nouveaut&eacute;s du 20 Novembre 2014 : <br/> Formulaire de Contact : <br/> Ne s'efface que lorsque le message
      est envoy&eacute;
    </li>
    <li>Nouveaut&eacute;s du 30 Juillet 2014 : <br/> Les liens "revenir en haut" sont de nouveau
      op&eacute;rationnels<br/>Maj du code CSS pour l'impression via Ctrl+P
    </li>
    <li>Nouveaut&eacute; du 12 Novembre 2013 : <br/> Le site est est compatible pour les appareils mobiles (petites
      tailles d'&eacute;cran)
    </li>
  </ul>
  <?php $contenu = ob_get_clean(); ?>

<?php
  $donnees_vue = array(
    "titre" => $titre,
    "contenu" => $contenu
  );
