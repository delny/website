<?php
  $titre = WEBSITE_TITLE.' - Script';
?>

<?php ob_start(); ?>
  
  <h1 id="script_top">G&eacute;n&eacute;rer un formulaire de contact en HTML/PHP</h1>
  <div><?php
      if (isset($erreur))
      {
        echo '<span class="error">'.$erreur.'</span>';
      }
      elseif (isset($resultat))
      {
        echo '<p>code &agrave; placer dans votre page de contact</p>';
        echo '<textarea id="reponseform" onclick="this.select();">'.$resultat.'</textarea>';
      }
    ?></div>
  <form  class="genformcontact" method="post" action="page-scriptgenerateformcontact.html">
    <label for="courriel_form">Courriel de reception du formulaire: </label><p><input type="text" name="courriel_form" id="courriel_form" <?php if (isset($_POST['courriel_form'])){echo 'value="'.$_POST['courriel_form'].'"';}?>/></p>
    <p>Cochez la case pour signaler que le champ est obligatoire</p>
    <div id="listchmp">
      <?php
        $i=1;
        while ($i<6)
        {
          echo '<p id="'.$i.'">Nom du Champ :';
          if (isset($_POST['param'.$i.'_name']))
          {
            echo '<input type="text" name="param'.$i.'_name" value="'.$_POST['param'.$i.'_name'].'"/>';
            echo ' Type du Champ : ';
            echo'<select name="param'.$i.'_type">
			<option value="name">Nom, Objet, etc</option>
			<option value="email">Courriel</option>
			<option value="number">Nombre</option>
			<option value="message">Message</option>
			</select>';
            if (isset($_POST['param'.$i.'_ob']) AND $_POST['param'.$i.'_ob'])
            {
              echo '<input type="checkbox" checked name="param'.$i.'_ob" id="param'.$i.'_ob" />';
            }
            else
            {
              echo '<input type="checkbox" name="param'.$i.'_ob" id="param'.$i.'_ob" />';
            }
          }
          else
          {
            echo '<input type="text" name="param'.$i.'_name" />';
            echo ' Type du Champ : ';
            echo'<select name="param'.$i.'_type">
			<option value="name">Nom, Objet, etc</option>
			<option value="email">Courriel</option>
			<option value="number">Nombre</option>
			<option value="message">Message</option>
			</select>';
            echo '<input type="checkbox" name="param'.$i.'_ob" id="param'.$i.'_ob" />';
          }
          echo '</p>';
          $i++;
        }
      ?></div>
    <button type="button" class="changeform" onclick="addchmp();">Ajouter un Champ</button> <button type="button" class="changeform" onclick="removechmp();" >Retirer le dernier Champ</button>
    <p><input type="submit" value="G&eacute;n&eacute;rer votre formulaire" /></p>
  </form>
<?php $contenu = ob_get_clean(); ?>

<?php
  $donnees_vue = array(
    "titre" => $titre,
    "contenu" => $contenu
  );
