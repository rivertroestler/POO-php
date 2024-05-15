<?php
class Client{
    private string $nom;
    private string $prenom;
    private bool $statut = true;
    private int $nbReservation;
    private array $reservations = [];

    public function __construct($nom,$prenom)
    {
        $this->nom = strtoupper($nom);
        $this->prenom = $prenom;
    }

    public function getNom(){return $this->nom;}
    public function getPrenom(){return $this->prenom;}
    public function getNbReservation(){return $this->nbReservation;}

    public function setNom($nom){ $this->nom = $nom;}
    public function setPrenom($prenom){ $this->prenom = $prenom;}
    public function setNbReservation($nbReservation){ $this->nbReservation = $nbReservation;}
    public function setStatut($reservation){$this->statut=$reservation;}


    public function toArray($reservation)
    {
        $this->reservations[] = $reservation;

        if (count($this->reservations) > 1) {
            usort($this->reservations, function ($a, $b) {
                return strtotime($a->getReservationDebut()->format('d-m-Y')) - strtotime($b->getReservationDebut()->format('d-m-Y'));
            });
        }
    }

    public function afficherReservation(){
        $result = "<div class='client'><h2>Reservations de $this->prenom $this->nom</h2><div class='client_reservation'>";
        $tot=0;
        if($this->statut){
            $result .= "<p>Aucunes Reservations !</p>";
        }
        else{
            $result .= "<div class='reservation uppercase'>$this->nbReservation Reservations</div>";
            foreach($this->reservations as $val){
                $result .= "<p><b>Hotel : ".$val->getHotel()->getNom()."</b> / Chambre : ".$val->getChambre()->getNum()." (". $val->getChambre()->getNbLit() ." lits - ".$val->getChambre()->getPrix()."€ - Wifi : ".$val->getChambre()->Wifi().") du ".$val->getReservationDebut()->format('d-m-Y')." au ".$val->getReservationFin()->format('d-m-Y')."</p>";
                $tot += $val->getChambre()->getPrix();
            }
        }
        $result .= "Total : $tot €</div></div>";
        return $result; 
    }

    public function __toString()
    {
        return "<h2>Infos clients : $this->prenom $this->nom</h2>
        <p>Reservations : $this->nbReservation</p>";
    }
}