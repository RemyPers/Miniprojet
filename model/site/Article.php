<?php
namespace model\site;
use PDO;

class Article {
	private $idRecette;
	private $idCuisinier;
	private $titre;
	private $description;
	private $img;
	private $difficulte;
	private $temps;
	private $cout;
	private $nombrePersonnes;
	private $visibilite;
	private $ingredients;
	private $etapes;
	private $date;
	private $jaime;

	public function getJaime() {
		return $this->jaime;
	}

	public function setterJaime($jaime) {
		$this->jaime = $jaime;
	}


	public function getImg() {
		return $this->img;
	}
	public function setImg($img) {
		$this->img = $img;
	}
	public function getTitre() {
		return $this->titre;
	}
	public function getIdRecette() {
		return $this->idRecette;
	}
	public function getDescription() {
		return $this->description;
	}


	public function getDifficulte() {
		return $this->difficulte;
	}
	public function getTemps() {
		return $this->temps;
	}
	public function getCout() {
		return $this->cout;
	}
	public function getNombrePersonnes() {
		return $this->nombrePersonnes;
	}
	public function getVisibilite() {
		return $this->visibilite;
	}
	public function getIdCuisinier() {
		return $this->idCuisinier;
	}
	public function getIngredients() {
		return $this->ingredients;
	}
	public function getEtapes() {
		return $this->etapes;
	}
	public function getDate() {
		return $this->date;
	}

	
	

	public function setIdRecette($idRecette) {
		if($idRecette > 0) {
			$this->idRecette = $idRecette;
		}
	}
	public function setTitre($titre) {
		if(is_string($titre)) {
			$this->titre = $titre;
		}
	}

	public function setDescription($description) {
		if(is_string($description)) {
			$this->description = $description;
		}
	}



	public function setDifficulte($difficulte) {
		if($difficulte > 0) {
			$this->difficulte = $difficulte;
		}
	}
	public function setTemps($temps) {
		if($temps > 0) {
			$this->temps = $temps;
		}
	}

	public function setCout($cout) {
		if($cout > 0) {
			$this->cout = $cout;
		}
	}
	public function setNombrePersonnes($nombrePersonnes) {
		if($nombrePersonnes > 0) {
			$this->nombrePersonnes = $nombrePersonnes;
		}
	}
	public function setVisibilite($visibilite) {
		if($visibilite > 0) {
			$this->visibilite = $visibilite;
		}
	}
	public function setIdCuisinier($idCuisinier) {
		if($idCuisinier > 0) {
			$this->idCuisinier = $idCuisinier;
		}
	}
	public function setIngredients($ingredients) {
		if(is_string($ingredients)) {
			$this->ingredients = $ingredients;
		}
	}
	public function setEtapes($etapes) {
		if(is_string($etapes)) {
			$this->etapes = $etapes;
		}
	}
	public function setDate($date) {
		$this->date = $date;
	}

	public function setJaime() {
		$cnx = $this->Connexion();
		$sql = 'SELECT * FROM remote';
		$rs_SelectJaime = $cnx->prepare($sql);
		$rs_SelectJaime->execute();	

		$ip = $this->getUserIpAddr();

		$insert = true;

		while($data = $rs_SelectJaime->fetch(PDO::FETCH_ASSOC)) {
			
			if($data['adresseIp'] == $ip) {

				$sql = 'DELETE FROM remote
				WHERE adresseIp = :adresseIp';
				$rs_deleteJaime = $cnx->prepare($sql);
				$rs_deleteJaime->bindValue(':adresseIp', $ip, PDO::PARAM_STR);
				$rs_deleteJaime->execute();	
				$insert = false;	
			}
		}

		if($insert == true) {

			$sql = 'INSERT INTO remote
			(adresseIp,idRecette) 
			VALUES (:adresseIp,:idRecette)';

			$cnx = $this->Connexion();
			$rs_createJaime = $cnx->prepare($sql);
			$rs_createJaime->bindValue(':adresseIp', $ip, PDO::PARAM_STR);
			$rs_createJaime->bindValue(':idRecette', $_GET['idRecette'], PDO::PARAM_INT);
			$rs_createJaime->execute();	

		}



	}

	public function getNbJaime() {
		$cnx = $this->Connexion();
		$sql = 'SELECT * FROM remote
				WHERE idRecette = :idRecette';

		$rs_SelectNbJaime = $cnx->prepare($sql);
		$rs_SelectNbJaime->bindValue(':idRecette', $_GET['idRecette'], PDO::PARAM_INT);
		$rs_SelectNbJaime->execute();	

		$compteurLikes = 0;

		$ip = $this->getUserIpAddr();

		$desactive = false;

		while($data = $rs_SelectNbJaime->fetch(PDO::FETCH_ASSOC)) {
			if($data['adresseIp'] == $ip) {

				$this->setterJaime("desactive");
				$desactive = true;
			}
			$compteurLikes = $compteurLikes + 1;
		}

		if($desactive == false) {
			$this->setterJaime("submit");
		}

		return $compteurLikes;

	}


	public function getUserIpAddr() {/* récupérer l'adresse ip
		*/
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) $ip = $_SERVER['HTTP_CLIENT_IP'];
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else $ip = $_SERVER['REMOTE_ADDR'];
		return $ip;
	}

	private function Connexion() {
		$cnx = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=utf8', ''.CNX_LOGIN.'', ''.CNX_PASS.'');
		return $cnx;
	}
}





