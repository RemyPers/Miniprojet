<?php
if(isset($_SESSION['pseudo'])) {
	$pseudo = $_SESSION['pseudo'];
} else {
	header('location: admin.html');
}
?>
<article>
	<h1>Créer un article</h1>
    <div class="box">
		<?= $message; ?>
        <form method="post" action="">
            <b>Titre :</b>
            <p><input type="text" name="titre" placeholder="Titre" /></p>
            <b>Image :</b>
            <p><input type="text" name="img" placeholder="Chemin Image" /></p>
            <b>Description :</b>
            <p><textarea name="description" placeholder="Description"></textarea></p>
            <b>Ingrédients :</b>
            <p><textarea name="ingredients" placeholder="Ingredients"></textarea></p>
            <b>Etapes :</b>
            <p><textarea name="etapes" placeholder="Etapes"></textarea></p>
            <b>Difficulté :</b>
            <p><input type="number" name="difficulte" placeholder="Difficulte" /></p>
            <b>Temps :</b>
            <p><input type="number" name="temps" placeholder="Temps" /></p>
            <b>Coût :</b>
            <p><input type="number" name="cout" placeholder="Cout" /></p>
            <b>Nombre de personnes :</b>
            <p><input type="number" name="nombrePersonnes" placeholder="nombrePersonnes" /></p>
            <b>Visibilité :</b>
            <p><input type="number" name="visibilite" placeholder="Visibilite" /></p>
            <b>Id Cuisinier :</b>
            <p><input type="number" name="idCuisinier" placeholder="Id Cuisinier" /></p>

            <p><input id="soumission" class = "submit" type="submit" value="Créer l'article" /></p>
        </form>
    </div>
</article>