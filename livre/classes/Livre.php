<?php

class Livre {

    private string $_titre;
    private int $_anneeDeParution;
    private int $_nbPages;
    private int $_prix;
    private Auteur $_auteur;
    private array $_livres;

    public function __construct(string $_titre, int $_anneeDeParution, int $_nbPages, int $_prix, Auteur $_auteur){
        $this->_titre = $_titre;
        $this->_nbPages = $_nbPages;
        $this->_anneeDeParution = $_anneeDeParution;
        $this->_prix = $_prix;
        $this->_auteur = $_auteur;
        $this->_auteur->ajouterLivre($this);
        $this->_livres = [];
    }

    public function getTitre() : string
    {
        return $this->_titre;
    }

    public function setTitre(string $_titre)
    {
        $this->_titre = $_titre;

        return $this;
    }


    public function get_AnneeDeParution() : int
    {
        return $this->_anneeDeParution;
    }


    public function set_AnneeDeParution(int $_anneeDeParution)
    {
        $this->_anneeDeParution = $_anneeDeParution;

        return $this;
    }

    public function get_NbPages() : int
    {
        return $this->_nbPages;
    }


    public function set_NbPages(int $_nbPages)
    {
        $this->_nbPages = $_nbPages;

        return $this;
    }



    public function get_Prix() : int
    {
        return $this->_prix;
    }

    public function set_Prix(int $_prix)
    {
        $this->_prix = $_prix;

        return $this;
    }

    public function get_Auteur() : Auteur
    {
        return $this->_auteur;
    }

    public function set_Auteur(Auteur $_auteur)
    {
        $this->_auteur = $_auteur;

        return $this;
    }
    public function ajouter_Auteur(Auteur $_auteur) {
        $this->_livres[] = $_auteur;
        return $this;
    }
    // ------------------fonctions--------------------------
 
    public function __toString() {
        return $this->_titre." ".$this->_anneeDeParution;
    }

    public function afficherInfos(){
        return $this->_titre." (".$this->_anneeDeParution.") ".$this->_nbPages." pages /".$this->_prix." € <br>";
    }

}