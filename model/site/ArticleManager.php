<?php
namespace model\site;
use PDO;
class ArticleManager {

/*************** CREATION D'UN ARTICLE ***************/		
	public function CreateArticle(Article $article) {
		$cnx = $this->Connexion();
		$sql = 'INSERT INTO recettes
			   (titre,img,description,ingredients,etapes,difficulte,cout,temps,nombrePersonnes,visibilite,idCuisinier) 
			   VALUES (:titre,:img,:description,:ingredients,:etapes,:difficulte,:cout,:temps,:nombrePersonnes,:visibilite,:idCuisinier)';
		$rs_createArticle = $cnx->prepare($sql);
		$rs_createArticle->bindValue(':titre', $article->getTitre(), PDO::PARAM_STR);
		$rs_createArticle->bindValue(':img', $article->getImg(), PDO::PARAM_STR);
		$rs_createArticle->bindValue(':description', $article->getDescription(), PDO::PARAM_STR);
		$rs_createArticle->bindValue(':ingredients', $article->getIngredients(), PDO::PARAM_STR);
		$rs_createArticle->bindValue(':etapes', $article->getEtapes(), PDO::PARAM_STR);
		$rs_createArticle->bindValue(':difficulte', $article->getDifficulte(), PDO::PARAM_INT);
		$rs_createArticle->bindValue(':cout', $article->getCout(), PDO::PARAM_INT);
		$rs_createArticle->bindValue(':temps', $article->getTemps(), PDO::PARAM_INT);
		$rs_createArticle->bindValue(':nombrePersonnes', $article->getNombrePersonnes(), PDO::PARAM_INT);
		$rs_createArticle->bindValue(':visibilite', $article->getVisibilite(), PDO::PARAM_INT);
		$rs_createArticle->bindValue(':idCuisinier', $article->getIdCuisinier(), PDO::PARAM_INT);

		$rs_createArticle->execute();
	}

	public function CreateCuisinier(Cuisinier $cuisinier) {
		$cnx = $this->Connexion();
		$sql = 'INSERT INTO cuisiniers
			   (nom,prenom,img) 
			   VALUES (:nom,:prenom,:img)';
		$rs_createCuisinier = $cnx->prepare($sql);
		$rs_createCuisinier->bindValue(':nom', $cuisinier->getNom(), PDO::PARAM_STR);
		$rs_createCuisinier->bindValue(':prenom', $cuisinier->getPrenom(), PDO::PARAM_STR);
		$rs_createCuisinier->bindValue(':img', $cuisinier->getImg(), PDO::PARAM_STR);


		$rs_createCuisinier->execute();
	}
	public function CreateAdmin(Admin $admin) {
		$cnx = $this->Connexion();
		$sql = 'INSERT INTO membres
			   (pseudo,password,supAdmin) 
			   VALUES (:pseudo,:password,:supAdmin)';
		$rs_createAdmin = $cnx->prepare($sql);
		$rs_createAdmin->bindValue(':pseudo', $admin->getPseudo(), PDO::PARAM_STR);
		$rs_createAdmin->bindValue(':password', $admin->getPassword(), PDO::PARAM_INT);
		$rs_createAdmin->bindValue(':supAdmin', $admin->getSupAdmin(), PDO::PARAM_INT);


		$rs_createAdmin->execute();
	}
/*************** CREATION D'UN ARTICLE ***************/	

	public function getMsgCreateArticle() {
		$msg = '<p><i>* Tous les champs sont obligatoires</i></p>';
		return $msg;
	}

	public function getMsgErreurCreateArticle() {
		$msg = '<p class="red">Merci de remplir tous les champs</p>';
		return $msg;
	}

