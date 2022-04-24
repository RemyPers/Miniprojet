<?php
namespace controller\admin;
use classe;
use model\admin as ma;
use model\site as ms;
class Admin {

/****************** ACCES A LA ZONE ADMIN ******************/
	public function voirAdmin() {
		if( (empty($_POST['pseudo'])) || (empty($_POST['password'])) ) {
			$manager = new ma\MembreManager();
			$message = $manager->getMsg();
			$view = new classe\View('admin', 'admin', 'Admin', 'Je suis la desc de l\'admin', 'clé admin 1, clé admin 2');
			$view->AfficherVue(array('message'=>$message));
		} else {
			
			$manager = new ma\MembreManager();
			$membre = $manager->ReadMembre($_POST['pseudo'], $_POST['password']);
			
			if( ($membre->getPseudo() == $_POST['pseudo']) AND ($membre->getPassword() == $_POST['password']) ) {
				$_SESSION['pseudo'] = $_POST['pseudo'];
				if($membre->getSupAdmin() == 1){
					$_SESSION['supAdmin'] = $membre->getSupAdmin();
				}
				$this->AfficherTousLesArticles();

			} else {
				$manager = new ma\MembreManager();
				$message = $manager->getMsgErreur();
				$view = new classe\View('admin', 'admin', 'Admin', 'Je suis la desc de l\'admin', 'clé admin 1, clé admin 2');
				$view->AfficherVue(array('message'=>$message));
			}
		}
	}
/****************** ACCES A LA ZONE ADMIN ******************/
/***********************************************************/


/*************** CREATION D'UN ARTICLE ***************/
	public function CreerArticle() {
		if( (empty($_POST['titre'])) && (empty($_POST['img'])) && (empty($_POST['difficulte'])) && (empty($_POST['temps'])) && (empty($_POST['cout'])) && (empty($_POST['description'])) && (empty($_POST['ingredients'])) && (empty($_POST['etapes'])) && (empty($_POST['nombrePersonnes'])) && (empty($_POST['visibilite'])) && (empty($_POST['idCuisinier'])) ) {
			$manager = new ms\ArticleManager();
			$message = $manager->getMsgCreateArticle();

		} elseif( (empty($_POST['titre'])) || (empty($_POST['img'])) || (empty($_POST['difficulte'])) || (empty($_POST['temps'])) || (empty($_POST['cout'])) || (empty($_POST['description'])) || (empty($_POST['ingredients'])) || (empty($_POST['etapes'])) || (empty($_POST['nombrePersonnes'])) || (empty($_POST['visibilite'])) || (empty($_POST['idCuisinier'])) ) {
			$manager = new ms\ArticleManager();
			$message = $manager->getMsgErreurCreateArticle();
		} else {
			$article = new ms\Article();

			$article->setTitre($_POST['titre']);
			$article->setImg($_POST['img']);
			$article->setDescription($_POST['description']);
			$article->setIngredients($_POST['ingredients']);
			$article->setEtapes($_POST['etapes']);
			$article->setDifficulte($_POST['difficulte']);
			$article->setCout($_POST['cout']);
			$article->setTemps($_POST['temps']);
			$article->setNombrePersonnes($_POST['nombrePersonnes']);
			$article->setVisibilite($_POST['visibilite']);
			$article->setIdCuisinier($_POST['idCuisinier']);
			
			$manager = new ms\ArticleManager();
			$manager->CreateArticle($article);
			$message = $manager->getMsgSuccesCreateArticle();
		}
		
	    $view = new classe\View('admin', 'article-create', 'Créer un article', 'Créer un article', 'clé 1, clé 2');
		$view->AfficherVue(array('message'=>$message));
	}
	

