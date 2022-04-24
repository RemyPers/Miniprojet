<?php
if(isset($_SESSION['pseudo'])) {
	$pseudo = $_SESSION['pseudo'];
} else {
	header('location: admin.html');
}


?>
<article>
	<h1>Créer un administrateur</h1>
    <div class="box">
		<?= $message; ?>
        <form method="post" action="">
            <b>Pseudo :</b>
            <p><input type="text" name="pseudo" placeholder="Pseudo" /></p>
            <b>Password :</b>
            <p><input type="number" name="password" placeholder="Password" /></p>
            <b>Super Admin :</b>
            <p><input type="number" name="supAdmin" placeholder="1 = Oui / 0 = Non" /></p>
            <p><input id="soumission" class = "submit" type="submit" value="Créer l'administrateur" /></p>
        </form>
    </div>
</article>