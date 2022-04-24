<?php
if(isset($_SESSION['pseudo'])) {
	$pseudo = $_SESSION['pseudo'];
} else {
	header('location: admin.html');
}
?>
<section>

	<h1>Admin <i>(Connecté : <?= $pseudo; ?>)</i></h1>
    <p><b>Element à créer :</b></p>
    <ol>
        <li><a class="lien" href="creer-article.html">Créer un Article</a></li>
        <li><a class="lien" href="creer-cuisinier.html">Créer un Cuisinier</a></li>
        <li><a class="lien" href="creer-admin.html">Créer un Administrateur</a></li>
	</ol>

</section>