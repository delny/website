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

  <div id="resultat" class="callout success" style="display: none;"></div>
  <div id="erreur" class="callout alert" style="display: none;"></div>
  

  <div class="grid-container">
  <div class="grid-x grid-margin-x">
    <div class="cell medium-3">
      <ul class="vertical tabs" data-tabs id="example-tabs">
        <li class="tabs-title is-active">
          <a href="#panel1v" aria-selected="true">TDéterminer la décomposition d'un nombre entier en facteurs de nombres premiers.</a>
        </li>
        <li class="tabs-title"><a href="#panel2v">Trouver les nombres premiers autour d'un nombre</a></li>
        <li class="tabs-title"><a href="#panel3v">Résoudre une équation du second degré ax²+bx+c=0 dans R</a></li>
        <li class="tabs-title"><a href="#panel4v">Moyenne de nombres</a></li>
        <li class="tabs-title"><a href="#panel5v">Afficher les permiers termes d'une suite d&eacute;fini par r&eacute;currence</a></li>
        <li class="tabs-title"><a href="#panel6v">Suite de Fibonacci</a></li>
      </ul>
    </div>
    <div class="cell medium-9">
      <div class="tabs-content" data-tabs-content="example-tabs">
        <div class="tabs-panel is-active" id="panel1v">
          <h3>Entrez un entier n strictement positif<br>remarque : 1 n'est pas considéré comme premier</h3>
          <form method="post" class="scriptform">
            <input type="hidden" name="scriptid" value="1" />
            <input name="nombre" type="number" min="1">
            <div>
              <input type="submit" class="button" value="Décomposer">
            </div>
          </form>
        </div>
        <div class="tabs-panel" id="panel2v">
          <h3>Entrez un entier n strictement positif</h3>
          <form method="post" class="scriptform">
            <input type="hidden" name="scriptid" value="2" />
            <input name="nombre" type="number" min="0"><br />
            Afficher <input type="number" name="combien" min="1" max="100" value="10"/> nombres premiers : <br/>
            <input type="radio" checked name="position" value="au"/> Autour de ce nombre<br/>
            <input type="radio" name="position" value="ap"/> Apr&egrave;s ce nombre<br/>
            <input type="radio" name="position" value="av"/> Avant ce nombre
            <div>
              <input type="submit" class="button" value="Afficher">
            </div>
          </form>
        </div>
        <div class="tabs-panel" id="panel3v">
          <h3>Choisir les trois nombre r&eacute;els a, b et c</h3>
          <form method="post" class="scriptform">
            <input type="hidden" name="scriptid" value="3" />
            <input name="nombre1" type="number">*x² +
            <input name="nombre2" type="number">*x +
            <input name="nombre3" type="number"> = 0
            <div>
              <input type="submit" class="button" value="R&eacute;soudre">
            </div>
          </form>
        </div>
        <div class="tabs-panel" id="panel4v">
          <h3>Entre plusieurs nombres en les séparant par "/"</h3>
          <form method="post" class="scriptform" action="Model/php/moyenne.php">
            <input type="hidden" name="scriptid" value="4" />
            <input name="nombre" type="text">
            <div>
              <input type="submit" class="button" value="Calculer">
            </div>
          </form>
        </div>
        <div class="tabs-panel" id="panel5v">
          <h3>Choisir le premier terme, le nombre de terme &agrave; afficher, puis d&eacute;finir la suite :</h3>
          <form method="post" class="scriptform" action="Model/php/suite.php">
            <input type="hidden" name="scriptid" value="5" />
            U<sub>0</sub> : <input name="c" type="number"><br/>
            Nombre de termes &agrave; afficher: <input name="n" type="number"><br/>
            U<sub>n+1</sub> = <input name="a" type="number"> * U<sub>n</sub> + <input name="b" type="number">
            <div>
              <input type="submit" class="button" value="Calculer">
            </div>
          </form>
        </div>
        <div class="tabs-panel" id="panel6v">
          <h3>Choisir un nombre entier n</h3>
          <form method="post" class="scriptform" action="Model/php/fibonacci.php">
            <input type="hidden" name="scriptid" value="6" />
            <input name="nombre" type="number" min="1">
            <div>
              <input type="submit" class="button" value="Calculer">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php
  $donnees_vue = array(
    "titre" => $titre,
    "contenu" => $contenu
  );
