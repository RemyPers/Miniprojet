<?php
namespace model\admin;
use PDO;

class MembreManager {

	public function ReadMembre($pseudo, $password) {
		$cnx = $this->Connexion();
		$sql = 'SELECT * FROM membres
				WHERE pseudo = :pseudo AND password = :password';
		$req = $cnx->prepare($sql);
		$req->execute(
					array('pseudo'   => $pseudo,
						  'password' => $password)
					 );
		$data = $req->fetch(PDO::FETCH_ASSOC);
		
		$membre = new Membre();
		$membre->setPseudo($data['pseudo']);
		$membre->setPassword($data['password']);			 
		$membre->setSupAdmin($data['supAdmin']);			 	 
		$membre->setIdAdmin($data['idAdmin']);			 	 
		
		return $membre;			 
	}

	public function ReadAllMembres() {
		$cnx = $this->Connexion();
		$sql = 'SELECT * FROM membres
				WHERE supAdmin = 0';
		$req = $cnx->prepare($sql);
		$req->execute();

		$membres = [];

		while($data = $req->fetch(PDO::FETCH_ASSOC)) {
			$membre = new Membre();
			$membre->setPseudo($data['pseudo']);
			$membre->setPassword($data['password']);			 
			$membre->setSupAdmin($data['supAdmin']);
			$membre->setIdAdmin($data['idAdmin']);					 	 
			
			$membres[] = $membre;
		}
		
		return $membres;			 
	}


	
	public function getMsg() {
		$msg = '<p>Veuillez entrer vos codes d\'accès</p>';
		return $msg;
	}
	
	public function getMsgErreur() {
		$msg = '<p class="red">Les codes entrés ne sont pas corrects !</p>';
		return $msg;
	}

	private function Connexion() {
		$cnx = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=utf8', ''.CNX_LOGIN.'', ''.CNX_PASS.'');
		return $cnx;
	}	
}