<?php
require_once("../models/ConnectManager.php");

class RegisterController{

    public function register(){

        $connectManager = new ConnectManager();

        if( isset($_POST['username']) && strlen($_POST['username'])!=0 &&
            isset($_POST['mail']) && strlen($_POST['mail'])!=0 &&
            isset($_POST['password']) && strlen($_POST['password'])!=0 )
        {
            $username = $_POST['username'];
            $mail = $_POST['mail'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
            $users = $connectManager->checkUsers($username, $mail);
            
            if(count($users) == 0)
            {
                $executed = $connectManager->register($username, $mail, $password);
        
                if($executed != false)
                {
                    echo "LOGIN:: Votre compte vient d'être créé";
                    echo "LOGIN:: Vous êtes connectés en tant que ".$username;
                    require_once("../views/characterView.php");
                }
            }
            
            else{
                require_once("../views/connectView.php");
                echo "REGISTER:: Ce compte existe déjà";
            }
        }
        // SI CHAMPS OBLIGATOIRES PAS REMPLIS
        else{
            require_once("../views/connectView.php");
            echo "REGISTER:: Les champs doivent être remplis";
        }
    }

}
