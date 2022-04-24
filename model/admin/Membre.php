<?php
namespace model\admin;

class Membre {
	private $idAdmin;
	private $pseudo;
	private $password;
	private $supAdmin;
	
	public function getIdAdmin() {
		return $this->idAdmin;
	}
	public function getPseudo() {
		return $this->pseudo;
	}
	public function getPassword() {
		return $this->password;
	}
	public function getSupAdmin() {
		return $this->supAdmin;
	}
	
	public function setIdAdmin($idAdmin) {
		if($idAdmin > 0) {
			$this->idAdmin = $idAdmin;
		}
	}
	public function setPseudo($pseudo) {
		if(is_string($pseudo)) {
			$this->pseudo = $pseudo;
		}
	}
	public function setPassword($password) {
		if(is_string($password)) {
			$this->password = $password;
		}
	}
	public function setSupAdmin($supAdmin) {
		$this->supAdmin = $supAdmin;
	}
}