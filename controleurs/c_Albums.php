<?php
$action = $_REQUEST['action']; //récupération de l'action
//echo "action:".$action;
switch($action)
{ 
	case 'all': //pour afficher tous les albums
		{
			$lesGenre = Genre::getAll();
			$lesAlbums=Album::getAll(); //on fait appel  à la méthode d"accès aux données de la classe Album
			include("vues/v_albums.php");//puis on affiche la vue qui utilise les données
			break;
		}
	case 'artiste': //on vient de choisir un artiste on est repassé par index
		{
		//on fait appel à la méthode getAlbums d'Artist avec le numéro d'artiste
		//on inclut la vue v_albArt qui affiche les albums
		$lesGenre= Genre::getAll();
		$Artiste=Artist::findById($_REQUEST['numart']); // recherche l'artiste
		$lesAlbums=$Artiste->getAlbums();
		include("vues/v_albumsPourArtiste.php");//puis on affiche la vue qui utilise les données
		break;
		}
	case 'modifier' :
		$lesGenre= Genre::getAll();
        $lesArtistes = Artist::getAll();
		include("vues/v_formAlbum.php");
		break;
	case 'VerifForm' :
		if(!empty($_POST['idAlbum'])) // s'il s'agit d'une modification
		{
			Album::modifierAlbum($_POST["nom"], $_POST["annee"], $_POST["genre"], $_POST["artist"], $_POST['idAlbum']);
			header("refresh: 0;url=index.php?uc=Albums&action=all"); 
		}else{ // s'il s'agit d'un ajout
			Album::ajouterAlbum($_POST["nom"], $_POST["annee"], $_POST["genre"], $_POST["artist"]);
			header("refresh: 0;url=index.php?uc=Albums&action=all"); 
		}
		break;
	case 'supprimer' :
		Album::supprimerAlbum($_REQUEST['numalb']);
		header("refresh: 0;url=index.php?uc=Albums&action=all");
		break;
	case 'recherche' :
		break;
	case 'ajouter' :
		$lesGenre= Genre::getAll();
		$lesArtistes = Artist::getAll();
		include("vues/v_formAlbum.php");
		break;
	
	default:echo "rien";
	}
	?>
