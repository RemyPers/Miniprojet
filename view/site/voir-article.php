<article>
	<h1><?= $article->getTitre(); ?></h1>

    <img src="<?= RECETTES . $article->getImg() ?>" width="600" height="auto" alt="Grapefruit slice atop a pile of other slices">
    <br>


    <?php $ip = $article->getUserIpAddr(); ?>


    <form method="post">
        <input type="submit" name="jaime"
                class="<?= $article->getJaime() ?>" value="J'aime" />
    </form>

    <h3>Nombres de likes : <?= $article->getNbJaime(); ?></h3>

    <?php
        if(array_key_exists('jaime', $_POST)) {
            $article->setJaime();  
        }
    ?>


    <br>
    <div class="infos">


        Difficulté : 
        <?php for ($i = 1; $i <= $article->getDifficulte(); $i++) {
            ?><img src="<?= OTHERS?>fouet.png" alt="Grapefruit slice atop a pile of other slices"><?php
        }
        ?>

        <?php
            $temps_back = $article->getTemps();
            $heures = 0;
            $minutes = 0;

            for ($i = $temps_back; $i >= 3600; $i = $i - 3600) {
                $heures = $heures + 1;
            }

            $minutes = ($temps_back - (3600 * $heures)) / 60;

            if ($heures > 0){
                $heures = $heures." H ";
            }
            else {
                $heures = "";
            }
        ?>

        - Temps de réalisation : <?= $heures ?><?= $minutes ?> Minutes - Coût : 

        <?php
            $cout = $article->getCout();
            for ($i = 1; $i <= $cout; $i++) {
                ?> € <?php
            }
        ?>
        <?php
            $nb = $article->getNombrePersonnes();
        ?>
        - <?= $nb ?> Personne(s)

    </div>

    

    <h4>Description</h4>
    <?= $article->getDescription(); ?>
    <h4>Ingrédients</h4>
    <?= $article->getIngredients(); ?>
    <h4>Etapes</h4>
    <?php
        $eps = $article->getEtapes();

        $etapes = (explode(".",$eps));

        ?>
        <div class="etapes">
            <ol>
        <?php
        
        foreach($etapes as $etape) {
            ?>
            <li><?= $etape; ?></li><?php 
            
        }

        ?>
        </ol>
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