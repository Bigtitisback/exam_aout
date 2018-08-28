<?php
require("./../models/connectModels.php");

if( isset($_POST['username']) && strlen($_POST['username'])!=0 &&
    isset($_POST['mail']) && strlen($_POST['mail'])!=0 &&
    isset($_POST['password']) && strlen($_POST['password'])!=0 )
{
    $username = $_POST['username'];
    $mail = $_POST['mail'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $users = checkUsers($username, $mail);
    
    
    // SI 0 RESULTAT ALORS
    if(count($users) == 0)
    {
        $executed = register($username, $mail, $password);

        if($executed != false)
        {
            require("./../views/characterView.php");
        }
    }
    
    else{
    echo "REGISTER:: Ce compte existe déjà";
    require("./../views/connectView.php");
    }
}
// SI CHAMPS OBLIGATOIRES PAS REMPLIS
else{
    echo "REGISTER:: Les champs doivent être remplis";
    require("./../views/connectView.php");
}