<h1>Exercice 3</h1>

<p>Créer une classe Personne (nom, prénom et date de naissance). <br> 
Instancier 2 personnes et afficher leurs informations : nom, prénom et âge. <br><br>
$p1 = new Personne("DUPONT", "Michel", "1980-02-19") ; <br>
$p2 = new Personne("DUCHEMIN", "Alice", "1985-01-17") ;
</p>

<h2>Résultat</h2>

<?php

Class Personne {
    private string $_nom;
    private string $_prenom;
    private DateTime $_dateNaissance;

    public function __construct($_nom, $_prenom, $_dateNaissance){
        $this->nom = $_nom;
        $this->prenom = $_prenom;
        $this->dateNaissance = new DateTime ($_dateNaissance);
    }
 

    
    //nom
    public function get_nom()
    {
        return $this->_nom;
    }
 
    public function set_nom($_nom)
    {
        $this->_nom = $_nom;

        return $this;
    }

    

   //prenom
    public function get_prenom()
    {
        return $this->_prenom;
    }

    public function set_prenom($_prenom)
    {
        $this->_prenom = $_prenom;

        return $this;
    }



    //dateNaissance
    
    public function get_dateNaissance()
    {
        return $this->dateNaissance;
    }

 
    public function set_DateNaissance($_dateNaissance)
    {
        $this->dateNaissance = $_dateNaissance;

        return $this;
    }

    //age

    public function afficherAge(){
        $dateCourante = new DateTime("2024-04-24");
        $interval = $this->dateNaissance->diff($dateCourante);
        return $this->prenom." ".$this->nom." a ".$interval->y . "ans. <br>";
    }

}

$p1 = new Personne("DUPONT", "Michel", "1980-02-19");
$p2 = new Personne("DUCHEMIN", "Alice", "1985-01-17");

echo $p1->afficherAge();
echo $p2->afficherAge();
