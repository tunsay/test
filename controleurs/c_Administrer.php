<?php
$action = $_REQUEST['action']; //récupération de l'action
//echo "action:".$action;
switch($action)
{ 
	case 'connexion': //pour afficher tous les albums
		{
            include("vues/v_connexion.php");
            if(isset($_REQUEST['flash']))
            {
                if($_REQUEST['flash'] == 'unset')
                {
                    unset($_SESSION['flash']);
                }
            }
			break;
        }
    case 'verifConnexion':
        {
            
            $auth=new Auth($session);
            $auth->login($_POST["username"], $_POST["password"]);
            echo "<script type='text/javascript'>document.location.replace('index.php?uc=Administrer&action=connexion&flash=unset');</script>";
            include("vues/v_connexion.php");
            
            break;
        }
        case 'deconnexion':
        {
            $auth=new Auth($session);
            $auth->deconnection();
            echo "<script type='text/javascript'>document.location.replace('index.php?uc=Administrer&action=connexion&flash=unset');</script>";
            include("vues/v_connexion.php");
            break;
        }
    default:
        echo "rien";
}
?>
