<?php //Le contr�leur secondaire g�re plusieurs cas ou actions
$action = $_REQUEST['action']; 
switch($action) 
{ 
	case 'all': 	 $lesGenres=Genre::getAll(); // r�cup�re les liste de tous les artistes
					 include("vues/v_genres.php"); // on appelle la vue artiste pour les afficher
					 break;
					 
	case 'modifier' : // on appelle la m�me vue dans le cas d'un ajout ou d'une modification
					// la distinction se fera sur le param�tre de l'id de l'artiste (si c'est un ajout il n'y
					// a pas d'id puisqu'il est auto incr�ment� et qu'il n'est donc pas connu avant l'ajout !
					include("vues/v_formGenre.php");
					break;
					
	case 'ajouter' :
					include("vues/v_formGenre.php");
					break;
					
	case 'VerifForm' :	
					if(!empty($_POST['idGenre'])) // s'il s'agit d'une modification
					{
                        Genre::modifierGenre($_POST['idGenre'], $_POST['nomGenre']);
						header("refresh: 0;url=index.php?uc=Genres&action=all");
					}
					else // s'il s'agit d'un ajout
					{
                        Genre::ajouterGenre($_POST["nomGenre"]);
						header("refresh: 0;url=index.php?uc=Genres&action=all");
					}
					break;
					
	case 'supprimer' :
                    // a compl�ter Artist::supprimerArtist($_REQUEST['numart']);
                    Genre::SupprimerGenre($_REQUEST['numgenre']);
					header("refresh: 0;url=index.php?uc=Genres&action=all");
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
	default: echo "rien";
} 
?>