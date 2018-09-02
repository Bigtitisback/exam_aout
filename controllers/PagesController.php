<?php
require_once('ConnectController.php');
require_once('RegisterController.php');
require_once('CharacterController.php');

class PagesController{

    private $_connectController;
    private $_registerController;
    private $_characterController;

    public function __construct(){
        $this->_connectController = new ConnectController();
        $this->_registerController = new RegisterController();
        $this->_characterController = new CharacterController();
    }

    public function index(){
        $this->_connectController->connect();
    }

    public function register(){
        $this->_registerController->register();
    }

    public function createCharacter(){
        $this->_characterController->createCharacter($_SESSION['user']);
    }

    public function deleteCharacter($id){
        $this->_characterController->deleteCharacter($id);
    }

    public function modifyCharacter($id){
        $this->_characterController->modifyCharacter($id);
    }

    public function editCharacter($id, $strength, $mana, $agility){
        $this->_characterController->editCharacter($id, $strength, $mana, $agility);
    }

    public function filterCharacter($filterjob, $filterrace){
        $this->_characterController->filterCharacter($filterjob, $filterrace);
    }

    public function sortCharacter($sortType){
        $this->_characterController->sortCharacter($sortType);
    }

    public function displayCharacters(){
        $this->_characterController->displayCharacters();
    }
    
    
}