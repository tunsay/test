<div id="page">
	<div id="content">
		<div class="box">
            <h2>Liste album</h2>
			<section>
			<script>
			function supprAlbum(id) {
				if(confirm("Voulez vous vraimer supprimer cet album ?"))
				{
					location.href='index.php?uc=Albums&action=supprimer&numalb='+id;
				}
				else {
					alert("l'album n'a pas été supprimé.");
				}
			}
			</script>
			<table><tr><th>Numéro</th><th>Titre</th><th>Année</th><th>Genre</th><th>actions</th></tr>
			<?php 
				foreach($lesAlbums as $Album) //parcours du tableau d'objets récupérés
				{ 	
				$id=$Album->getId();           
				$titre=$Album ->getNom();
				$annee=$Album ->getAnnee();
				$idgenre=$Album ->getGenre();
			?>
				<tr>
					<td width=5%><?= $id?></td><td width=80%><?= $titre?></td><td><?= $annee?></td><td>
					<?php 
						foreach($lesGenre as $genre){
							if($genre->getId() == $idgenre){
								echo $genre->getNom();
							}
						}
					?>
					</td><!--affichage dans des liens-->
					<td class='action' width=15%>
						<!-- à compléter pour voir un albums (nom et morceaux)
						pour supprimer un album et pour modifier un album -->
						<?php		
						//If (!empty( $_SESSION['connexion']))  si quelqu'un est connecté
						//{ ?>	
							<a href='index.php?uc=Albums&action=modifier&numalb=<?= $id ?>' class="imageModifier" title="modifier l'album"></a>
							<span class="imageSupprimer" onclick="javascript:supprAlbum('<?= $id ;?>')" title="supprimer l'album" ></span> <!-- on met un span pour pouvoir invoquer le on click -->
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


