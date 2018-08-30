<?php
// session_start();
require_once("../models/ConnectManager.php");
require_once("../controllers/CharacterController.php");
require_once("../views/CharacterView.php");

class RegisterController{

    private $_connectManager;
    private $_charController;
    private $_charView;
    
    public function __construct(){
        $this->_connectManager = new ConnectManager();
        $this->_charController = new CharacterController();
        $this->_charView = new CharacterView();
    }

    public function register(){

        if( isset($_POST['username']) && strlen($_POST['username'])!=0 &&
            isset($_POST['mail']) && strlen($_POST['mail'])!=0 &&
            isset($_POST['password']) && strlen($_POST['password'])!=0 )
        {
            $username = $_POST['username'];
            $_SESSION['user'] = $_POST['username'];
            $mail = $_POST['mail'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
            $users = $this->_connectManager->checkUsers($username, $mail);
            
            if(count($users) == 0)
            {
                $executed = $this->_connectManager->register($username, $mail, $password);
        
                if($executed != false)
                {
                    echo "LOGIN:: Votre compte vient d'être créé";
                    echo "LOGIN:: Vous êtes connectés en tant que ".$username;
                    echo $this->_charView->setForm();
                    $charactersTable = $this->_charController->displayCharacters($_SESSION['user']);
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
