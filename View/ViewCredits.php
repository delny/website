<?php
  $titre = WEBSITE_TITLE.' - Mentions l&eacute;gales';
?>

<?php ob_start(); ?>
  <h1>Mentions L&eacute;gales</h1>
  <ol>
    <li><h3>Pr&eacute;sentation du site</h3>
      <p>Le site anthonydelgado.fr est une site personnel a but non commercial.<br/>
        Ce site a &eacute;t&eacute; cr&eacute;e par Anthony Delgado - particulier<br/>
        Vous pouvez contacter le propri&eacute;taire sur <a href="contact.php">cette page</a><br/>
        Ce site est heberg&eacute; par OVH - Paris</p>
    </li>
    <li><h3>Conditions d'utilisation</h3>
      <p>L'utilisation du site implique l'acceptation pleine et enti&egrave;re des conditions d'utilisations d&eacute;crites
        ci -apr&egrave;s.</p>
      <p>Les pr&eacute;sentes conditions d'utilisations sont succeptibles d'&ecirc;tre modifi&eacute;es sans pr&eacute;avis,
        l'utilisateur s'engage donc &agrave;
        les consulter r&eacute;guli&egrave;rement.</p>
      <p>Les services founis par ce site sont en constante &eacute;volution et peuvent donc changer sans pr&eacute;avis.
        De plus, ce site peut fermer &agrave; tout moment sans qu'aucun avis pr&eacute;alable n'est &eacute;t&eacute;
        fourni.</p>
      <p></p>
    </li>
    <li><h3>Limite de responsabilit&eacute;</h3>
      <p>Le site anthonydelgado.fr ne donne aucune garantie sur la disponibilit&eacute; de ses services.</p>
      <p>Le site anthonydelgado.fr n'est pas responsable des dommages corporels, pertes de donn&eacutees qui sont
        succeptibles d'&ecirc;tre caus&eacute;s par une mauvaise utilisation
        du mat&eacute;riel n&eacute;cessaire &agrave; l'utilisation de ces services.</p>
      <p></p>
    </li>
  </ol>

<?php $contenu = ob_get_clean(); ?>

<?php
  $donnees_vue = array(
    "titre" => $titre,
    "contenu" => $contenu
  );
