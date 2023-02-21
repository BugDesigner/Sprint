<?php

	require_once("messages.php");

	// Complexités : T: O(4*N)  Mem : O(2*N)
	// com : O(4*N) au lieu de 3*N car je n'ai pas trouvé pou ne pas créer en non associative depuis un calcul...
	function tri_cartes_embarquements($tableau_de_cartes) {

		$r = array();
		$result = array();
		$lg = count($tableau_de_cartes);

		$result = array();

		if ($lg > 0) { // on a de la matière pour travailler dessus

			// initialisation des valeurs
			foreach ($tableau_de_cartes as $key => $carte) {
				$vd = $carte['vd'];
				$va = $carte['va'];
				if (! isset($r[$va]['value'])) $r[$va]['valeur'] = 1;
				$r[$vd]['valeur'] = 1;
				if (! isset($r[$vd]['ref'])) $r[$vd]['ref'] = null;
				$r[$va]['ref'] = $vd;
			}

			// calcul des valeurs
			foreach ($r as $key => $ville) {
				$v 	 = 1;
				$vdr = $ville['ref'];
				if ($vdr != null) { 
					while ($r[$vdr]['ref'] != null) { 
						$v += 1;
						$vdr = $r[$vdr]['ref'];
					}
					$v += $r[$vdr]['valeur'];
				}
				$r[$key]['valeur'] = $v;
				$r[$key]['ref'] = null;
			}

			// pour le forcer en séquentiel et ne pas appliquer un sort supplémentaire qui augmenterait la complexité !
			for ($i=0; $i < $lg; $i++) { 
				$result[$i] = $i;
			}

			// on parcours tout le tableau pour trier
			foreach ($tableau_de_cartes as $key => $carte) {
				$key2 = $carte['vd'];
				$key3 = $r[$key2]['valeur'];
				// echo $key3; sdl();
				$result[$key3-1] = $carte;
			}
	
		}
		
		return $result;

	}

	/*
		Fonctionalité : Générer des mots au hasard de longueur $multiplicateur issu de l'alphabet $chaine.
	*/
	function hasard($chaine, $multiplicateur) {
		
		$c = "";
		for ($i=0; $i < $multiplicateur; $i++) { 
			$h = rand()%strlen($chaine);
			$c .= substr($chaine, $h, 1);
		}

		return $c;

	}

	/*
		Fonctionalité : générer des mots suivant un ordre demandé.
	*/
	function gen_hasard($commande, $commande_old, $multiplicateur = 1) {
		
		$lettres = "azertyuiopqsdfghjklmwxcvbn";
		$lettresMaj = strtoupper($lettres);
		$chiffres = "0123456789";
		$minAlpha = "ABCD";

		$result = "";

		if ( $commande == "l") $result = hasard($lettres, $multiplicateur);
		else if ( $commande == "L") $result = hasard($lettresMaj, $multiplicateur);
		else if ( $commande == "C") $result = hasard($chiffres, $multiplicateur);
		else if ( $commande == "D") $result = hasard($minAlpha, $multiplicateur);
		else if ( $commande == "?") {
			$rand = ( (rand()%100) %2 == 0);
			if ( $rand == true ) $result = gen_hasard($commande_old, "", $multiplicateur);
			
		}

		return $result;
	}

	/*
		Fonctionalité : Avoir des formats de donnée généré aléatoirement suivant une codification.
	*/
	function format($chaine) {

		$lg = strlen($chaine);
		if ($lg == 0) return "";
		$commande_old = "";
		$r = "";

		for ($i=0; $i < $lg; $i++) { 
			$commande = substr($chaine, $i, 1);
			$r .= gen_hasard($commande, $commande_old);
			if ($commande != "?" ) $commande_old = $commande;
		}

		return $r;

	}

	/*
		Fonctionalité : on génère des codification suivant des contraintes de données, ici le moyen de locomotion.
		Com : Le niveau d'évolution de cette fonction est static car nous n'avons pas appliqué l'externalisation des données
		comme par exemple format("LLCC");
	*/
	function gen($moyen_de_locomotion, $type, $proba = 1) {

		$liste_ok = array("avion", "train", "bus");

		$r = "";

		if ($type == "id_place") {
			if ($proba == 1 || ( (rand()%100) <= (100 / $proba) ) ) {
				if ( in_array($moyen_de_locomotion, $liste_ok) ) $r = format("C?D");	
			}			
		} else if ($type == "id_moyen_de_locomotion") {
			if ( in_array($moyen_de_locomotion, $liste_ok) ) $r = format("LLCC");
		}

		return $r;

	}

	/*
		Fonctionalité : remplacer les balises par des valeurs pour dynamiser les textes de réponses.
	*/
	function assembler($texte, $data=null) {

		if ($data == null) return $texte;

		// prendre des informations depuis une configuration lié à des mots clefs comme le nom de l'application en cours.
		//$code_balise = get_from_config_file("code_balise", "app_test_sprint");
		$code_balise = "::";		

		foreach ($data as $key => $datum) {
			if (isset($datum['search']))
				$texte = str_replace($code_balise.$datum['search'].$code_balise, $datum['value'], $texte);
		}		
		return $texte;

	}

	/*
		Fonctionalité : Rendre vivante les réponses.
	*/
	function gen_text($code_texte, $lang='fr', $data=null) {

		global $messages;
		// la variable $message provient du fichier messages.php qui contient des tableaux de messages traduits 
		// et en plusieurs exemplaires différents pour éviter la monotonie dans les échanges.

		$tab = $messages[$code_texte][$lang];
		shuffle( $tab );		

		return assembler( $tab[0], $data); // on prend le premier après le random :)

	}

	/*
		Fonctionalité : fonction de transition pour insertion des données supplémentaires... model non efficiant.
	*/
	function gen_coherence_data($moyen_de_locomotion, $lang='fr', $data=null) {

		$info_supp = "";

		if ( ($data != null) && isset($data['id_place']) ) {
			$info_supp = (isset ($data['id_place']['value']) && $data['id_place']['value'] == "") ? gen_text("Pas_d_attribution_de_siege", $lang) : gen_text("Asseyez_vous_au_siege", $lang, $data);
		}

		return gen_text($moyen_de_locomotion, $lang, $data).$info_supp;

	}

	function gen_test($nombre_etape, $lang='fr', $json_demande=false)
	{

		global $villes; // récupéré depuis le fichier de config messages.php
		$json = "";
		$nombre_etape %= count($villes); // limitation	
		$moyen_de_locomotion = array("avion", "train", "bateau", "bus", "helicoptere", "fusee", "velo electrique");
		$lg_mdl = count($moyen_de_locomotion);
		$tableau_de_cartes = array();

		if (shuffle($villes)) {
			
			for ($i=0; $i < $nombre_etape; $i++) { 
				
				$j = rand()%$lg_mdl;
				$carte['vd'] = $villes[$i];
				$carte['va'] = $villes[$i+1];
				$carte['mdl'] = $moyen_de_locomotion[$j];
				
				$id_moyen_de_locomotion = gen($moyen_de_locomotion[$j], "id_moyen_de_locomotion");
				$id_place = gen($moyen_de_locomotion[$j], "id_place", 1);

				$carte['id_moyen_de_locomotion'] = $id_moyen_de_locomotion;
				$carte['id_place'] = $id_place;

				$data = array (
					array('search' => 'mdl', 'value' => $moyen_de_locomotion[$j]), 
					array('search' => 'id_loco', 'value' => $id_moyen_de_locomotion),
					array('search' => "id_place", 'value' =>  $id_place),
					array('search' => "lieu_loco_dep", 'value' =>  gen_text("depuis_".$moyen_de_locomotion[$j], $lang) ),
					array('search' => "lieu_loco_arr", 'value' =>  gen_text("vers_".$moyen_de_locomotion[$j], $lang)),
					array('search' => "vd", 'value' =>  $villes[$i]),
					array('search' => "va", 'value' =>  $villes[$i+1])
				);

				$carte['texte'] = gen_coherence_data($moyen_de_locomotion[$j], $lang, $data);				

				$tableau_de_cartes[] = $carte;

			}
			
		}

		// on simule le désordre des cartes d'embarquement.
		shuffle( $tableau_de_cartes );

		// var_dump($tableau_de_cartes);

		if ($json_demande == true) {
			$json = json_encode($tableau_de_cartes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
			return $json;
		}
		else {

			return $tableau_de_cartes;

		}

	}

	function alimente_json($json, $lang) {

		$tab2 = json_decode(stripslashes($json), true);

		if (json_last_error() == 0) { // you've got an object in $json

			foreach ($tab2 as $key => $oneJson) {

				$lieu = $oneJson['mdl'];
				$oneJson['lieu_loco_dep'] = gen_text("depuis_".$lieu, $lang);
				$oneJson['lieu_loco_arr'] = gen_text("vers_".$lieu, $lang);
				$oneJson['texte'] = gen_coherence_data($lieu, $lang, $oneJson);

			}

			return json_encode($tab2, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

		} else { 
			echo "JSON error -- ";
			return array();
		}
	}

	function sort_from_json($json, $lang) {
		
		$aj = alimente_json($json, $lang);
		if (count($aj) == 0) return array(); // todo validation non conforme car simpliste ici.
		$tab_json = json_decode($aj, true);
		echo "<br><br>";
		
		return tri_cartes_embarquements($tab_json);
	}


	function affiche_informations($dump) {

		$lg = count($dump);

		if ( $lg == 0) echo "Pas d'information reçues.<br>";
		else {

			echo "<table>
			<tr><td align='center'>Mon trajet traité </td></tr>";
			$color = array("white", "lightgray");
			$i_color = 1;
			for ($i=0; $i < $lg; $i++) { 
				$i_color = 1 - $i_color;
				echo("<tr><td style='background-color: $color[$i_color]'>".$dump[$i]['texte']."</td></tr>");
			}

			echo "</table>";
	
		}

		echo "<br><hr width='50px'>";	

	}

	function affiche_dump($dump) {

		$lg = count($dump);
		for ($i=0; $i < $lg; $i++) { 
		 	echo "<br><hr width='50px'>";
			echo $i." "; var_dump($dump[$i]);
		}
		echo "<br><hr width='50px'>";
	}

	function sdl() {
		echo "<br><hr width='200px'><br>";
	}

	function mainTest($nbr_etape, $lang='fr') {

		$tdc = gen_test($nbr_etape, $lang);
		echo "Les cartes d'embarquements arrivent comme suit :<br>";
		affiche_informations($tdc);

		// affiche_dump( $tdc ); // affiche dans le désordre les cartes d'embarquements.
		// sdl();

		$tdc2 = tri_cartes_embarquements($tdc);
		// affiche_dump( $tdc2 ); // affiche dans l'ordre.
		
		echo "après traitements :<br>";

		affiche_informations($tdc2);

	}

	function main($nb_etape = 10, $lang = 'fr') {
		// 10 étapes => 11 villes.
		
		if (isset($_POST['nb_etape']) && is_numeric($_POST['nb_etape'])) $nb_etape = $_POST['nb_etape'];
		
		if ( isset($_POST['json_data']) && ($_POST['json_data'] != "") ) {
			// le json est il correct ? todo
			affiche_informations( sort_from_json($_POST['json_data'], $lang) );
		} else if ( isset($_POST['json_gen_data']) && (! is_null($_POST['json_gen_data'])) ) { 
			echo gen_test($nb_etape, $lang, true);
		} else {
			mainTest($nb_etape, $lang); 	
		}		
		
		$code_html = "
		<h1>Voir les résultats :) </h1>
		<form name='form' action='' method='POST'><br> 
			<label> nombre d'étapes présentes : </label> <input type='number' max='140' min='5' name='nb_etape' value='$nb_etape'>
			<label> Depuis un fichier de données json : </label> <input type='text' name='json_data'>
			<input type='submit' value='Relancer'>  
		</form>
		<h1>Générer des données </h1>
		<form name='form2' action='' method='post'><br>
			<label> Json généré </label> <input type='submit' name='json_gen_data' value='Générer'>
		</form>
		";

		echo $code_html;	
	}

	main();
	


/*
partie test à la main pour coder l'algorithme de tri.

Nice Paris Londres New York Brazilia si trié
tableau r
passage ville 	value	ref		passage ville 	value	ref		passage ville 	value	ref		passage ville 	value	ref
1		L 		1	 	null	2		L 		1 		P 		3		L 		1		P		4 		L 		1 		P
1		P 		vide	vide	2		P 		1		null	3		P 		1 		N 		4		P 		1		N
1		N 		vide	vide	2		N 		vide	vide	3		N 		1 		null	4		N 		1 		null
1		B 		vide	vide	2		B 		vide 	vide	3		B 		vide	vide	4		B 		1 		NY
1		NY 		1		L 		2		NY		1 		L 		3		NY		1		L		4		NY		1 		L

1		L 		3		null
2		P 		2		null
3 		N 		1 		null
4 		B 		5		null
5		NY 		4 		null
*/
?>