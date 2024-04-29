<?php

class Auteur{

    private string $_prenom;
    private string $_nom;
    private array $_livres;

    public function __construct(string $_prenom, string $_nom){
        $this->_prenom = $_prenom;
        $this->_nom = $_nom;
        $this->_livres = [];
    }

    
    public function getPrenom() : string
    {
        return $this->_prenom;
    }


    public function setPrenom(string $_prenom)
    {
        $this->_prenom = $_prenom;

        return $this;
    }
    

    public function getNom() : string
    {
        return $this->_nom;
    }

    public function setNom(string $_nom)
    {
        $this->_nom = $_nom;

        return $this;
    }

// --------------------fonctions----------------

    public function __toString() {
        return $this->_prenom." ".$this->_nom;
    }

    public function ajouterLivre(Livre $livre) {
        $this->_livres[] = $livre;
        // array_push($this->_livres, $livre);
    }

    public function afficherBibliographie(){
        $result =  "<h1>Livres de $this</h1>";
        foreach ($this->_livres as $livre) {
            $result .= $livre->afficherInfos()."<br>";
        }
        return $result;
    }
}