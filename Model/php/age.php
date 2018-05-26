<?php 
session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Un peu de PHP</title>
<meta charset="utf-8">
<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" title="default" href="../style.css" />
<link rel="icon" type="image/png" href="../img/favicon.png" />
<?php
// on verif si variables existent
if (isset($_POST['daten']))
{
	$daten=$_POST['daten'];
	$date_naissance = (explode("-", $daten));
	
	$anneen=$date_naissance[0];
	$moisn=$date_naissance[1];
	$journ=$date_naissance[2];

	// on prend la date du jour
	$annee=date('Y');
	$mois=date('n');
	$jour=date('j');


	// Verification des variables reçues
	if ($journ==31&&($moisn==2||$moisn==4||$moisn==6||$moisn==9||$moisn==11)) //31 + mauvais mois
	{
		$reponse='Votre date de naissance n\'est pas valide';
	}
	elseif ($journ==30&&$moisn==2) // 30 fevrier
	{
		$reponse='Votre date de naissance n\'est pas valide';
	}
	elseif ($journ==29&&$moisn==2&&!is_int($anneen/4)) // 29 fevier et annee non bisextile
	{
		$reponse='Votre date de naissance n\'est pas valide';
	}
	elseif ($journ<=0||$journ>31||$moisn<=0||$moisn>12)
	{
		$reponse='Votre date de naissance n\'est pas valide';
	}
	elseif ($anneen<1895)
	{
		$reponse='Votre date de naissance n\'est pas valide';
	}
	else // On lance le calcul
	{
		// années
		$age_ans = $annee - $anneen ;
		
		//mois
		if ($moisn>$mois)
		{
			$age_ans = $age_ans -1 ;
			$agemois=12+$mois-$moisn;
		}
		elseif ($moisn<$mois)
		{
			$agemois=$mois-$moisn;
		}
		else
		{
			$agemois = 0 ;
		}
		
		// jour
		
		if ($journ>$jour)
		{
			$agemois = $agemois -1 ;
			$agejour = 31+$jour-$journ;
		}
		elseif ($journ<$jour)
		{
			$agejour = $journ - $jour;
		}
		else
		{
			$agejour = 0;
		}
		
		// anniversaire
		if ($agemois==0 AND $agejour==0)
		{
			$anniv=1; // c'est l'anniversaire
		}
		else
		{
			$anniv=0; 
		}
		
		
		// resultat
		if ($age_ans>17 AND $anniv==0)
		{
			$reponse='Vous avez '.$age_ans.' ans  '.$agemois.' mois et '.$agejour.' jour(s)';
		}
		elseif ($age_ans>17 AND $anniv==1)
		{
			$reponse='Joyeux Anniversaire !!<br>';
			$reponse.='Vous avez '.$age_ans.' ans !!';
		}
		elseif ($age_ans>1 AND $age_ans<18 AND $anniv==0)
		{
			$reponse='Tu as '.$age_ans.' ans  '.$agemois.' mois et '.$agejour.' jour(s)';
		}
		elseif ($age_ans>1 AND $age_ans<18 AND $anniv==1)
		{
			$reponse='Joyeux Anniversaire !!<br>';
			$reponse.='Tuas '.$age_ans.' ans !!';
		}
		elseif ($age_ans==1 AND $anniv==0)
		{
			$reponse='Tu as '.$age_ans.' an  '.$agemois.' mois et '.$agejour.' jour(s)';
		}
		elseif ($age_ans==1 AND $anniv==1)
		{
			$reponse='Joyeux Anniversaire !!<br>';
			$reponse.='Tu as 1 an !!';
		}
		elseif ($age_ans==0 AND $anniv==0 AND $agemois>0)
		{
			$reponse='Tu as '.$agemois.' mois et '.$agejour.' jour(s)';
		}
		elseif ($age_ans==0 AND $anniv==0 AND $agemois==0)
		{
			$reponse='Tu as moins d\'un mois';
		}
		elseif ($age_ans==0 AND $anniv==1)
		{
			$reponse='Tu es n&eacute;(e) aujourd\'hui';
		}
		else
		{
			$reponse='Vous venez du futur !';
		}
		
	}

}
?>
</head>
<body>
<div id="corps">
<h1>Calculer son &acirc;ge</h1>
<form method="post" action="age.php">
	<input type="date" name="daten" />
	<input type="submit" value="Calculer"/>
</form>
<div>
	<?php
	if (isset($reponse))
	{
		echo '<p>';
		echo 'R&eacute;sultat : <br />';
		echo $reponse;
		echo '</p>';
	}
	?>
</div>
</div>
</body>
</html>