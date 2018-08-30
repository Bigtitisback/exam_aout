<?php


class PagesController{
    public function index(){
        require_once('ConnectController.php');
        $connectController = new ConnectController();
        $connectController->connect();
    }

    public function register(){
        require_once('RegisterController.php');
        $registerController = new RegisterController();
        $registerController->register();
    }

    public function createCharacter(){
        require_once('CharacterController.php');
        $characterController = new CharacterController();
        $characterController->createCharacter($_SESSION['user']);
    }

    public function displayCharacters(){
        require_once('CharacterController.php');
        $characterController = new CharacterController();
        $characterController->displayCharacters();
    }
    
    
}