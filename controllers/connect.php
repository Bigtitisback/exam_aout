<?php
require("./../models/ConnectManager.php");

session_start();
$_SESSION['user'] = $_POST['username'];




class PagesController{
    static function index(){
        if( (isset($_POST['username']) && isset($_POST['password'])) )
        {
            $username = $_POST['username'];
            
            $password = $_POST['password'];
        
            $user = ConnectManager::getUser($username);
        
            if($user != false && password_verify($password,$user[0]['password'])){
                // echo "LOGIN:: Success";
                // echo "LOGIN:: Vous êtes connectés en tant que ".$username;
                require("../public/character-view.php");
            }
            else
            {
                echo "LOGIN:: Ce nom d'utilisateur ou cet email n'est pas enregistré";
            }
        }
        else{
            echo "LOGIN:: Les champs doivent être remplis";
        }
    }
    
    public function characterView(){
        
    }

    function
}

