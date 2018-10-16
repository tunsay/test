<?php //Le contr�leur secondaire g�re plusieurs cas ou actions
$action = $_REQUEST['action']; 
switch($action) 
{ 
	case 'all': 	 $lesArtistes=Artist::getAll(); // r�cup�re les liste de tous les artistes
					 include("vues/v_artistes.php"); // on appelle la vue artiste pour les afficher
					 break;
					 
	case 'modifier' : // on appelle la m�me vue dans le cas d'un ajout ou d'une modification
					// la distinction se fera sur le param�tre de l'id de l'artiste (si c'est un ajout il n'y
					// a pas d'id puisqu'il est auto incr�ment� et qu'il n'est donc pas connu avant l'ajout !
					include("vues/v_formArtiste.php");
					break;
					
	case 'ajouter' :
					include("vues/v_formArtiste.php");
					break;
					
	case 'VerifForm' :	
					if(!empty($_POST['idArtiste'])) // s'il s'agit d'une modification
					{
						// a compl�ter Artist::modifierArtiste($_POST['idArtiste'],$_POST['nomArtiste']);
						Artist::modifierArtiste($_POST['idArtiste'],$_POST["nomArtiste"]);	
						header("refresh: 0;url=index.php?uc=Artistes&action=all");
					}
					else // s'il s'agit d'un ajout
					{
						Artist::ajouterArtiste($_POST['nomArtiste']);
						header("refresh: 0;url=index.php?uc=Artistes&action=all");
					}
					break;
					
	case 'supprimer' :
					// a compl�ter Artist::supprimerArtist($_REQUEST['numart']);
					Artist::supprimerArtist($_REQUEST['numart']);
					header("refresh: 0;url=index.php?uc=Artistes&action=all");
					break;
	case 'recherche' : 
					if(!empty($_POST['nom']))
					{
						$lesArtistes=Artist::findByName($_POST['nom']); // r�cup�re la liste des artiste recherché
					}
					else
					{
						header("refresh: 0; url=index.php?uc=Artistes&action=rechercheForm");
					}
					include("vues/v_artistes.php"); // on appelle la vue artiste pour les afficher
					break;
	case 'rechercheForm' :
					include("vues/v_rechercheArtiste.php");
					break;
	case 'genre':
					$lesArtistes = Artist::getArtistByGenre($_REQUEST['numgenre']);
					include("vues/v_artistes.php");
					break;
	default: echo "rien";
} 
?>