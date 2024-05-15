<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>POO Hotel</title>
</head>

<body>
    <?php
    spl_autoload_register(function ($class_name) {
        include $class_name . '.php';
    });

    $client1 = new Client("Virgile", "GIBELLO");
    $client2 = new Client("Micka", "MURMAN");

    $h1 = new Hotel("Hilton ****", "Strasbourg", "10 route de la Gare 67000", 17);
    $h2 = new Hotel("Regent ****", "Paris", "22 rue du Debarcadere 75017", 5);

    $chambre1 = new Chambre(1, 2, 120, $h1);
    $chambre2 = new Chambre(2, 2, 120, $h1);
    $chambre3 = new Chambre(3, 2, 100, $h1);
    $chambre4 = new Chambre(4, 2, 200, $h1);
    $chambre5 = new Chambre(5, 16, 500, $h1);
    $chambre17 = new Chambre(17, 1, 300, $h1);

    $r1 = new Reservation($h1, $chambre17, $client2, "01-01-2021", "01-01-2021");
    $r2 = new Reservation($h1, $chambre17, $client1, "11-03-2021", "11-03-2021");
    $r3 = new Reservation($h1, $chambre3, $client1, "01-04-2021", "01-04-2021");
    $r4 = new Reservation($h1, $chambre5, $client1, "10-10-2022", "03-11-2022");
    echo $h1;
    echo $h1->afficherReservation();
    echo $h2->afficherReservation();
    echo $client1->afficherReservation();
    echo $client2->afficherReservation();
    echo $h1->afficherStatutChambre();
    
</body>

</html>