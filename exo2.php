<h1>Exercice 2</h1>

<p>Ecrire une fonction personnalisée qui affiche une date en français (en toutes lettres) à partir d’une 
chaîne de caractère représentant une date..
</p>

<h2>Résultat</h2>

<?php

$date = "2018-02-23";

function formaterDateFr($date) {
    //objet dateTime
    $dateTime = new DateTime(
        $date, 
        new DateTimeZone('Europe/Paris')
    );
    
    return
    //formater $dateTime
    IntlDateFormatter::formatObject($dateTime, 'eeee d MMMM y', 'fr_FR');
}

echo formaterDateFr($date);
