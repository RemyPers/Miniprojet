<?php
if(isset($_SESSION['pseudo'])) {
	$pseudo = $_SESSION['pseudo'];
} else {
	header('location: admin.html');
}


?>
<article>
	<h1>Créer un cuisinier</h1>
    <div class="box">
		<?= $message; ?>
        <form method="post" action="">
            <b>Nom :</b>
            <p><input type="text" name="nom" placeholder="Nom" /></p>
            <b>Prenom :</b>
            <p><input type="text" name="prenom" placeholder="Prenom" /></p>
            <b>Chemin Image :</b>
            <p><input type="text" name="img" placeholder="Chemin Image" /></p>
            <p><input id="soumission" class = "submit" type="submit" value="Créer le cuisinier" /></p>
        </form>
    </div>
</article>