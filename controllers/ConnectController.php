<?php
session_start();
require_once("../models/ConnectManager.php");
require_once("../controllers/CharacterController.php");


class ConnectController{

    public function connect(){

        $connectManager = new ConnectManager();
        $charController = new CharacterController();

        if( (isset($_POST['username']) && isset($_POST['password'])) )
        {
            $username = $_POST['username'];
            
            $password = $_POST['password'];
        
            $user = $connectManager->getUser($username);
        
            if($user != false && password_verify($password,$user[0]['password'])){
                echo "LOGIN:: Vous êtes connectés en tant que ".$username;
                
                $_SESSION['id'] = $user[0]['id'];
                $_SESSION['user'] = $username;
                
                require_once("../views/characterView.php");
                $charactersTable = $charController->displayCharacters($_SESSION['user']);
            }
            else
            {
                require_once('../views/connectView.php');
                echo "LOGIN:: Ce nom d'utilisateur n'existe pas ou le mot de passe est erroné";
            }
        }
        else{
            require_once('../views/connectView.php');
            echo "LOGIN:: Les champs doivent être remplis";
        }

    }
}

    
    


