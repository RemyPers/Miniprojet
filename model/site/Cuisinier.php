<?php
namespace model\site;

class Cuisinier {

	private $idCuisinier;
	private $nom;
	private $prenom;
	private $img;

    public function getImg() {
		return $this->img;
	}
    public function getNom() {
		return $this->nom;
	}
    public function getPrenom() {
		return $this->prenom;
	}
    public function getIdCuisinier() {
		return $this->idCuisinier;
	}

	public function setImg($img) {
		$this->img = $img;
	}
    public function setNom($nom) {
		$this->nom = $nom;
	}
    public function setPrenom($prenom) {
		$this->prenom = $prenom;
	}
    public function setIdCuisinier($idCuisinier) {
		$this->idCuisinier = $idCuisinier;
	}

}