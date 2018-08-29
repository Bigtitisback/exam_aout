<?php

class PagesController{
    public function index(){
        require('ConnectController.php');
        $connectController = new ConnectController();
        $connectController->connect();
    }


    public function characterView(){

        require("../public/character-view.php");
        
        // require('RegisterController.php');
        // require('CharacterController.php');
    }
    
    
}