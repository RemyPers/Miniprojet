<?php
if(isset($_SESSION['pseudo'])) {
	$pseudo = $_SESSION['pseudo'];
} else {
	header('location: admin.html');
}
?>
<section>
	<h1>Supprimer le Cuisinier #<?= $_GET['idCuisinier']; ?></h1>
    <div class="box">
    <?php
	if(!isset($message)) {
        ?>
        <p><?= $cuisinier->getPrenom(); ?> <?= $cuisinier->getNom(); ?></p>
        <hr />
		<p>Etes-vous certain de vouloir supprimer ce cuisinier ?</p>
        <form method="post" action="">
        <p><input class = "submit" type="submit" name="non" value="NON" /></p>
        <input type="hidden" name="idCuisinier" value="<?= $_GET['idCuisinier']; ?>" />
        <p><input class = "submit" type="submit" name="oui" value="OUI" /></p>
        </form>


    <?php
	} else { echo $message; } ?>
    </div>
</section>