<h1>Exercice 15</h1>

<p>Créer une classe Voiture possédant 2 propriétés (marque et modèle) ainsi qu’une classe VoitureElec 
qui hérite (extends) de la classe Voiture et qui a une propriété supplémentaire (autonomie)<br> 
Instancier une voiture « classique » et une voiture « électrique » ayant les caractéristiques 
suivantes :<br>
Peugeot 408 : $v1 = new Voiture("Peugeot","408");<br>
BMW i3 150 : $ve1 = new VoitureElec("BMW","I3",100);
<br>
Votre programme de test devra afficher les informations des 2 voitures de la façon suivante : <br><br>
echo $v1->getInfos()."<br/>"; <br>
echo $ve1->getInfos()."<br/>";<br>

</p>

<h2>Résultat</h2>

<?php
//Classe mère de VoitureElec

class Voiture{

    protected string $_marque;
    protected string $_modele;

    public function __construct(string $_marque, string $_modele) {

        $this->_marque = $_marque;
        $this->_modele = $_modele;
    }
    
    //_marque 
    public function get_marque(): string
    {
        return $this->_marque;
    }

    public function set_marque(string $_marque)
    {
        $this->_marque = $_marque;

        return $this;
    }

    //_modele
    public function get__modele(): string
    {
        return $this->_modele;
    }

    public function set__modele(string $_modele)
    {
        $this->_modele = $_modele;

        return $this;
    }

/*---------méthodes publiques-Classe Voiture--------*/ 
public function getInfos(){
    return $this->_marque." ".$this->_modele;
}



public function __toString() {
    return $this->_marque." ".$this->_modele;
}
}



//Classe fille de Voiture
Class VoitureElec extends Voiture{

    private int $_autonomie;

    public function __construct(string $_marque, string $_modele, int $_autonomie)
    {
        parent::__construct($_marque, $_modele);
        $this->_autonomie = $_autonomie;
    }

    public function get_autonomie(): int
    {
        return $this->_autonomie;
    }

    public function set_autonomie(int $_autonomie)
    {
        $this->_autonomie = $_autonomie;

        return $this;
    }

    public function getInfos(){
        return parent::__toString()." ".$this->_autonomie;
    }
}


/*---------variables---------*/ 

$v1 = new Voiture("Peugeot","408");
$ve1 = new VoitureElec("BMW","I3",100);


/*---------test---------*/ 
echo $v1->getInfos()."<br/>";
echo $ve1->getInfos()."<br/>";