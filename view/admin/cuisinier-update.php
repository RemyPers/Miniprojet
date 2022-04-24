<?php
if(isset($_SESSION['pseudo'])) {
	$pseudo = $_SESSION['pseudo'];
} else {
	header('location: admin.html');
}
?>
<section>
	<h1>Modifier un cuisinier</h1>
		<?= $message; ?>
        <form method="post" action="">
            <div class="box">

        	    <b>Prénom :</b>
                <p><textarea name="prenom"><?= $cuisinier->getPrenom();?></textarea></p>
                <b>Nom :</b>
                <p><textarea name="nom"><?=$cuisinier->getNom();?></textarea></p>
                <b>Chemin Image :</b>
                <p><textarea name="img"><?= $cuisinier->getImg(); ?></textarea></p>
                <p><input type="hidden" name="idCuisinier" value="<?= $cuisinier->getIdCuisinier(); ?>" /></p>
                <p><input id="soumission" class = "submit"  type="submit" value="Modifier le cuisinier" /></p>
            </div>
        </form>
</section>

<aside>

</aside>