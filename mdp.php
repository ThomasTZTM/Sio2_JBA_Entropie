<?php

function CalculComplexiteMdp($mdp) :int{
    $length = strlen($mdp);
    $complexity = 0;

    if (preg_match('/[a-z]/', $mdp)) {
        $complexity += 26; // 26 lowercase letters
    }
    if (preg_match('/[A-Z]/', $mdp)) {
        $complexity += 26; // 26 uppercase letters
    }
    if (preg_match('/[0-9]/', $mdp)) {
        $complexity += 10; // 10 digits
    }
    if (preg_match('/[\W]/', $mdp)) {
        $complexity += 32; // 32 special characters (approximation)
    }

    // Calculate entropy in bits
    $entropy = $length * log($complexity, 2);
    return (int) $entropy;
}

$password = "aubry";
echo "- Pour le mot de passe $password : ".CalculComplexiteMdp($password)."\n";
$password = "super@ubry";
echo "- Pour le mot de passe $password : ".CalculComplexiteMdp($password)."\n";
$password = "Super@ubry2022";
echo "- Pour le mot de passe $password : ".CalculComplexiteMdp($password)."\n";
$password = "Giroud-Président||2027";
echo "- Pour le mot de passe $password : ".CalculComplexiteMdp($password)."\n";