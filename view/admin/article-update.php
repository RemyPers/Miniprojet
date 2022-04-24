<?php
if(isset($_SESSION['pseudo'])) {
	$pseudo = $_SESSION['pseudo'];
} else {
	header('location: admin.html');
}
?>
<section>
	<h1>Modifier un article</h1>
		<?= $message; ?>
        <form method="post" action="">
            <div class="box">

        	    <b>Titre :</b>
                <p><textarea name="titre"><?= $article->getTitre(); ?> </textarea></p>
                <b>Image :</b>
                <p><textarea name="img"><?= $article->getImg(); ?> </textarea></p>
                <b>Description :</b>
                <p><textarea name="description"><?= $article->getDescription(); ?></textarea></p>
                <b>Ingredients :</b>
                <p><textarea name="ingredients"><?= $article->getIngredients(); ?></textarea></p>
                <b>Etapes :</b>
                <p><textarea name="etapes"><?= $article->getEtapes(); ?></textarea></p>
                <b>Difficulte :</b>
                <p><input type="number" name="difficulte" value="<?= $article->getDifficulte(); ?>" /></p>
                <b>Cout :</b>
                <p><input type="number" name="cout" value="<?= $article->getCout(); ?>" /></p>
                <b>Temps :</b>
                <p><input type="number" name="temps" value="<?= $article->getTemps(); ?>" /></p>
                <b>Nombre de personnes :</b>
                <p><input type="number" name="nombrePersonnes" value="<?= $article->getNombrePersonnes(); ?>" /></p>
                <b>Visibilité :</b>
                <p><input type="number" name="visibilite" value="<?= $article->getVisibilite(); ?>" /></p>
                <b>Id Cuisinier :</b>
                <p><input type="number" name="idCuisinier" value="<?= $article->getIdCuisinier(); ?>" /></p>
                <p><input type="hidden" name="idRecette" value="<?= $article->getIdRecette(); ?>" /></p>
                <p><input id="soumission" class = "submit" type="submit" value="Modifier l'article" /></p>
            </div>
        </form>
</section>

<aside>

</aside>