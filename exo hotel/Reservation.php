<?php
class Reservation{
    private Hotel $hotel;
    private Chambre $chambre;
    private Client $client;
    private DateTime $reservationDebut;
    private DateTime $reservationFin;
    private int $total=0;
    
    public function __construct($hotel,$chambre,$client,$reservationDebut,$reservationFin)
    {
        if($chambre->getEtat()){
            $this->hotel = $hotel;
            $this->chambre = $chambre;
            $this->client = $client;
            $this->reservationDebut = date_create($reservationDebut);
            $this->reservationFin = date_create($reservationFin);
        
            $this->chambre->setEtat(false);
            $this->hotel->setStatut(false);
            $this->client->setStatut(false);
            $this->hotel->setNbReservation($this->total+1);
            $this->client->setNbReservation($this->total+1);
            $this->hotel->setNbChambreDispo();
            $this->hotel->toArray($this);
            $this->client->toArray($this);
        }
        else
            echo "<h2>Echec reservation chambre ". $chambre->getNum() ." par " . $client->getNom() . $client->getPrenom() . "</h2><p>Motif : La chambre est deja reservee.</p>"; 
    }

    public function getHotel(){return $this->hotel;}
    public function getChambre(){return $this->chambre;}
    public function getClient(){return $this->client;}
    public function getReservationDebut(){return $this->reservationDebut;}
    public function getReservationFin(){return $this->reservationFin;}

    public function setReservationDebut($reservationDebut){ $this->reservationDebut = $reservationDebut;}
    public function setReservationFin($reservationFin){ $this->reservationFin = $reservationFin;}
}