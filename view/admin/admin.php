<article>
	<h1>Admin</h1>
    <div class="box">
		<?= $message; ?>
        <form method="post" action="">
            <p><input id="pseudo" type="text" name="pseudo" placeholder="Pseudo" /></p>
            <span class="erreurPseudo"></span>
            <p><input id="password" type="password" name="password" placeholder="Password" /></p>
            <span class="erreurPassword"></span>
            <p><input id="soumission" class = "submit" type="submit" value="Entrer" /></p>
        </form>
    </div>
</article>

<aside>
</aside>