	public function getMsgSuccesCreateArticle() {
		$msg = '<p class="green">Félicitations : Le nouvel article a bien été inséré !</p>';
		return $msg;
	}

/*****************************************************/


/*************** AFFICHER L'ARTICLE DEMANDE ***************/	
	public function ReadArticle($idRecette, $idCuisinier = "") {
		$cnx = $this->Connexion();
		$sql = 'SELECT * FROM recettes
				WHERE idRecette = :idRecette';
		$rs_readArticle = $cnx->prepare($sql);	
		$rs_readArticle->bindValue(':idRecette', $idRecette, PDO::PARAM_INT);
		$rs_readArticle->execute();
		$data = $rs_readArticle->fetch(PDO::FETCH_OBJ);
		
		$article = new Article();
		$article->setTitre($data->titre);
		$article->setImg($data->img);

		$article->setDifficulte($data->difficulte);
		$article->setTemps($data->temps);

		$article->setCout($data->cout);
		$article->setDescription($data->description);
		$article->setIngredients($data->ingredients);
		$article->setEtapes($data->etapes);
		$article->setDate($data->date);
		$article->setNombrePersonnes($data->nombrePersonnes);
		$article->setVisibilite($data->visibilite);
		$article->setIdCuisinier($data->idCuisinier);






		$article->setIdRecette($data->idRecette);

		
		return $article;
	}
/*************** AFFICHER L'ARTICLE DEMANDE ***************/
/**********************************************************/

/*************** AFFICHER LE CUISINIER DEMANDE ***************/	
public function ReadCuisinier($idCuisinier) {
	$cnx = $this->Connexion();
	$sql = 'SELECT * FROM cuisiniers
			WHERE idCuisinier = :idCuisinier';
	$rs_readCuisinier = $cnx->prepare($sql);	
	$rs_readCuisinier->bindValue(':idCuisinier', $idCuisinier, PDO::PARAM_INT);
	$rs_readCuisinier->execute();
	$data = $rs_readCuisinier->fetch(PDO::FETCH_ASSOC);
	
	$cuisinier = new Cuisinier();

	$cuisinier->setNom($data['nom']);
	$cuisinier->setPrenom($data['prenom']);
	$cuisinier->setImg($data['img']);
	$cuisinier->setIdCuisinier($data['idCuisinier']);
	
	return $cuisinier;
}
public function ReadAdmin($idAdmin) {
	$cnx = $this->Connexion();
	$sql = 'SELECT * FROM membres
			WHERE idAdmin = :idAdmin';
	$rs_readAdmin = $cnx->prepare($sql);	
	$rs_readAdmin->bindValue(':idAdmin', $idAdmin, PDO::PARAM_INT);
	$rs_readAdmin->execute();
	$data = $rs_readAdmin->fetch(PDO::FETCH_ASSOC);
	
	$admin = new Admin();

	$admin->setPseudo($data['pseudo']);
	$admin->setPassword($data['password']);
	$admin->setSupAdmin($data['supAdmin']);
	$admin->setIdAdmin($data['idAdmin']);
	
	return $admin;
}
/*************** AFFICHER LE CUISINIER DEMANDE ***************/
/**********************************************************/



/*************** AFFICHER LES RECETTES DU CUISINIER DEMANDE ***************/	
public function ReadCuisinierRecettes($idCuisinier) {
	$cnx = $this->Connexion();
	$sql = 'SELECT * FROM recettes
			WHERE idCuisinier = :idCuisinier';
	$rs_readCuisinierRecettes = $cnx->prepare($sql);	
	$rs_readCuisinierRecettes->bindValue(':idCuisinier', $idCuisinier, PDO::PARAM_INT);
	$rs_readCuisinierRecettes->execute();

	while($data = $rs_readCuisinierRecettes->fetch(PDO::FETCH_OBJ)) {
		
		$cuisinierRecette = new Article();
		$cuisinierRecette->setTitre($data->titre);
		$cuisinierRecette->setImg($data->img);
		$cuisinierRecette->setDifficulte($data->difficulte);
		$cuisinierRecette->setTemps($data->temps);
		$cuisinierRecette->setCout($data->cout);
		$cuisinierRecette->setDescription($data->description);
		$cuisinierRecette->setIngredients($data->ingredients);
		$cuisinierRecette->setEtapes($data->etapes);
		$cuisinierRecette->setDate($data->date);
		$cuisinierRecette->setNombrePersonnes($data->nombrePersonnes);
		$cuisinierRecette->setVisibilite($data->visibilite);
		$cuisinierRecette->setIdCuisinier($data->idCuisinier);
		$cuisinierRecette->setIdRecette($data->idRecette);

		$cuisinierRecettes[] = $cuisinierRecette;
		
	}

	
	return $cuisinierRecettes;
}
/*************** AFFICHER LES RECETTES DU CUISINIER DEMANDE ***************/	
/**********************************************************/


/*************** AFFICHER TOUS LES ARTICLES ***************/	
	public function ReadAllArticle() {
		$cnx = $this->Connexion();
		$rs_readAllArticle = $cnx->prepare('SELECT * FROM recettes');
		$rs_readAllArticle->execute();
		//$posts = $rs_readAllArticle->fetchAll();


		
		while($data = $rs_readAllArticle->fetch(PDO::FETCH_ASSOC)) {
			$article = new Article();

			//$article->setTitre($data->titre);
			//$article->setIdRecette($data->idRecette);
			//$article->setImg($data->img);
			$article->setIdRecette($data['idRecette']);
			$article->setIdCuisinier($data['idCuisinier']);
			$article->setTitre($data['titre']);


			$article->setImg($data['img']);


			$articles[] = $article;
		}
		return $articles;
	}

