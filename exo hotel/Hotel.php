<?php
class Hotel
{
    private string $nom;
    private string $ville;
    private string $adresse;
    private int $nbChambreTot;
    private int $nbReservation = 0;
    private int $nbChambreDispo;
    private bool $noReservation = true;
    private array $reservations = [];
    private array $chambres = [];

    public function __construct($nom, $ville, $adresse, $nbChambreTot)
    {
        if(! is_string($ville)){
            throw new Exception('$ville doit etre un nom de ville');
        }
        $this->nom = $nom;
        $this->ville = $ville;
        $this->adresse = $adresse;
        $this->nbChambreTot = $nbChambreTot;
        $this->nbChambreDispo = $nbChambreTot;
    }

    // Getter
    public function getNom()
    {
        return $this->nom;
    }
    public function getVille()
    {
        return $this->ville;
    }
    public function getAdresse()
    {
        return $this->adresse;
    }
    public function getNbChambreTot()
    {
        return $this->nbChambreTot;
    }
    public function getnbReservation()
    {
        return $this->nbReservation;
    }
    public function getNbChambreDispo()
    {
        return $this->nbChambreDispo;
    }

    // Setter
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }
    public function setNbChambreTot($nbChambreTot)
    {
        $this->nbChambreTot = $nbChambreTot;
    }
    public function setNbReservation($nbReservation)
    {
        $this->nbReservation += $nbReservation;
    }
    public function setNbChambreDispo()
    {
        $this->nbChambreDispo = $this->nbChambreTot - $this->nbReservation;
    }
    public function setStatut($reservation)
    {
        $this->noReservation = $reservation;
    }

    public function toArray($reservation)
    {
        $this->reservations[] = $reservation;
    }

    public function toHotel($chambres)
    {
        $this->chambres[] = $chambres;
    }

    public function sortByDate()
    {
        if (count($this->reservations) > 1) {
            usort($this->reservations, function ($a, $b) {
                return strtotime($a->getReservationDebut()->format('d-m-Y')) - strtotime($b->getReservationDebut()->format('d-m-Y')); // je transforme le DateTime en string avec format() 
            });
        }
    }

    public function sortByNum()
    {
        usort($this->chambres, function ($a, $b) {
            return $a->getNum() - $b->getNum();
        });
    }

    public function afficherReservation()
    {
        $this->sortByDate();
        $result = "<div class='afficher-reservation'><h3>Reservations de l'hotel $this->nom $this->ville</h3>";
        if ($this->noReservation) {
            $result .= "<p>Aucune reservation !</p>";
        } else {
            $result .= "<div class='reservation uppercase'>$this->nbReservation Reservations</div>";
            foreach ($this->reservations as $val) {
                $result .= "<p>" . $val->getClient()->getPrenom() . " " . $val->getClient()->getNom() . " - Chambre " . $val->getChambre()->getNum() . " -  du " . $val->getReservationDebut()->format('d-m-Y') . " au " . $val->getReservationFin()->format('d-m-Y') . "</p>";
            }
        }
        return $result . "</div>";
    }

    public function afficherStatutChambre()
    {
        $this->sortByNum();
        $result = "<div class='afficherStatutChambre'><h4>Statut des chambres de <b>$this->nom $this->ville</b></h4>";
        $result .= "<table>
        <thead class='uppercase'>
            <tr>
                <th>Chambre</th>
                <th>Prix</th>
                <th>Wifi</th>
                <th>Etat</th>
            </tr>
        </thead>
        <tbody>";
        foreach ($this->chambres as $val) {
            $result .= "<tr><td>Chambre " . $val->getNum() . "</td>
            <td>" . $val->getPrix() . "€</td>";
            if ($val->getWifi())
                $result .= "<td><svg xmlns='http://www.w3.org/2000/svg' width='1.7em' height='1.7em' preserveAspectRatio='xMidYMid meet' viewBox='0 0 32 32'><path fill='currentColor' d='M16 7c-5.016 0-9.543 2.082-12.813 5.406l1.407 1.406C7.5 10.852 11.535 9 16 9c4.465 0 8.5 1.852 11.406 4.813l1.407-1.407C25.543 9.082 21.015 7 16 7zm0 5c-3.64 0-6.918 1.52-9.281 3.938l1.406 1.406C10.125 15.289 12.915 14 16 14c3.086 0 5.875 1.29 7.875 3.344l1.406-1.407C22.918 13.52 19.641 12 16 12zm0 5c-2.262 0-4.293.957-5.75 2.469l1.406 1.406A5.986 5.986 0 0 1 16 19c1.71 0 3.25.727 4.344 1.875l1.406-1.406C20.297 17.957 18.262 17 16 17zm0 5a2.98 2.98 0 0 0-2.219 1L16 25.219L18.219 23A2.98 2.98 0 0 0 16 22z'/></svg></td>";
            else
                $result .= "<td></td>";
            if ($val->getEtat())
                $result .= "<td><span class='reservation uppercase no-margin'>" . $val->Etat() . "</span></td></tr>";
            else
                $result .= "<td><span class='non-disponible uppercase no-margin'>" . $val->Etat() . "</span></td></tr>";
        }
        $result .= "</tbody>
            </table></div>";
        return $result;
    }

    public function __toString()
    {
        return "<div class='hotel'><h1>$this->nom $this->ville</h1>
        <p>$this->adresse $this->ville</p>
        <p>Nombre de chambres : $this->nbChambreTot</p>
        <p>Nombre de chambres reserves : $this->nbReservation</p>
        <p>Nombre de chambres dispo : $this->nbChambreDispo</p></div>";
    }
}