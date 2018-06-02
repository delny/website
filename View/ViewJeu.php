<?php
  $titre = WEBSITE_TITLE.' - jeu en php';
?>

<?php ob_start(); ?>
  <h1>Minis-Jeux en PHP</h1>
  
  <section>
    <h2>Deviner un nombre entre 0 et 100</h2>
    <?php
      if (isset($reponse))
      {
        echo $reponse;
      }
      else
      {
        echo 'Entrez un nombre :';
      }
    ?>
    <form method="get" action="index.php">
      <input type="hidden" name="action" value="game" />
      <input type="number" min="0" max="100" name="nombre" autofocus />
      <input type="submit" value="ok">
    </form>
  </section>
  <section>
    <h2>Calcul rapide</h2>
    <p>20 calculs à la suite, -1 point pour chaque mauvaise r&eacute;ponse <br /><p>
    <div id="resultgame"></div>
    <div id="answer" style="display:none;"><input type="number" id="number" name="result" autofocus />
      <span onclick="sendanswer(this);">Envoyer</span>
    </div>
    <div class="paramgame">
      <input type="radio" name="niveau" value="niv0" /> Niveau enfant
      <input type="radio" name="niveau" value="niv1" checked /> Niveau Adulte
      <br />
      <input type="radio" name="op" value="0" /> +
      <input type="radio" name="op" value="1" /> -
      <input type="radio" name="op" value="2" checked /> *
      <input type="radio" name="op" value="3" /> /
    </div>
    <div class="startgame">Commencer le jeu</div>
  </section>
<?php $contenu = ob_get_clean(); ?>

<?php
  $donnees_vue = array(
    "titre" => $titre,
    "contenu" => $contenu
  );
