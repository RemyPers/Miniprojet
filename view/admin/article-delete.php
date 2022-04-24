<?php
if(isset($_SESSION['pseudo'])) {
	$pseudo = $_SESSION['pseudo'];
} else {
	header('location: admin.html');
}
?>
<section>
	<h1>Supprimer l'article #<?= $_GET['idRecette']; ?></h1>
    <div class="box">
    <?php
	if(!isset($message)) {
        ?>
        <p><?= $article->getTitre(); ?></p>
        <p><?= $article->getDescription(); ?></p>
        <hr />
		<p>Etes-vous certain de vouloir supprimer cet article ?</p>
        <form method="post" action="">
        <p><input class = "submit" type="submit" name="non" value="NON" /></p>
        <input type="hidden" name="idRecette" value="<?= $_GET['idRecette']; ?>" />
        <p><input class = "submit" type="submit" name="oui" value="OUI" /></p>
        </form>


    <?php
	} else { echo $message; } ?>
    </div>
</section>