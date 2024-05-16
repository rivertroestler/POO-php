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
//(donner un nom compréhensible à une variable)
    $h1 = new Hotel("Hilton ****", "Strasbourg", "10 route de la Gare 67000", 30);
    $h2 = new Hotel("Regent ****", "Paris", "22 rue du Debarcadere 75000", 5);

    $chambre1 = new Chambre(1, 2, 120, $h1);
    $chambre2 = new Chambre(2, 2, 120, $h1);
    $chambre3 = new Chambre(3, 2, 120, $h1);
    $chambre4 = new Chambre(4, 2, 120, $h1);
    $chambre17 = new Chambre(17, 1, 300, $h1);

    $r1 = new Reservation($h1, $chambre3, $client2, "11-03-2021", "11-03-2021");
    $r2 = new Reservation($h1, $chambre17, $client1, "01-01-2021", "01-01-2021");
    $r3 = new Reservation($h1, $chambre4, $client2, "01-04-2021", "01-04-2021");

    echo $h1;
    echo $h1->afficherReservation();
    echo $h2->afficherReservation();
    echo $client1->afficherReservation();
    echo $client2->afficherReservation();
    echo $h1->afficherStatutChambre();

//classe: une classe est composée d'attributs(variables) et de méthodes(comportements des attributs) spécifiques. Les objets d'une même classe partagent ces 'paramètres'

//objet: l'objet est l'instance d'une classe, il a en commun avec sa classe, le type de ses attributs et peut utiliser les méthodes de sa classe

//chainage: plusieurs méthodes peuvent être utilisées sur un même objet en une seule instruction

//principe d'encapsulation: l'encapsulation permet de protéger les objets en empêchant l'accès direct aux données d'un objet (private, protected et public)
//portée d'une variable: la portée d'une variable mesure la partie du code où cette variable est accesible
//différence include require , include affiche une erreur si un fichier est introuvable mais le code continue de s'executer, alors que require affiche une erreur fatale et stoppe le programme

  ?>  
</body>

</html>
