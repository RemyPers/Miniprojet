<?php
namespace controller\site;
use classe;
use model\site as ms;


class Accueil {
/*************** AFFICHER TOUS LES ARTICLES ***************/		
	public function AfficherAccueil() {
		
		$manager = new ms\ArticleManager();
		$articles = $manager->ReadAllArticle();
		$cuisiniers = $manager->ReadAllCuisiniers();
		
		$view = new classe\View('site', 'accueil', 'Accueil', 'Je suis la desc de l\'accueil', 'clé 1, clé 2');
		$view->AfficherVue(array('articles'=>$articles,'cuisiniers'=>$cuisiniers));
	}
/*************** AFFICHER TOUS LES ARTICLES ***************/
/**********************************************************/


/*************** AFFICHER UN ARTICLE ***************/	
	public function AfficherArticle() {
		
		$manager = new ms\ArticleManager();
		$article = $manager->ReadArticle($_GET['idRecette'], $_GET['idCuisinier']);
		$cuisiniers = $manager->ReadAllCuisiniers();
		
		$view = new classe\View('site', 'voir-article', $article->getTitre(), $article->getDescription());
		$view->AfficherVue(array('article'=>$article, 'cuisiniers'=>$cuisiniers));
	}
/*************** AFFICHER UN ARTICLE ***************/
/***************************************************/			



/*************** AFFICHER UN CUISINIER ***************/	
public function AfficherCuisinier() {
		
	$manager = new ms\ArticleManager();
	$cuisinierRecettes = $manager->ReadCuisinierRecettes($_GET['idCuisinier']);
	$cuisinier = $manager->ReadCuisinier($_GET['idCuisinier']);
	$cuisiniers = $manager->ReadAllCuisiniers();

	$nom = $cuisinier->getNom()." ".$cuisinier->getPrenom();
	$desc = "Recettes du cuisinier ".$nom;
	$view = new classe\View('site', 'voir-cuisinier', $nom, $desc);
	$view->AfficherVue(array('cuisinierRecettes'=>$cuisinierRecettes, 'cuisinier'=>$cuisinier, 'cuisiniers'=>$cuisiniers));
}
/*************** AFFICHER UN CUISINIER ***************/
/***************************************************/		
}