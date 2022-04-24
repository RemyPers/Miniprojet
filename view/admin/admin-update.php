<?php
if(isset($_SESSION['pseudo'])) {
	$pseudo = $_SESSION['pseudo'];
} else {
	header('location: admin.html');
}

?>
<section>
	<h1>Modifier un administrateur</h1>
		<?= $message; ?>
        <form method="post" action="">
            <div class="box">

        	    <b>Pseudo :</b>
                <p><textarea name="pseudo"><?= $admin->getPseudo();?></textarea></p>
                <b>Password :</b>
                <p><textarea name="password"><?=$admin->getPassword();?></textarea></p>
                <b>Super Admin (1 = Oui / 0 = Non) :</b>
                <p><input type="number" name="supAdmin" value="<?= $admin->getSupAdmin(); ?>" /></p>
                <p><input type="hidden" name="idAdmin" value="<?= $admin->getIdAdmin(); ?>" /></p>
                <p><input id="soumission" class = "submit" type="submit" value="Modifier l'administrateur" /></p>
            </div>
        </form>
</section>

<aside>

</aside>