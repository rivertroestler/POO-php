<h1>Exercice 4</h1>

<p>Créer une classe Voiture possédant les propriétés suivantes : marque, modèle, nbPortes et 
vitesseActuelle ainsi que les méthodes demarrer( ), accelerer( ) et stopper( ) en plus 
des accesseurs (get) et mutateurs (set) traditionnels. La vitesse initiale de chaque véhicule 
instancié est de 0. Une méthode personnalisée displayInfos() pourra afficher toutes les informations 
d’un véhicule. <br> 
v1 ➔ "Peugeot","408",5 <br>
v2 ➔ "Citroën","C4",3 <br> <br>
Coder l’ensemble des méthodes, accesseurs et mutateurs de la classe tout en réalisant des jeux de 
tests pour vérifier la cohérence de la classe Voiture. Vous devez afficher les tests et les éléments 
suivants :


</p>

<h2>Résultat</h2>

<?php

class Voiture {

    private string $_marque;
    private string $_modele;
    private int $_nbPortes;
    private int $_vitesseActuelle = 0;
    private bool $_statut = false;
    
    public function __construct(string $_marque, string $_modele, int $_nbPortes) {

        $this->_marque = $_marque;
        $this->_modele = $_modele;
        $this->_nbPortes = $_nbPortes;
    }
    

 //_marque 
    public function get_marque()
    {
        return $this->_marque;
    }
 
    public function set_marque($_marque)
    {
        $this->_marque = $_marque;

        return $this;
    }

    //_modele
    public function get__modele()
    {
        return $this->_modele;
    }

    public function set__modele($_modele)
    {
        $this->_modele = $_modele;

        return $this;
    }


    //_nbPortes
    public function get_nbPortes()
    {
        return $this->_nbPortes;
    }

    public function set_nbPortes($_nbPortes)
    {
        $this->_nbPortes = $_nbPortes;

        return $this;
    }

   
    //_vitesseActuelle
    public function get_vitesseActuelle()
    {
        return $this->_vitesseActuelle;
    }

    public function set_vitesseActuelle($_vitesseActuelle)
    {
        $this->_vitesseActuelle = $_vitesseActuelle;

        return $this;
    }


    //méthode démarrer(_vitesseActuelle)

    public function demarrer() {
        if($this->_statut == true) {
            return "Le véhicule ".$this->_marque." est démarré <br>Sa vitesse actuelle est de: ".$this->_vitesseActuelle." km/h<br>";
        }
        else {
            $this->_statut = true;
            return "Le véhicule ".$this->_marque." ".$this->_modele." démarre<br>";
        }
    }


    //methode accélérer($_vitesseActuelle)

    public function accelerer(int $_vitesseActuelle) {

        if($this->_statut == false) {
            return "Le véhicule ".$this->_marque." ".$this->_modele." veut accélérer de ".$_vitesseActuelle."<br>Pour accélérer, il faut démarrer le véhicule ".$this->_marque." ".$this->_modele."<br>";
        }
        else {
            $this->_vitesseActuelle += $_vitesseActuelle;
            return "Le véhicule ".$this->_marque." ".$this->_modele." accélère de ".$this->_vitesseActuelle."km/h<br>";
        }
    }

    //méthode ralentir

    public function ralentir(int $_vitesseActuelle) {
        if ($this->_vitesseActuelle > $_vitesseActuelle) {
            $this->_vitesseActuelle -= $_vitesseActuelle;
            return "Le véhicule ".$this->_marque." ".$this->_modele." ralentit de ".$_vitesseActuelle."km/h<br>";
        }
        elseif ($this->_statut == false) {
            return "Le véhicule ".$this->_marque." ".$this->_modele." est déjà à l'arrêt <br>";
        }
        else {
            $this->_vitesseActuelle = 0;
            return "Le véhicule ".$this->_marque." ".$this->_modele." est à l'arrêt <br>";
        }
    }

    //méthode stopper(_vitesseActuelle)

    public function stopper() {
        if($this->_statut == false ) {
            return "Le véhicule ".$this->_marque." est à l'arrêt <br>Sa vitesse actuelle est de: ".$this->_vitesseActuelle." km/h<br>";
        }
        else {
            $this->_statut = false;
            $this->_vitesseActuelle = 0;
            return "Le véhicule ".$this->_marque." ".$this->_modele." est stoppé<br>";
        }
    }

    //méthode displayInfos()

    public function displayInfos($infos): string {
        switch ($infos) {
            case "nom":
                return "Nom et modèle du véhicule: ".$this->_marque." ".$this->_modele."<br> Nombre de portes: ".$this->_nbPortes."<br>";
                break;
            case "vitesse":
                return "La vitesse du véhicule ".$this->_marque." ".$this->_modele." est de ".$this->_vitesseActuelle." km/h<br>";
                break;
        }
    }


    public function __toString() {
        return $this->_marque." ".$this->_modele;
    }
}
//**********Objets classe Voiture()**********/
$v1 = new Voiture("Peugeot","408",5);
$v2 = new Voiture("Citroën","C4",3);


//**********Tests**********//
//bloc 1

echo $v1->demarrer();
echo $v1->accelerer(50);
echo $v2->demarrer();
echo $v2->stopper();
echo $v2->accelerer(20);
echo $v1->displayInfos("vitesse");
echo $v2->displayInfos("vitesse");

//bloc 2
echo $v1->displayInfos("nom");
echo $v1->demarrer();

//bloc 3
echo $v2->displayInfos("nom");
echo $v2->stopper();

// ralentir() tests
echo "<br><br><br><br>";
echo $v1->ralentir(10);
echo $v2->ralentir(10);
echo $v1->ralentir(60);
