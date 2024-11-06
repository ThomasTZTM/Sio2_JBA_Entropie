<?php

function CalculComplexiteMdp($mdp) :int{
    $longueur = strlen($mdp);
    $point=0;
    $point_caracteres=0;
    $point_chiffre=0;
    $point_maj=0;
    $point_min=0;
    // On fait une boucle pour lire chaque lettre
    for ($i = 0; $i < $longueur; $i++) {
        // On sélectionne une à une chaque lettre
        // $i étant à 0 lors du premier passage de la boucle
        $lettre = $mdp[$i];
        if ( ($lettre >= 'a' && $lettre <= 'z') and ($point_min == 0) ){
            // On ajoute 1 point pour une minuscule
            $point = $point + 26;
            // On rajoute le bonus pour une minuscule
            $point_min = 1;
        } else if ( ($lettre >= 'A' && $lettre <= 'Z') and ($point_maj == 0) ) {
            // On ajoute 2 points pour une majuscule
            $point = $point + 26;
            // On rajoute le bonus pour une majuscule
            $point_maj = 2;
        } else if ( ($lettre >= '0' && $lettre <= '9') and ($point_chiffre == 0) ) {
            // On ajoute 3 points pour un chiffre
            $point = $point + 10;
            // On rajoute le bonus pour un chiffre
            $point_chiffre = 3;
        } else if ($point_caracteres==0){
            // On ajoute 5 points pour un caractère autre
            $point = $point + 23;
            // On rajoute le bonus pour un caractère autre
            $point_caracteres = 5;
        }
    }

    $final = $longueur*log($point, 2);
    return $final;
}

$password = "aubry";
echo "- Pour le mot de passe $password : ".CalculComplexiteMdp($password)."\n";
$password = "super@ubry";
echo "- Pour le mot de passe $password : ".CalculComplexiteMdp($password)."\n";
$password = "Super@ubry2022";
echo "- Pour le mot de passe $password : ".CalculComplexiteMdp($password)."\n";
$password = "Giroud-Président||2027";
echo "- Pour le mot de passe $password : ".CalculComplexiteMdp($password)."\n";