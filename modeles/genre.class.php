<?php 

class Genre extends Entity{

    public static function getAll()
    {
        $sql="SELECT * FROM genre " ;
        $resultat=MonPdo::getInstance()->query($sql);
        $lesGenre=$resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Genre');
        return $lesGenre;
		throw new Exception("Problème dans l'execution de la requête.") ;
    }

    public static function ajouterGenre($nom)
    {
        $sql="insert into genre values(null, :nom)" ;
        $resultat=MonPdo::getInstance()->prepare($sql);
        //$resultat->bindParam(':nom', $nom);
        $resultat->execute([":nom"=> $nom]);
		// ajouter la gestion des exceptions
    }

    // trouve un artiste grace à son id passé en paramètre
	// renvoie un objet Artiste
    public static function findById($id)
    {
        $sql="SELECT * FROM genre where id= ?" ;
        $resultat=MonPdo::getInstance()->prepare($sql); // prépare la requête
        $resultat->execute(array($id)); // applique le paramètre
        $genre=$resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Genre"); // lit la ligne et renvoie un objet Artist
        return $genre[0];
		// ajouter la gestion des exceptions
    }

    public static function supprimerGenre($id)
    {
        // a completer 
        $sql="delete from genre where id= :id" ;
        $resultat=MonPdo::getInstance()->prepare($sql);
        $resultat->bindParam(':id', $id);
        $resultat->execute();
		// ajouter la gestion des exceptions
    }

    // modifie un objet genre
    public static function modifierGenre($id,$nom)
    {
        $sql="update genre set nom= ? where id= ?" ;
        $resultat=MonPdo::getInstance()->prepare($sql); // prépare la requête
        $resultat->execute(array($nom,$id)); // applique le paramètre
    }
}