	public function ReadAllCuisiniers() {
		$cnx = $this->Connexion();
		$rs_readAllCuisinier = $cnx->prepare('SELECT * FROM cuisiniers');
		$rs_readAllCuisinier->execute();
		//$posts = $rs_readAllArticle->fetchAll();

		while($data = $rs_readAllCuisinier->fetch(PDO::FETCH_ASSOC)) {
			$cuisinier = new Cuisinier();

			//$article->setTitre($data->titre);
			//$article->setIdRecette($data->idRecette);
			//$article->setImg($data->img);
			$cuisinier->setNom($data['nom']);
			$cuisinier->setPrenom($data['prenom']);
			$cuisinier->setImg($data['img']);
			$cuisinier->setIdCuisinier($data['idCuisinier']);

	
			$cuisiniers[] = $cuisinier;
		}
		return $cuisiniers;
	}

	
/*************** AFFICHER TOUS LES ARTICLES ***************/
/**********************************************************/


/*************** MODIFICATION D'UN ARTICLE ***************/	

//$sql = 'UPDATE recettes SET titre = :titre, img = :img, description = :description, ingredients = :ingredients, etapes = :etapes, difficulte = :difficulte, cout = :cout, temps = :temps, nombrePersonnes = :nombrePersonnes, visibilite = :visibilite, idCuisinier = :idCuisinier


	public function UpdateArticle(Article $article) {
		$cnx = $this->Connexion();
		$sql = 'UPDATE recettes SET titre = :titre, img = :img, description = :description, ingredients = :ingredients, etapes = :etapes, difficulte = :difficulte, cout = :cout, temps = :temps, nombrePersonnes = :nombrePersonnes, visibilite = :visibilite, idCuisinier = :idCuisinier
			    WHERE idRecette = :idRecette';
		$rs_updateArticle = $cnx->prepare($sql);
		$rs_updateArticle->bindValue(':idRecette', $article->getIdRecette(), PDO::PARAM_INT);
		$rs_updateArticle->bindValue(':titre', $article->getTitre(), PDO::PARAM_STR);
		$rs_updateArticle->bindValue(':img', $article->getImg(), PDO::PARAM_STR);
		$rs_updateArticle->bindValue(':description', $article->getDescription(), PDO::PARAM_STR);
		$rs_updateArticle->bindValue(':ingredients', $article->getIngredients(), PDO::PARAM_STR);
		$rs_updateArticle->bindValue(':etapes', $article->getEtapes(), PDO::PARAM_STR);
		$rs_updateArticle->bindValue(':difficulte', $article->getDifficulte(), PDO::PARAM_INT);
		$rs_updateArticle->bindValue(':cout', $article->getCout(), PDO::PARAM_INT);
		$rs_updateArticle->bindValue(':temps', $article->getTemps(), PDO::PARAM_INT);
		$rs_updateArticle->bindValue(':nombrePersonnes', $article->getNombrePersonnes(), PDO::PARAM_INT);
		$rs_updateArticle->bindValue(':visibilite', $article->getVisibilite(), PDO::PARAM_INT);
		$rs_updateArticle->bindValue(':idCuisinier', $article->getIdCuisinier(), PDO::PARAM_INT);
		
		$rs_updateArticle->execute();
	}


