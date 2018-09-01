<?php
//session_start();
require_once("../models/CharacterManager.php");
require_once("../views/CharacterView.php");
require_once("../views/EditorView.php");

class CharacterController{

    private $_charView;
    private $_editorView;
    private $_charManager;

    public function __construct(){
        $this->_editorView = new EditorView();
        $this->_charView = new CharacterView();
        $this->_charManager = new CharacterManager();
    }
    
    
    public function createCharacter($user){

        if( isset($_POST['charname']) && strlen($_POST['charname']) != 0 && isset($_POST['charjob']) && isset($_POST['charrace']) && 
            isset($_POST['charstrength']) && isset($_POST['charmana']) && isset($_POST['charagility'])){
    
            $entries = $this->_charManager->checkCharacters($user, $_POST['charname']);

            if(count($entries) == 0){
                
                $executed = $this->_charManager->createCharacter($user);

                if($executed != false)
                {
                    echo "CHARACTER:: ".$_POST['charname'].", ".$_POST['charrace']." ".$_POST['charjob']." créé !";
                    echo $this->_charView->setForm();
                   $this->displayCharacters($user);
                }
            }
            else{
                echo "CHARACTER:: Vous avez déjà un personnage du nom de ".$_POST['charname'];
                echo $this->_charView->setForm();
                $this->displayCharacters($user);
            }
        }
        else{
            echo "CHARACTER:: Veuillez indiquer un nom pour votre personnage";
            echo $this->_charView->setForm();
            $this->displayCharacters($user);
        }
    }

    public function modifyCharacter($id){
        $character = $this->_charManager->getCharacter($id);
        echo $this->_editorView->displayEditor($character);
    }

    public function deleteCharacter($id){
        $executed = $this->_charManager->deleteCharacter($id);

        if($executed != false){
            echo $this->_charView->setForm();
            $this->displayCharacters($_SESSION['user']);
        }

    }

    public function sortCharacter($sortType){
        echo $this->_charView->setForm();
        $this->displayCharacters($_SESSION['user'], $sortType);
    }

    public function displayCharacters($user, $sortType=null){

        $titres = ["N°", "Name", "Race", "Job", "Strength", "Mana", "Agility"];
        $characters = $this->_charManager->getCharacters($user,$sortType);
        
        echo $this->_charView->setCharacterTable($characters, $titres, $user);

    }

}