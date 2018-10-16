<?php
class Album extends Entity{
    private $annee;
    private $genre;
    private $alb_art;

    public function getAnnee()
    {
        return $this->annee;
    }
    public function setAnnee($value)
    {
        if(!is_numeric($value))
        { throw new Exception("l'année doit être un nombre.");
        }
        $this->annee=$value;
    }

    public function getArtiste()
    {
        return $this->alb_art;
    }
    public function setArtiste($value)
    {
        $this->alb_art=$value;
    }

    public function getGenre()
    {
        return $this->genre;
    }
    public function setGenre($value)
    {
        $this->genre=$value;
    }
    public function __toString()
    {
        return "informations sur l'album : <br>". parent::__toString();
    }

    public static function getAll()
    {
        $sql="SELECT * FROM album" ;
        $resultat=MonPdo::getInstance()->query($sql);
        $lesAlbums=$resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Album'); 
        return  $lesAlbums;
    }

    public static function ajouterAlbum($nom,$annee,$genre,$artist)
    {
        $sql="insert into album values(null, :nom , :annee, :genre, :artist)" ;
        $resultat=MonPdo::getInstance()->prepare($sql);
        //$resultat->bindParam(':nom', $nom);
        $resultat->execute([":nom"=> $nom, ":annee"=>$annee, ":genre"=>$genre, ":artist"=>$artist]);
		// ajouter la gestion des exceptions
    }
    public static function supprimerAlbum($id)
    {
        // a completer 
        $sql="delete from album where id= :id" ;
        $resultat=MonPdo::getInstance()->prepare($sql);
        $resultat->bindParam(':id', $id);
        $resultat->execute();
		// ajouter la gestion des exceptions
    }
    public static function findById($id)
    {
        $sql="SELECT * FROM album where id= ?" ;
        $resultat=MonPdo::getInstance()->prepare($sql); // prépare la requête
        $resultat->execute(array($id)); // applique le paramètre
        $album=$resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Album"); // lit la ligne et renvoie un objet Artist
        return $album[0];
		// ajouter la gestion des exceptions
    }
    
    public static function modifierAlbum($nom,$annee,$genre,$artist,$id)
    {
		// a completer 
        $sql="update album set nom= ?, annee=?, genre=?, alb_art=? where id= ?" ;
        $resultat=MonPdo::getInstance()->prepare($sql); // prépare la requête
        $resultat->execute(array($nom, $annee, $genre, $artist, $id)); // applique le paramètre
    }
}