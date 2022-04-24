<?php
namespace classe;

class View {
	private $dossier;
	private $fichier;
	private $titre;
	private $description;

	private $idCuisinier;
	private $img;
	private $difficulte;
	private $temps;
	private $cout;
	private $nombrePersonnes;
	private $visibilite;
	private $ingredients;
	private $etapes;
	private $date;
	
	
	public function __construct($dossier, $fichier, $titre, $description, $idCuisinier = "", $img = "", $difficulte = "", $temps = "", $cout = "", $nombrePersonnes = "", $visibilite = "", $ingredients = "", $etapes = "", $date = "") {
		$this->dossier     = $dossier;
		$this->fichier     = $fichier;
		$this->titre       = $titre;
		$this->description = $description;

		$this->idCuisinier = $idCuisinier;
		$this->img = $img;
		$this->difficulte = $difficulte;
		$this->temps = $temps;
		$this->cout = $cout;
		$this->nombrePersonnes = $nombrePersonnes;
		$this->visibilite = $visibilite;
		$this->ingredients = $ingredients;
		$this->etapes = $etapes;
		$this->date = $date;

	}
	
	public function AfficherVue($tableau = array()) {
		
		extract($tableau);
		
		$dossier     = $this->dossier;
		$fichier     = $this->fichier;
		$titre       = $this->titre;
		$description = $this->description;
		
		ob_start();
		include(VIEW.'/'.$dossier.'/'.$fichier.'.php');
		$contenu = ob_get_clean();
		
		include(VIEW.'/_gabarit.php');
	}
}