<?php
    // CONNECTION A LA DB AVEC PDO
    try{
        $db = new PDO('mysql:host=localhost;dbname=users', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }

    // CHAMPS DE CONNEXION
    if( (isset($_POST['username']) && isset($_POST['password'])) )
    {
        // ON STOCKE LES INFOS RECUPEREES DANS LE FORMULAIRES 
        $username = $_POST['username'];
        $pwd = $_POST['password'];

        $checkQuery =  "SELECT * FROM users WHERE username='".$username."'";
        $checkRes  = $db->query($checkQuery);
        $entry = $checkRes->fetchAll(PDO::FETCH_ASSOC);

        if($entry != false && password_verify($pwd,$entry[0]['password'])){
            echo "LOGIN:: Success";
            echo "LOGIN:: Vous êtes connectés en tant que ".$username;
            include("character.php");
        }
        else
        {
            echo "LOGIN:: Ce nom d'utilisateur ou cet email n'est pas enregistré";
        }
    }
    // SI CHAMPS OBLIGATOIRES PAS REMPLIS
    else{
        echo "LOGIN:: Les champs doivent être remplis";
    }
?>