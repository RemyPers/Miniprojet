<article>
	<h1>Accueil</h1>
    <ol>
    <?php
	foreach($articles as $article) {
	?>
            


        <li class="affichage">
            <a href="voir-article_<?= $article->getIdRecette(); ?>_<?= $article->getIdCuisinier(); ?>.html"><img src="<?= RECETTES . $article->getImg() ?>" width="300" height="auto" alt="<?= $article->getDescription(); ?>"></a>
            <a class="lien" href="voir-article_<?= $article->getIdRecette(); ?>_<?= $article->getIdCuisinier(); ?>.html"><?= $article->getTitre(); ?></a>
        </li>

    <?php
	}
	?>
    </ol>
</article>

<aside>

<h1>Cuisinier</h1>
    <ol>
    <?php
	foreach($cuisiniers as $cuisinier) {
        ?><li><?php

        ?> <a href="voir-cuisinier_0_<?=  $cuisinier->getIdCuisinier(); ?>.html"> <?=  $cuisinier->getPrenom(); ?> <?=  $cuisinier->getNom(); ?> <br> Voir Recettes</h3></a> 
        </li>
        <br>
        <?php

    }

    ?>
    </ol>
</aside>

<!---->
<!--            <img class="imgs" src="" width="100" height="auto" alt="Grapefruit slice atop a pile of other slices"> 
-->