<div id="page">
	<div id="content">
		<div class="box">
        <?php
		// si la variable $_REQUEST['numart'] est vide c'est qu'il s'agit d'un nouvel artiste � cr�er
		if(!empty($_REQUEST['numalb'])){ // si on demande une modification d'un artiste
			$album=Album::findById($_REQUEST['numalb']); // trouve l'artiste et on renvoie un objet Artist
        }
        //debug($lesArtistes);
		?>
			<h2>Fiche album</h2>
			<section>
			<form action="index.php?uc=Albums&action=VerifForm" method="POST">
            <input type='hidden' name="idAlbum" value='<?php if(!empty($_REQUEST['numalb'])){echo $album->getId();}?>'>
            <table>
                <tr>
                    <td><label for="nom">Titre</label></td>
                    <td><input type="text" name="nom" id="nom" value="<?php if(!empty($_REQUEST['numalb'])){echo $album->getNom();}?>"></td>
                </tr>
                <tr>
                    <td><label for="annee">Année</label></td>
                    <td><input type="number" name="annee" id="annee" value="<?php if(!empty($_REQUEST['numalb'])){echo $album->getAnnee();}?>"></td>
                </tr>
                <tr>
                    <td><label for="genre">Genre</label></td>
                    <td><select name="genre">
                        <?php
                        if(!empty($_REQUEST['numalb'])){
                            foreach($lesGenre as $genre){
                                if($genre->getId() == $album->getGenre()){
                                    echo "<option value='" . $genre->getId() . "' selected>" . $genre->getNom() . "</option>";
                                }
                                else{
                                    echo "<option value='" . $genre->getId() . "'>" . $genre->getNom() . "</option>";
                                }
                            }
                        }else{
                            foreach($lesGenre as $genre){
                            echo "<option value='" . $genre->getId() . "'>" . $genre->getNom() . "</option>";
                            }
                        }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="artist">Artistes</label></td>
                    <td><select name="artist">
                        <?php
                        if(!empty($_REQUEST['numalb'])){ 
                            foreach($lesArtistes as $artist){
                                if($artist->getId() == $album->getArtiste()){
                                    echo "<option value='" . $artist->getId() . "' selected>" . $artist->getNom() . "</option>";
                                }
                                else{
                                    echo "<option value='" . $artist->getId() . "'>" . $artist->getNom() . "</option>";
                                }
                            }
                        }else{
                            foreach($lesArtistes as $artist){
                                echo "<option value='" . $artist->getId() . "'>" . $artist->getNom() . "</option>";
                            }
                        }
                       
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="<?php if(!empty($_RESQUEST['numalb'])){echo "Modifier l'album";}else{echo 'Ajouter l\'album';}?>"></td>
                </tr>
            </table>
            </form>
			</section>
		</div>
	</div>
	<br class="clearfix" />
</div>