	public function UpdateCuisinier(Cuisinier $cuisinier) {
		$cnx = $this->Connexion();
		$sql = 'UPDATE cuisiniers SET nom = :nom, prenom = :prenom, img = :img
			    WHERE idCuisinier = :idCuisinier';
		$rs_updateCuisinier = $cnx->prepare($sql);
		$rs_updateCuisinier->bindValue(':idCuisinier', $cuisinier->getIdCuisinier(), PDO::PARAM_INT);
		$rs_updateCuisinier->bindValue(':nom', $cuisinier->getNom(), PDO::PARAM_INT);
		$rs_updateCuisinier->bindValue(':prenom', $cuisinier->getPrenom(), PDO::PARAM_STR);
		$rs_updateCuisinier->bindValue(':img', $cuisinier->getImg(), PDO::PARAM_STR);

		$rs_updateCuisinier->execute();
	}
	public function UpdateAdmin(Admin $admin) {
		$cnx = $this->Connexion();
		$sql = 'UPDATE membres SET pseudo = :pseudo, password = :password, supAdmin = :supAdmin
			    WHERE idAdmin = :idAdmin';
		$rs_updateAdmin = $cnx->prepare($sql);
		$rs_updateAdmin->bindValue(':password', $admin->getPassword(), PDO::PARAM_INT);
		$rs_updateAdmin->bindValue(':pseudo', $admin->getPseudo(), PDO::PARAM_STR);
		$rs_updateAdmin->bindValue(':supAdmin', $admin->getSupAdmin(), PDO::PARAM_INT);
		$rs_updateAdmin->bindValue(':idAdmin', $admin->getIdAdmin(), PDO::PARAM_INT);

		$rs_updateAdmin->execute();
	}
/*************** MODIFICATION D'UN ARTICLE ***************/	

	public function getMsgSuccesUpdateArticle() {
		$msg = '<p class="green">Félicitations : Le nouvel article a bien été modifié !</p>';
		return $msg;
	}

/*********************************************************/	


/*************** SUPPRESSION D'UN ARTICLE ***************/	
	public function DeleteArticle(Article $article) {
		$cnx = $this->Connexion();
		$sql = 'DELETE FROM recettes
				WHERE idRecette = :idRecette';
		$rs_deleteArticle = $cnx->prepare($sql);
		$rs_deleteArticle->bindValue(':idRecette', $article->getIdRecette(), PDO::PARAM_INT);
		$rs_deleteArticle->execute();		
	}
	public function DeleteCuisinier(Cuisinier $cuisinier) {
		$cnx = $this->Connexion();
		$sql = 'DELETE FROM cuisiniers
				WHERE idCuisinier = :idCuisinier';
		$rs_deleteCuisinier = $cnx->prepare($sql);
		$rs_deleteCuisinier->bindValue(':idCuisinier', $cuisinier->getIdCuisinier(), PDO::PARAM_INT);
		$rs_deleteCuisinier->execute();		
	}
	public function DeleteAdmin(Admin $admin) {
		$cnx = $this->Connexion();
		$sql = 'DELETE FROM membres
				WHERE idAdmin = :idAdmin';
		$rs_deleteAdmin = $cnx->prepare($sql);
		$rs_deleteAdmin->bindValue(':idAdmin', $admin->getIdAdmin(), PDO::PARAM_INT);
		$rs_deleteAdmin->execute();		
	}
/*************** SUPPRESSION D'UN ARTICLE ***************/
	public function getMsgSuccesDeleteArticle($element = "L\' article") {
		$msg = '<p class="green">Félicitations : '.$element.' a bien été supprimé !</p>';
		return $msg;
	}
/********************************************************/


/*************** CONNEXION A LA BDD ***************/	
	private function Connexion() {
		$cnx = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=utf8', ''.CNX_LOGIN.'', ''.CNX_PASS.'');
		return $cnx;
	}
/*************** CONNEXION A LA BDD ***************/
/**************************************************/	


}

