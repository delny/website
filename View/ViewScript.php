<?php
  $titre = WEBSITE_TITLE.' - Script';
?>

<?php ob_start(); ?>
  <h1 id="script_top">Un peu de PHP</h1>
  <h3>Programmation</h3>
  <p><a href="page-scriptgenformcontact.html">G&eacute;n&eacute;rer un formulaire de contact en HTML/PHP</a></p>
  <h3>Mini-jeux en PHP</h3>
  <p><a href="page-game.html">Deviner un nombre entre 0 et 100</a><br/>
    <a href="page-game.html">Calcul rapide</a></p>
  <h3>Math&eacute;matiques</h3>

  <div id="resultat" class="alert alert-primary" role="alert" style="display: none;"></div>
  <div id="erreur" class="alert alert-danger" role="alert" style="display: none;"></div>
  
  <ul class="accordion" data-accordion data-allow-all-closed="true">
    <li class="accordion-item" data-accordion-item>
      <a href="#" class="accordion-title">Déterminer la décomposition d'un nombre entier en facteurs de nombres premiers.</a>
      <div class="accordion-content" data-tab-content>
      <h3>Entrez un entier n strictement positif<br>remarque : 1 n'est pas considéré comme premier</h3>
      <form method="post" class="scriptform">
        <input type="hidden" name="scriptid" value="1" />
        <input name="nombre" type="number" min="1">
        <button type="submit" class="btn btn-primary">Décomposer</button>
      </form>
      </div>
    </li>

    <li class="accordion-item" data-accordion-item>
      <a href="#" class="accordion-title">Trouver les nombres premiers autour d'un nombre</a>
      <div class="accordion-content" data-tab-content>
      <h3>Entrez un entier n strictement positif</h3>
      <form method="post" class="scriptform">
        <input type="hidden" name="scriptid" value="2" />
        <input name="nombre" type="number" min="0"><br />
        Afficher <input type="number" name="combien" min="1" max="100" value="10"/> nombres premiers : <br/>
        <input type="radio" checked name="position" value="au"/> Autour de ce nombre<br/>
        <input type="radio" name="position" value="ap"/> Apr&egrave;s ce nombre<br/>
        <input type="radio" name="position" value="av"/> Avant ce nombre
        <button type="submit" class="btn btn-primary">Afficher</button>
      </form>
      </div>
    </li>

    <li class="accordion-item" data-accordion-item>
      <a href="#" class="accordion-title">Résoudre une équation du second degré ax²+bx+c=0 dans R</a>
      <div class="accordion-content" data-tab-content>
      <h3>Choisir les trois nombre r&eacute;els a, b et c</h3>
      <form method="post" class="scriptform">
        <input type="hidden" name="scriptid" value="3" />
        <input name="nombre1" type="number">*x² +
        <input name="nombre2" type="number">*x +
        <input name="nombre3" type="number"> = 0
        <button type="submit" class="btn btn-primary">R&eacute;soudre</button>
      </form>
      </div>
    </li>

    <li class="accordion-item" data-accordion-item>
      <a href="#" class="accordion-title">Moyenne de nombres</a>
      <div class="accordion-content" data-tab-content>
      <h3>Entre plusieurs nombres en les séparant par "/"</h3>
      <form method="post" class="scriptform" action="Model/php/moyenne.php">
        <input type="hidden" name="scriptid" value="4" />
        <input name="nombre" type="text">
        <button type="submit" class="btn btn-primary">Calculer</button>
      </form>
      </div>
    </li>

    <li class="accordion-item" data-accordion-item>
      <a href="#" class="accordion-title">Afficher les permiers termes d'une suite d&eacute;fini par r&eacute;currence</a>
      <div class="accordion-content" data-tab-content>
      <h3>Choisir le premier terme, le nombre de terme &agrave; afficher, puis d&eacute;finir la suite :</h3>
      <form method="post" class="scriptform" action="Model/php/suite.php">
        <input type="hidden" name="scriptid" value="5" />
        U<sub>0</sub> : <input name="c" type="number"><br/>
        Nombre de termes &agrave; afficher: <input name="n" type="number"><br/>
        U<sub>n+1</sub> = <input name="a" type="number"> * U<sub>n</sub> + <input name="b" type="number">
        <button type="submit" class="btn btn-primary">Calculer</button>
      </form>
      </div>
    </li>

    <li class="accordion-item" data-accordion-item>
      <a href="#" class="accordion-title">Suite de Fibonacci</a>
      <div class="accordion-content" data-tab-content>
      <h3>Choisir un nombre entier n</h3>
      <form method="post" class="scriptform" action="Model/php/fibonacci.php">
        <input type="hidden" name="scriptid" value="6" />
        <input name="nombre" type="number" min="1">
        <button type="submit" class="btn btn-primary">Calculer</button>
      </form>
      </div>
    </li>
  </ul>

<?php $contenu = ob_get_clean(); ?>

<?php
  $donnees_vue = array(
    "titre" => $titre,
    "contenu" => $contenu
  );
