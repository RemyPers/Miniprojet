<?php
if(isset($_SESSION['pseudo'])) {
	$pseudo = $_SESSION['pseudo'];
} else {
	header('location: admin.html');
}
?>
<section>
	<div class="section">
		<h1><?php if(isset($_SESSION['supAdmin'])) { ?>Super Admin<?php }else{ ?>Admin<?php } ?> <i>(Connecté : <?= $pseudo; ?>)</i></h1>
    	<p><b>Liste des articles</b></p>
    	<ol>
    	<?php
		foreach($articles as $article) {
		?>
    	<li><?= $article->getTitre(); ?> [<a class="lien" href="modifier-article_<?= $article->getIdRecette(); ?>_0.html">Modifier</a>] [<a class="lien" href="supprimer-article_<?= $article->getIdRecette(); ?>_0.html">Supprimer</a>]</li>

		<?php
		}
		?>
		</ol>
		<br>
		<p><b>Liste des Cuisiniers</b></p>
		<ol>
		<?php
		foreach($cuisiniers as $cuisinier) {
			?>
			<li><?= $cuisinier->getPrenom(); ?> <?= $cuisinier->getNom(); ?>[<a class="lien" href="modifier-cuisinier_0_<?= $cuisinier->getIdCuisinier(); ?>.html">Modifier</a>] [<a class="lien" href="supprimer-cuisinier_0_<?= $cuisinier->getIdCuisinier(); ?>.html">Supprimer</a>]</li>
		
			<?php
			}
		?>
  		</ol>
		<br>
		<p><b>Liste des Administrateurs</b></p>
		<ol>
		<?php
			if(isset($_SESSION['supAdmin']) && $membres != []) {
				foreach($membres as $membre) {
					?>
					<li><?= $membre->getPseudo(); ?>[<a class="lien" href="modifier-admin_0_<?= $membre->getIdAdmin(); ?>.html">Modifier</a>] [<a class="lien" href="supprimer-admin_0_<?= $membre->getIdAdmin(); ?>.html">Supprimer</a>]</li>
					<?php
				}
			}
			elseif(!isset($_SESSION['supAdmin'])) {
				?><p>Vous n'avez pas les droits pour modifier les utilisateur</p><?php
			}
			elseif($membres == []) {
				?><p>Il n'y a aucun utilisateur à modifier</p><?php
			}
		?>
	</div>
</section>