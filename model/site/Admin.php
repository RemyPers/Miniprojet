<?php
namespace model\site;

class Admin {

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
		$this->idAdmin = $idAdmin;
	}
    public function setPseudo($pseudo) {
		$this->pseudo = $pseudo;
	}
    public function setPassword($password) {
		$this->password = $password;
	}
    public function setSupAdmin($supAdmin) {
		$this->supAdmin = $supAdmin;
	}

}