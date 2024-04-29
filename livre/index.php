<?php

//* autoload 

spl_autoload_register(function ($class_name) {
//*    include $class_name . '.php';
    require  'classes/'.$class_name . '.php';    
});

//* Bibliographie de Stephen King
$stephenKing= new Auteur("Stephen", "King");

$ca= new Livre("Ca", 1986, 1138, 20, $stephenKing);
$simetierre= new Livre("Simetierre", 1983, 374, 15, $stephenKing);
$leFleau= new Livre("Le Fléau", 1978, 823, 14, $stephenKing);
$shining= new Livre("Shining", 1977, 447, 16, $stephenKing);

echo $stephenKing->afficherBibliographie();