	public function CreerCuisinier() {
		if( (empty($_POST['nom'])) && (empty($_POST['prenom'])) && (empty($_POST['img'])) ) {
			$manager = new ms\ArticleManager();
			$message = $manager->getMsgCreateArticle();

		} elseif( (empty($_POST['nom'])) || (empty($_POST['prenom'])) || (empty($_POST['img'])) ) {
			$manager = new ms\ArticleManager();

			$message = $manager->getMsgErreurCreateArticle();
		} else {
			$cuisinier = new ms\Cuisinier();

			$cuisinier->setNom($_POST['nom']);
			$cuisinier->setImg($_POST['img']);
			$cuisinier->setPrenom($_POST['prenom']);

			
			$manager = new ms\ArticleManager();
			$manager->CreateCuisinier($cuisinier);
			$message = $manager->getMsgSuccesCreateArticle();
		}
		
	    $view = new classe\View('admin', 'cuisinier-create', 'Créer un cuisinier', 'Créer un cuisinier', 'clé 1, clé 2');
		$view->AfficherVue(array('message'=>$message));
	}
	public function CreerAdmin() {
		if( (empty($_POST['pseudo'])) && (empty($_POST['password'])) ) {
			$manager = new ms\ArticleManager();
			$message = $manager->getMsgCreateArticle();

		} elseif( (empty($_POST['pseudo'])) || (empty($_POST['password'])) ) {
			$manager = new ms\ArticleManager();

			$message = $manager->getMsgErreurCreateArticle();
		} else {
			$admin = new ms\Admin();

			$admin->setPseudo($_POST['pseudo']);
			$admin->setPassword($_POST['password']);
			$admin->setSupAdmin($_POST['supAdmin']);

			
			$manager = new ms\ArticleManager();
			$manager->CreateAdmin($admin);
			$message = $manager->getMsgSuccesCreateArticle();
		}
		
	    $view = new classe\View('admin', 'admin-creation', 'Créer un admin', 'Créer un admin', 'clé 1, clé 2');
		$view->AfficherVue(array('message'=>$message));
	}

/*************** CREATION D'UN ARTICLE ***************/
/*****************************************************/


/****************** ACCES ACCUEIL ADMIN ******************/
	public function AfficherTousLesArticles() {
		$manager = new ms\ArticleManager();
		$articles = $manager->ReadAllArticle();
		$cuisiniers = $manager->ReadAllCuisiniers();
		$membreManager = new ma\MembreManager();
		$membres = $membreManager->ReadAllMembres();
		
		$view = new classe\View('admin', 'admin-acces', 'Zone Admin', 'Je suis la desc de la zone admin', 'clé zone admin 1, clé zone admin 2');
		$view->AfficherVue(array('pseudo' => $_SESSION['pseudo'], 'supAdmin' => $_SESSION['supAdmin'], 'articles'=>$articles, 'cuisiniers'=>$cuisiniers, 'membres'=>$membres));
	}

/****************** ACCES ACCUEIL ADMIN ******************/
/*********************************************************/


/*************** MODIFICATION D'UN ARTICLE ***************/
	public function ModifierArticle() {
		$manager = new ms\ArticleManager();
		$article = $manager->ReadArticle($_GET['idRecette']);
		if( (empty($_POST['titre'])) && (empty($_POST['img'])) && (empty($_POST['difficulte'])) && (empty($_POST['temps'])) && (empty($_POST['cout'])) && (empty($_POST['description'])) && (empty($_POST['ingredients'])) && (empty($_POST['etapes'])) && (empty($_POST['nombrePersonnes'])) && (empty($_POST['visibilite'])) && (empty($_POST['idCuisinier'])) ) {
			$message = $manager->getMsgCreateArticle();
		} elseif( (empty($_POST['titre'])) || (empty($_POST['img'])) || (empty($_POST['difficulte'])) || (empty($_POST['temps'])) || (empty($_POST['cout'])) || (empty($_POST['description'])) || (empty($_POST['ingredients'])) || (empty($_POST['etapes'])) || (empty($_POST['nombrePersonnes'])) || (empty($_POST['visibilite'])) || (empty($_POST['idCuisinier'])) ) {
			$message = $manager->getMsgErreurCreateArticle();
		} else {
			$article = new ms\Article();

			$article->setIdRecette($_POST['idRecette']);
			$article->setTitre($_POST['titre']);
			$article->setImg($_POST['img']);
			$article->setDescription($_POST['description']);
			$article->setIngredients($_POST['ingredients']);
			$article->setEtapes($_POST['etapes']);
			$article->setDifficulte($_POST['difficulte']);
			$article->setCout($_POST['cout']);
			$article->setTemps($_POST['temps']);
			$article->setNombrePersonnes($_POST['nombrePersonnes']);
			$article->setVisibilite($_POST['visibilite']);
			$article->setIdCuisinier($_POST['idCuisinier']);
			
			$manager->UpdateArticle($article);
			
			$message = $manager->getMsgSuccesUpdateArticle();
		}
		
			$view = new classe\View('admin', 'article-update', 'Modifier un article', 'Modifier un article', 'clé 1, clé 2');
			$view->AfficherVue(array('message' =>$message,
									 'article' => $article));
	}


	public function ModifierCuisinier() {
		$manager = new ms\ArticleManager();
		$cuisinier = $manager->ReadCuisinier($_GET['idCuisinier']);
		if( (empty($_POST['nom'])) && (empty($_POST['prenom'])) && (empty($_POST['img'])) && (empty($_POST['idCuisinier'])) ) {
			$message = $manager->getMsgCreateArticle();
		} elseif( (empty($_POST['nom'])) || (empty($_POST['prenom'])) || (empty($_POST['img'])) || (empty($_POST['idCuisinier'])) ) {
			$message = $manager->getMsgErreurCreateArticle();
		} else {
			$cuisinier = new ms\Cuisinier();

			$cuisinier->setNom($_POST['nom']);
			$cuisinier->setPrenom($_POST['prenom']);
			$cuisinier->setImg($_POST['img']);
			$cuisinier->setIdCuisinier($_POST['idCuisinier']);

			
			$manager->UpdateCuisinier($cuisinier);
			
			$message = $manager->getMsgSuccesUpdateArticle();
		}
		
		$view = new classe\View('admin', 'cuisinier-update', 'Modifier un cuisinier', 'Modifier un cuisinier', 'clé 1, clé 2');
		$view->AfficherVue(array('message' =>$message,
									 'cuisinier' => $cuisinier));
	}
	
