<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?= $titre; ?></title>
<link rel="stylesheet" href="<?= MEDIA; ?>/css/style.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="<?= $description; ?>" />
<meta name="keywords" content="<?= $motcle; ?>" />
</head>

<body>

<div id="site">
	<header><h1>HEADER</h1></header>
    <nav>
    	<ul>
<?php
if(isset($_SESSION['pseudo'])) {
?>        
         <li><a href="deconnexion.html">Quitter</a></li>
         <li><a href="admin-create.html">Créer</a></li>
         <li><a href="admin-home.html">Modifier</a></li>
         <li><a href="admin-home.html">Supprimer</a></li>
<?php
} else {
?>         
         <li><a href="accueil.html">Accueil</a></li>
         <li><a href="admin.html">Admin</a></li> 
<?php
}
?>                         
        </ul>
    </nav>
    <?= $contenu; ?>
    <footer><p>Je suis le footer</p></footer>
</div> 

<script src="<?= MEDIA; ?>/jquery/jquery-3.4.1.min.js"></script>
<script src="<?= MEDIA; ?>/jquery/controle-formulaire.js"></script>
</body>
</html>   