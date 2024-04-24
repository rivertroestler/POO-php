<h1>Exercice 1</h1>

<p>Calculer l'âge exact d'une personne à partir de sa date de naissance (en années, mois, jours).
</p>

<h2>Résultat</h2>

<?php

$dateNaissance = new DateTime("1985-01-17");
$dateCourante = new DateTime("2018-05-21");
$interval = $dateNaissance->diff($dateCourante);
echo "Age de la personne: " . $interval->y . "ans, " . $interval->m." mois, ".$interval->d." jours ";
