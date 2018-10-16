<div id="page">
	<div id="content">
		<div class="box">
			<h2>Veuillez vous connecter</h2>
			<section>
				<form action="index.php?uc=Administrer&action=verifConnexion" method='post'>
					<?php if(isset($_SESSION['flash'])){ echo $_SESSION['flash'] ;}?>
					<label for='login'>Login</label>	<input type='text' size='20px' name='username' id='login' placeholder="saisir votre login"/>
					<label for='mdp'>Mot de passe</label>	<input type='password' name='password' id='mdp' />
					<input type='submit' value='se connecter'/>
				</form>
			</section>
		</div>
	</div>
	<br class="clearfix" />
</div>