	public function ModifierAdmin() {
		$manager = new ms\ArticleManager();
		$admin = $manager->ReadAdmin($_GET['idCuisinier']);
		if( (empty($_POST['password'])) && (empty($_POST['pseudo'])) ) {
			$message = $manager->getMsgCreateArticle();
		} elseif( (empty($_POST['password'])) || (empty($_POST['pseudo'])) ) {
			$message = $manager->getMsgErreurCreateArticle();
		} else {
			$admin = new ms\Admin();

			$admin->setPassword($_POST['password']);
			$admin->setPseudo($_POST['pseudo']);
			$admin->setSupAdmin($_POST['supAdmin']);
			$admin->setIdAdmin($_POST['idAdmin']);

			
			$manager->UpdateAdmin($admin);
			
			$message = $manager->getMsgSuccesUpdateArticle();
		}
		
		$view = new classe\View('admin', 'admin-update', 'Modifier un admin', 'Modifier un admin', 'clé 1, clé 2');
		$view->AfficherVue(array('message' =>$message,
									 'admin' => $admin));
	}

/*************** MODIFICATION D'UN ARTICLE ***************/
/*********************************************************/


/*************** SUPPRESSION D'UN ARTICLE ***************/
	public function SupprimerArticle() {
		if( (empty($_POST['oui'])) && (empty($_POST['non'])) ) {
			$manager = new ms\ArticleManager();
			$article = $manager->ReadArticle($_GET['idRecette']);
			
			$view = new classe\View('admin', 'article-delete', 'Supprimer un article', 'Supprimer un article', 'clé 1, clé 2');
			$view->AfficherVue(array('article' => $article));
		} elseif(isset($_POST['non'])) {
			$this->AfficherTousLesArticles();
		} elseif(isset($_POST['oui'])) {
			$article = new ms\Article();
			$article->setIdRecette($_POST['idRecette']);
			
			$manager = new ms\ArticleManager();
			$manager->DeleteArticle($article);
			$message = $manager->getMsgSuccesDeleteArticle();
			$view = new classe\View('admin', 'article-delete', 'Supprimer un article', 'Supprimer un article', 'clé 1, clé 2');
			$view->AfficherVue(array('article' => $article,
									 'message' => $message));
		}
	}


	public function SupprimerCuisinier() {
		if( (empty($_POST['oui'])) && (empty($_POST['non'])) ) {
			$manager = new ms\ArticleManager();
			$cuisinier = $manager->ReadCuisinier($_GET['idCuisinier']);
			
			$view = new classe\View('admin', 'cuisinier-delete', 'Supprimer un cuisinier', 'Supprimer un cuisinier', 'clé 1, clé 2');
			$view->AfficherVue(array('cuisinier' => $cuisinier));
		} elseif(isset($_POST['non'])) {
			$this->AfficherTousLesArticles();
		} elseif(isset($_POST['oui'])) {
			$cuisinier = new ms\Cuisinier();
			$cuisinier->setIdCuisinier($_POST['idCuisinier']);
			
			$manager = new ms\ArticleManager();
			$manager->DeleteCuisinier($cuisinier);
			$message = $manager->getMsgSuccesDeleteArticle("Le cuisinier");
			$view = new classe\View('admin', 'cuisinier-delete', 'Supprimer un cuisinier', 'Supprimer un cuisinier', 'clé 1, clé 2');
			$view->AfficherVue(array('cuisinier' => $cuisinier,
									 'message' => $message));
		}
	}
	public function SupprimerAdmin() {
		if( (empty($_POST['oui'])) && (empty($_POST['non'])) ) {
			$manager = new ms\ArticleManager();
			$admin = $manager->ReadAdmin($_GET['idCuisinier']);
			
			$view = new classe\View('admin', 'admin-delete', 'Supprimer un admin', 'Supprimer un admin', 'clé 1, clé 2');
			$view->AfficherVue(array('admin' => $admin));
		} elseif(isset($_POST['non'])) {
			$this->AfficherTousLesArticles();
		} elseif(isset($_POST['oui'])) {
			$admin = new ms\Admin();
			$admin->setIdAdmin($_POST['idAdmin']);
			
			$manager = new ms\ArticleManager();
			$manager->DeleteAdmin($admin);
			$message = $manager->getMsgSuccesDeleteArticle("L'Admin");
			$view = new classe\View('admin', 'admin-delete', 'Supprimer un admin', 'Supprimer un admin', 'clé 1, clé 2');
			$view->AfficherVue(array('admin' => $admin,
									 'message' => $message));
		}
	}
/*************** SUPPRESSION D'UN ARTICLE ***************/
/********************************************************/


	public function AfficherMenuCreation() {
		$view = new classe\View('admin', 'admin-create', 'Création element', 'Création element', 'Création element, Création element');
		$view->AfficherVue();
	}

	public function seDeconnecter() {
		$view = new classe\View('admin', 'deconnexion', 'Se déconnecter', 'Déconnexion de la zone admin', 'clé déconnecter 1, clé déconnecter 2');
		$view->AfficherVue();
	}
	
}