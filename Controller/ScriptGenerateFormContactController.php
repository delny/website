<?php
  
  namespace Website\Controller;
  
  use Website\App\Controller;
  
  class ScriptGenerateFormContactController extends Controller
  {
    public function ScriptGenerateFormContact()
    {
      //traitement formulaire
      if (isset($_POST['courriel_form'])) {
        if (preg_match("#^[A-Za-z0-9._-]+@[A-Za-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['courriel_form'])) {
          // recup des champs
          $i = 1;
          while (isset($_POST['param' . $i . '_name']) AND $_POST['param' . $i . '_name'] != '') {
            $param_ob_tmp = (isset($_POST['param' . $i . '_ob'])) ? $_POST['param' . $i . '_ob'] : '0';
            $param_ob[$_POST['param' . $i . '_name']] = $param_ob_tmp;
            $param_type[$_POST['param' . $i . '_name']] = $_POST['param' . $i . '_type'];
            $i++;
          }
          $count = $i - 1;
          // verif champ unique
          if (sizeof($param_ob) == $count) {
            //courriel
            $dest_courriel = $_POST['courriel_form'];
            
            // verif si il existe au moins un param obligatoire
            $param_ob_exist = FALSE;
            foreach ($param_ob as $param_name => $param_ob_tmp) {
              if ($param_ob_tmp) {
                $param_ob_exist = TRUE;
              }
            }
            if ($param_ob_exist) {
              //résultat
              $resultat = '&lt;?php
if(';
              // ajout des isset si param obligatoire
              $before = 0;
              foreach ($param_ob as $param_name => $param_ob_tmp) {
                if ($param_ob_tmp AND $before) {
                  $resultat .= '&&isset($_POST[\'' . $param_name . '\'])';
                } elseif ($param_ob_tmp) {
                  $resultat .= 'isset($_POST[\'' . $param_name . '\'])';
                  $before = 1;
                }
              }
              $resultat .= ')
	{';
              //vérifier que non-vide si param obligatoire
              $before = 0;
              foreach ($param_ob as $param_name => $param_ob_tmp) {
                if ($param_ob_tmp AND $before) {
                  $resultat .= '
	elseif ($_POST[\'' . $param_name . '\']==\'\')
		{
		echo\'Le champ ' . $param_name . ' est obligatoire !\';
		}';
                } elseif ($param_ob_tmp) {
                  $resultat .= '
	if ($_POST[\'' . $param_name . '\']==\'\')
		{
		echo\'Le champ ' . $param_name . ' est obligatoire !\';
		}';
                  
                  $before = 1;
                }
              }
              // vérifier courriel
              foreach ($param_type as $param_name => $param_type_tmp) {
                if ($param_type_tmp == 'courriel') {
                  $resultat .= '
	elseif (!preg_match("#^[A-Za-z0-9._-]+@[A-Za-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST[\'' . $param_name . '\']))
		{
		echo\'Le champ ' . $param_name . ' n\\\'est pas correct !\';
		}';
                }
              }
              //'sinon traitement formulaire'
              $resultat .= '
	else
		{';
              $resultat .= '
		// traitement du formulaire';
              $resultat .= '
		$destinataire = \'' . $dest_courriel . '\'&#59;
		$objet=\'[formulaire via contact.php]\'&#59;';
              foreach ($param_type as $param_name => $param_type_tmp) {
                $resultat .= '
		$contenu =  \'&lt;p>' . $param_name . ' : \'.$_POST[\'' . $param_name . '\'].\'&lt;/p>\'&#59;';
                $i++;
              }
              $resultat .= '
		$headers = \'MIME-Version: 1.0\'."\r\n"&#59;
		$headers .= \'Content-type: text/html; charset=iso-8859-1\'."\r\n"&#59;
		
		if (mail($destinataire, $objet, $contenu, $headers))
			{
			echo\'Votre message a &eacute;t&eacute; envoy&eacute;\';
			exit;
			}
		else
			{
			echo\'Votre message n\\\' a pas été envoyé, veuillez recommencer\';
			}
		}
			';
              $resultat .= '
		// formulaire avec variables conservees';
              $resultat .= '
		?&gt;
		&lt;form id="contact" method="post"&gt; ';
              foreach ($param_type as $param_name => $param_type_tmp) {
                if ($param_type_tmp == 'message') {
                  $resultat .= '
		&lt;label for="' . $param_name . '">Votre ' . $param_name . ' : &lt;/label>&lt;p>&lt;textarea name="' . $param_name . '" id="' . $param_name . '">&lt;?php echo $_POST[\'' . $param_name . '\'] ?&gt;&lt;/textarea>&lt;/p>';
                } else {
                  $resultat .= '
		&lt;label for="' . $param_name . '">Votre ' . $param_name . ' : &lt;/label>&lt;p>&lt;input type="' . $param_type_tmp . '" name="' . $param_name . '" id="' . $param_name . '" value="&lt;?php echo $_POST[\'' . $param_name . '\'] ?&gt;" />&lt;/p>';
                }
              }
              $resultat .= '
		&lt;p>&lt;input type="submit" value="Envoyer votre message" />&lt;/p>
		&lt;/form&gt;
		&lt;?php
		';
              //si post n'existe pas
              $resultat .= '
	}
	else
		{
		?&gt;
		&lt;form id="contact" method="post"&gt; ';
              foreach ($param_type as $param_name => $param_type_tmp) {
                if ($param_type_tmp == 'message') {
                  $resultat .= '
		&lt;label for="' . $param_name . '">Votre ' . $param_name . ' : &lt;/label>&lt;p>&lt;textarea name="' . $param_name . '" id="' . $param_name . '">&lt;/textarea>&lt;/p>';
                } else {
                  $resultat .= '
		&lt;label for="' . $param_name . '">Votre ' . $param_name . ' : &lt;/label>&lt;p>&lt;input type="' . $param_type_tmp . '" name="' . $param_name . '" id="' . $param_name . '" />&lt;/p>';
                }
              }
              $resultat .= '
		&lt;p>&lt;input type="submit" value="Envoyer votre message" />&lt;/p>
		&lt;/form&gt;
		&lt;?php
		}
		?&gt;
		';
            } else {
              $erreur = 'Il faut au moins un champ obligatoire !';
            }
          } else {
            $erreur = 'Le nom de chaque champ doit &ecirc;tre unique !';
          }
          
        } else {
          $erreur = 'Le courriel de reception n\'est pas correct';
        }
        
      }
      
      //on definit la vue et on retourne le resulat
      $this->renderView('ScriptGenerateFormContact', [
        'erreur' => (isset($erreur)) ? $erreur : null,
        'resultat' => (isset($resultat)) ? $resultat : null,
      ]);
    }
  }
