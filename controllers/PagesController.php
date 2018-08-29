<?php

class PagesController{
    public function index(){
        require('ConnectController.php');
        $connectController = new ConnectController();
        $connectController->connect();
    }

    public function register(){
        require('RegisterController.php');
        $registerController = new RegisterController();
        $registerController->register();
    }

    public function createCharacter(){
        require('CharacterController.php');
        $characterController = new CharacterController();
        $characterController->createCharacter();
    }
    
    
}