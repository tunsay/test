<div id="page">
	<div id="content">
		<div class="box">
            <h2>Liste genre</h2>
			<section>
			<script>
			function supprGenre(id) {
				if(confirm("Voulez vous vraimer supprimer ce genre ?"))
				{
					location.href='index.php?uc=Genres&action=supprimer&numgenre='+id;
				}
				else {
					alert("Le genre n'a pas été supprimé.");
				}
			}
			</script>
			<table><tr><th>Numero</th><th>Nom</th><th>Action</th></tr>
            <?php 
            
				foreach($lesGenres as $genre) //parcours du tableau d'objets récupérés
				{ 	
				$nom=$genre->getNom();
                $id=$genre->getId();
			
			?>
				<tr>
					<td width=5%><?= $id?></td><td width=80%><?= $nom?></td><!--affichage dans des liens-->
					<td class='action' width=15%>
                    <a href='index.php?uc=Artistes&action=genre&numgenre=<?= $id ?>' class="imageRechercher" title='Voir la liste des artistes'></a>
						<!-- à compléter pour voir un albums (nom et morceaux)
						pour supprimer un album et pour modifier un album -->
						<?php		
						//If (!empty( $_SESSION['connexion']))  si quelqu'un est connecté
						//{ ?>	
							<a href='index.php?uc=Genres&action=modifier&numgenre=<?= $id ?>' class="imageModifier" title="modifier le genre"></a>
							<span class="imageSupprimer" onclick="javascript:supprGenre('<?= $id ;?>')" title="supprimer le genre" ></span> <!-- on met un span pour pouvoir invoquer le on click -->
						<?php // } ?>
					</td>
				</tr>
			<?php
				}
			?>
			</table>
			</section>
		</div>
	</div>
	<br class="clearfix" />
</div>


