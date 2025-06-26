<?php

require_once '../../DB.php';

$password = $_POST['password'] ?? '';
$password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";

try{
    if(preg_match($password_regex, $password) === 1)
    {
        DB::savePassword($password, $_SESSION['mail']);
    }else{
        echo "Le mot de passe correspond pas au pattern : <ul><li>8 charactères</li><li>Majuscule</li><li>Minuscule</li><li>Chiffre</li><li>Caractère spécial</li></ul>"
    }
}



?>