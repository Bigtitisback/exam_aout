<?php
require("./../models/ConnectManager.php");

$connectManager = new ConnectManager();

if( (isset($_POST['username']) && isset($_POST['password'])) )
{
    $username = $_POST['username'];
    
    $password = $_POST['password'];

    $user = $connectManager->getUser($username);

    if($user != false && password_verify($password,$user[0]['password'])){
        // echo "LOGIN:: Success";
        // echo "LOGIN:: Vous êtes connectés en tant que ".$username;
        require("./../views/characterView.php");
    }
    else
    {
        echo "LOGIN:: Ce nom d'utilisateur ou cet email n'est pas enregistré";
    }
}
else{
    echo "LOGIN:: Les champs doivent être remplis";
}