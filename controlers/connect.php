<?php
require("./../models/login.php");

if( (isset($_POST['username']) && isset($_POST['password'])) )
{
    $username = $_POST['username'];
    $pwd = $_POST['password'];

    if($entry != false && password_verify($pwd,$entry[0]['password'])){
        // echo "LOGIN:: Success";
        // echo "LOGIN:: Vous êtes connectés en tant que ".$username;
        require("./../views/character.php");
    }
    else
    {
        echo "LOGIN:: Ce nom d'utilisateur ou cet email n'est pas enregistré";
    }
}
else{
    echo "LOGIN:: Les champs doivent être remplis";
}