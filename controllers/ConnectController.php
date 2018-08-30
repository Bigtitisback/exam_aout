<?php
// session_start();
require_once("../models/ConnectManager.php");
require_once("../controllers/CharacterController.php");
require_once("../views/CharacterView.php");


class ConnectController{

    private $_connectManager;
    private $_charController;
    private $_charView;

    public function __construct(){
        $this->_connectManager = new ConnectManager();
        $this->_charController = new CharacterController();
        $this->_charView = new CharacterView();
    }

    public function connect(){

        if( isset($_POST['username']) && isset($_POST['password']) && strlen($_POST['username'])!=0 && strlen($_POST['password'])!=0)
        {
            $username = $_POST['username'];
            
            $password = $_POST['password'];
        
            $user = $this->_connectManager->getUser($username);
        
            if($user != false && password_verify($password,$user[0]['password'])){
                echo "LOGIN:: Vous êtes connectés en tant que ".$username;
                
                $_SESSION['id'] = $user[0]['id'];
                $_SESSION['user'] = $username;
                
                echo $this->_charView->setForm();
                $charactersTable = $this->_charController->displayCharacters($_SESSION['user']);
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

    
    


