<?php

Class Auth{

    private $session;

    public function __construct($session){
        $this->session = $session;
    }

    public function connect($user){
        $this->session->write('connexion', $user);
    }

    public function login($login, $mdp){
        $sql="SELECT count(*) from user where login= :login AND mdp = :mdp";
        $resultat=MonPdo::getInstance()->prepare($sql);
        $resultat->bindParam('login', $login);
        $resultat->bindParam('mdp', $mdp);
        $resultat->execute();
        $res = $resultat->fetch();
        if($res[0] != 0)
        {
            $_SESSION['connexion'] = true;
            $_SESSION['flash'] =  "<p style='color:green'>Vous êtes maintenant connecté</p>";
        }
        else
        {
            $_SESSION['flash'] = "<p style='color:red'>Identidiant ou mot de passe incorrecte</p>";
        }
        
    }
    
    public function deconnection()
    {
        $_SESSION['connexion'] = NULL;
        $_SESSION['flash'] = "<p style='color:red'>Vous avez été déconnecté</p>";
    }

}

?>