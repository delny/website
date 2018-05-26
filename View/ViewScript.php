<?php
  $titre = 'Anthony Delgado : sytèmes et réseaux informatiques';
?>

<?php ob_start(); ?>
  <h1 id="script_top">Un peu de PHP</h1>
  <h3>Accès direct :</h3>
  <h3>Programmation</h3>
  <p><a href="index.php?action=scriptgenformcontact">G&eacute;n&eacute;rer un formulaire de contact en HTML/PHP</a></p>
  <h3>Mini-jeux en PHP</h3>
  <p><a href="index.php?action=game">Deviner un nombre entre 0 et 100</a><br/>
    <a href="index.php?action=game">Calcul rapide</a></p>
  <h3>Math&eacute;matiques</h3>
  <p><a href="#decomp_premier">Déterminer la décomposition d'un nombre entier en facteurs de nombres premiers</a><br/>
    <a href="#list_premier">Trouver les nombres premiers autour d'un nombre</a><br/>
    <a href="#equation">Résoudre une équation du second degré ax²+bx+c=0 dans R</a><br/>
    <a href="#somme_1_n">Moyenne de nombres</a><br/>
    <a href="#suite">Afficher les permiers termes d'une suite d&eacute;fini par r&eacute;currence</a><br/>
    <a href="#fibonacci">Suite de Fibonacci</a></p>
  <div class="resultat"></div>
  <section id="decomp_premier">
    <h2>Déterminer la décomposition d'un nombre entier en facteurs de nombres premiers</h2>
    <h3>Entrez un entier n strictement positif<br>remarque : 1 n'est pas considéré comme premier</h3>
    <form method="post" class="scriptform" action="Model/php/decomposepremier.php">
      <input type="hidden" name="scriptid" value="1" />
      <input name="nombre" type="number" min="1">
      <input type="submit" value="D&eacute;composer">
    </form>
  </section>
  <section id="list_premier">
    <h2>Trouver les nombres premiers autour d'un nombre</h2>
    <h3>Entrez un entier n strictement positif</h3>
    <form method="post" class="scriptform" action="Model/php/listpremier.php">
      <input type="hidden" name="scriptid" value="2" />
      <input name="nombre" type="number" min="0">
      <input type="submit" value="Afficher"> <br/>
      Afficher <input type="number" name="combien" min="1" max="100" value="10"/> nombres premiers : <br/>
      <input type="radio" checked name="position" value="au"/> Autour de ce nombre<br/>
      <input type="radio" name="position" value="ap"/> Apr&egrave;s ce nombre<br/>
      <input type="radio" name="position" value="av"/> Avant ce nombre
    </form>
  </section>
  <section id="equation">
    <h2>Résoudre une équation du second degré ax²+bx+c=0 dans R</h2>
    <h3>Choisir les trois nombre r&eacute;els a, b et c</h3>
    <form method="post" class="scriptform" action="Model/php/polynome.php">
      <input type="hidden" name="scriptid" value="1" />
      <input name="nombre1" type="number">*x² +
      <input name="nombre2" type="number">*x +
      <input name="nombre3" type="number"> = 0
      <input type="submit" value="R&eacute;soudre">
    </form>
  </section>
  <section id="somme_1_n">
    <h2>Moyenne de nombres</h2>
    <h3>Entre plusieurs nombres en les séparant par "/"</h3>
    <form method="post" class="scriptform" action="Model/php/moyenne.php">
      <input name="nombre" type="text">
      <input type="submit" value="Calculer">
    </form>
  </section>
  <section id="suite">
    <h2>Afficher les permiers termes d'une suite d&eacute;fini par r&eacute;currence</h2>
    <h3>Choisir le premier terme, le nombre de terme &agrave; afficher, puis d&eacute;finir la suite :</h3>
    <form method="post" class="scriptform" action="Model/php/suite.php">
      U<sub>0</sub> : <input name="c" type="number"><br/>
      Nombre de termes &agrave; afficher: <input name="n" type="number"><br/>
      U<sub>n+1</sub> = <input name="a" type="number"> * U<sub>n</sub> + <input name="b" type="number">
      <input type="submit" value="Calculer">
    </form>
  </section>
  <section id="fibonacci">
    <h2>Suite de Fibonacci</h2>
    <h3>Choisir un nombre entier n</h3>
    <form method="post" class="scriptform" action="Model/php/fibonacci.php">
      <input name="nombre" type="number" min="1">
      <input type="submit" value="Calculer">
    </form>
  </section>
  <section>
    <h3>Les suivants sont en pr&eacute;paration !<br/> <a href="#script_top">Revenir en haut de la page</a></h3>
  </section>

<?php $contenu = ob_get_clean(); ?>

<?php
  $donnees_vue = array(
    "titre" => $titre,
    "contenu" => $contenu
  );
