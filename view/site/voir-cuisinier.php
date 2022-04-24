



<article>


    
	    <h1><?= $cuisinier->getPrenom(); ?> <?= $cuisinier->getNom(); ?></h1>
        <img src="<?= CUISINIERS . $cuisinier->getImg() ?>" width="300" height="auto" alt="Photo <?= $cuisinier->getPrenom(); ?> <?= $cuisinier->getNom(); ?>"> 


    <div class="recettes">

        <h4>Recettes du chef <?= $cuisinier->getPrenom(); ?> <?= $cuisinier->getNom(); ?></h4>
        <?php
            foreach($cuisinierRecettes as $cuisinierRecette) {
                ?>
                <li class="affichage">
                    <a href="voir-article_<?= $cuisinierRecette->getIdRecette(); ?>_<?= $cuisinierRecette->getIdCuisinier(); ?>.html"><img src="<?= RECETTES . $cuisinierRecette->getImg() ?>" width="300" height="auto" alt="<?= $cuisinierRecette->getDescription(); ?>"> </a>
                    <a class="lien" href="voir-article_<?= $cuisinierRecette->getIdRecette(); ?>_<?= $cuisinierRecette->getIdCuisinier(); ?>.html"><?= $cuisinierRecette->getTitre(); ?></a>
                </li><?php
            }
        ?>

    </div>

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