<?php
class Chambre
{
    private int $num;
    private int $nbLit;
    private int $prix;
    private Hotel $hotel;
    private bool $wifi = false;
    private bool $etat = true;

    public function __construct($num, $nbLit, $prix,$hotel)
    {        
            $this->num = $num;
            $this->nbLit = $nbLit;
            $this->prix = $prix;
            $this->hotel = $hotel;

            if ($this->prix >= 300) {
                $this->wifi = true;
            }
            
            $this->hotel->toHotel($this);
    }

    // Getter
    public function getNum()
    {
        return $this->num;
    }
    public function getNbLit()
    {
        return $this->nbLit;
    }
    public function getPrix()
    {
        return $this->prix;
    }
    public function getHotel()
    {
        return $this->hotel;
    }
    public function getEtat()
    {
        return $this->etat;
    }
    public function getWifi()
    {
        return $this->wifi;
    }
    
    // Setter
    public function setNum($num)
    {
        $this->num = $num;
    }
    public function setNbLit($nbLit)
    {
        $this->nbLit = $nbLit;
    }
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    public function setWifi($wifi)
    {
        $this->wifi = $wifi;
    }
    public function setEtat($dispo)
    {
        $this->etat = $dispo;
    }

    public function Wifi() : string
    {
        $wifi = "";
        if($this->wifi)
            $wifi = "oui";
        else
            $wifi = "non";
        return $wifi;
    }
    
    public function Etat() : string
    {
        $etat = "";
        if($this->etat)
            $etat = "Disponible";
        else
            $etat = "Réservée";
        return $etat;
    }
}